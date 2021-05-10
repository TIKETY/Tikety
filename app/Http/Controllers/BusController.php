<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;
use Illuminate\Validation\Rule;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\History;
use App\Models\Review;
use App\Models\Bus;
use App\Rules\RecaptchaRule;
use Illuminate\Support\Facades\Storage;
use PragmaRX\Countries\Package\Services\Countries;

class BusController extends Controller
{
    public function MyBus(){
        $buses = auth()->user()->bus;

        return view('bus.mybus', compact('buses'));
    }

    public function CreateBus(){
        $countries = new Countries;
        $states = $countries->whereNameCommon('Tanzania')->first()->hydrateStates()->states->pluck('name', 'postal')->toArray();
        return view('bus.createbus', compact('states'));
    }

    public function CreateBusForm($language, Request $request, User $user){
        $user = auth()->user();
        $validated = $request->validate([
            'name'=>'required|unique:buses',
            'image_url'=>'file|max:10240|required',
            'body'=>'required',
            'amount'=>'required',
            'address'=>'required',
            'platenumber'=>'required|unique:buses',
            'workinghours'=>'required',
            'rows'=>'required',
            'from'=>'required|max:30',
            'to'=>'required|max:30',
            'date'=>'required|date',
            'time'=>'required|date_format:H:i',
            'route'=>'required',
            'Terms'=>'accepted',
            'g-recaptcha-response'=>['required', new RecaptchaRule]
        ]);

        $countries = new Countries;
        $states = $countries->whereNameCommon('Tanzania')->first()->hydrateStates()->states->pluck('name', 'postal')->toArray();

        if(!in_array($validated['from'], $states) || !in_array($validated['to'], $states)){
            return abort(422);
        } else{

        if(!is_null($validated['image_url'])){
            Storage::disk('do')->putFile('buses', $request->file('image_url'), 'public');

            $validated['image_url'] = request('image_url')->store('buses');
        }

        $bus = Bus::create([
            'name'=>$validated['name'],
            'image_url'=>$validated['image_url'],
            'body'=>$validated['body'],
            'rows'=>$validated['rows'],
            'amount'=>$validated['amount'],
            'phonenumber'=>auth()->user()->phone_number,
            'platenumber'=>$validated['platenumber'],
            'workinghours'=>$validated['workinghours'],
            'address'=>$validated['address'],
            'from'=>$validated['from'],
            'to'=>$validated['to'],
            'date'=>$validated['date'],
            'time'=>$validated['time'],
            'timings'=>$validated['date'].' '.$validated['time'],
            'route'=>$validated['route'],
            'user_id'=>$user->id
        ]);

        $user->addBus($bus);

        for ($i=1; $i <= $validated['rows']*4; $i++) {
        $bus->addSeat($i);
        }
        $bus->addSeat(($validated['rows']*4) + 1);
        return redirect()->route('buses', app()->getLocale())->with('success', trans('The bus has been created successfully'));
        }

    }

    public function show($language, Bus $bus){
        $seats = (Arr::flatten($bus->seats()->where('bus_id', $bus->id)->where('user_id', NULL)->pluck('seat')));
        $users_t = (Arr::flatten($bus->seats()->where('bus_id', $bus->id)->whereNotNull('user_id')->pluck('user_id')));
        $users = User::whereIn('id', $users_t)->get();

        if(Gate::allows('isowner', $bus)){
            $reviews = Review::where('bus_id', $bus->id)->paginate(1);
        } else{
            $reviews = Review::where('bus_id', $bus->id)->where('approved', 1)->paginate(1);
        }

        return view('bus.busdetail', [
            'bus'=>$bus,
            'seats'=>$seats,
            'users'=>$users,
            'reviews'=>$reviews,
            'notifications'=>auth()->user()->unreadNotifications
        ]);
    }

    public function showbuses(){
        $buses = Bus::latest()->paginate(10);
        return view('bus.bus', compact('buses'));
    }

    public function updatebus($language, Bus $bus){
        $countries = new Countries;
        $states = $countries->whereNameCommon('Tanzania')->first()->hydrateStates()->states->pluck('name', 'postal')->toArray();
        return view('bus.updatebus', [
            'bus'=> $bus,
            'states'=>$states
        ]);
    }

    public function update($language, Request $request, Bus $bus){

        $validated = $request->validate([
            'name'=>['required', Rule::unique('buses')->ignore($bus)],
            'body'=>'required',
            'image_url'=>'file|max:10240',
            'amount'=>'required',
            'platenumber'=>'required',
            'address'=>'required',
            'workinghours'=>'required',
            'rows'=>'required|max:2',
            'from'=>'required|max:30',
            'to'=>'required|max:30',
            'date'=>'required|date',
            'time'=>'required|date_format:H:i',
            'route'=>'required',
            'g-recaptcha-response'=>['required', new RecaptchaRule]
        ]);

        if(!is_null($validated['image_url'])){
            Storage::disk('do')->putFile('buses', $request->file('image_url'), 'public');

            $validated['image_url'] = request('image_url')->store('buses');
        }

        if($bus->rows > $validated['rows']){
            for ($i=1; $i < (($bus->rows - $validated['rows'])*4)+1; $i++) {
                $bus->removeSeat(($validated['rows']*4)+$i);
            }
            $bus->addSeat(($validated['rows']*4)+1);
        } else if($validated['rows'] > $bus->rows){
            for ($i=1; $i < ($validated['rows']*4)+1; $i++){
                if(!$bus->seat_existence($i)){
                    $bus->addSeat($i);
                }
            }
            $bus->addSeat(($validated['rows']*4) + 1);
        }
        $bus->update($validated);
        $seats = (Arr::flatten($bus->seats()->where('bus_id', $bus->id)->where('user_id', NULL)->pluck('seat')));
        return redirect()->route('ShowBus', ['bus'=>$bus, 'language'=>app()->getLocale()])->with('success', trans('The bus has been updated'));
    }

    public function removeBus($language, Bus $bus){
        $bus->delete();
        return redirect()->route('buses', app()->getLocale())->with('success', trans('The bus was removed'));
    }

    public function takeseat($language, Request $request, Bus $bus){
        $string = $request->seatid;
        $array = explode(',', $string);
        $bus->seats_to_user($array, $bus->user);
        return redirect()->back()->with('success', trans('You have taken seat(s) successfully'));
    }

    public function invoicer(){
        return view('bus.invoice');
    }

    public function travel($language, Request $request){
        $from = $request['from'];
        $to = $request['to'];

        $buses = Bus::where('from', $from)->where('to', $to)->get();

        return view('travel.travel-output', compact('buses'));
    }

    public function revokeSeat($language, Request $request, Bus $bus){
        $bus1 = Bus::find($bus->id);
        $seatowner = $bus1->seatowner($request['seat']);
        $user_phone = User::find($seatowner)->pluck('phone_number')->flatten();
        $account_sid = getenv("TWILIO_SID");
        $auth_token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_number = getenv("TWILIO_NUMBER");
        $client = new Client($account_sid, $auth_token);
        $client->messages->create($user_phone,
                ['from' => $twilio_number, 'body' => trans('The seat: ').$request['seat'].trans(' was revoked and your Money will be refunded, immediately!')] );
        $bus1->revokeSeat($request['seat']);
        return redirect()->back()->with('success', trans('You have successfully revoked seat ').$request['seat']);
    }

    public function resetbus($language, Bus $bus){
        $bus->resetbus();
        return redirect()->back()->with('success', trans('You have Successfully reseted this bus!'));
    }

}


