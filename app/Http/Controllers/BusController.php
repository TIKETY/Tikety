<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;
use Illuminate\Validation\Rule;
use Illuminate\Support\Arr;
use App\Notifications\BusNotification;
use App\Models\User;
use App\Models\Bus;
use App\Rules\RecaptchaRule;
use PragmaRX\Countries\Package\Services\Countries;
use RealRashid\SweetAlert\Facades\Alert;

class BusController extends Controller
{
    public function MyBus(){
        $buses = auth()->user()->bus;

        return view('bus', compact('buses'));
    }

    public function CreateBus(){
        $countries = new Countries;
        $states = $countries->whereNameCommon('Tanzania')->first()->hydrateStates()->states->pluck('name', 'postal')->toArray();
        return view('createbus', compact('states'));
    }

    public function CreateBusForm(Request $request, User $user){
        $user = auth()->user();

        $validated = $request->validate([
            'name'=>'required|unique:buses',
            'image_url'=>'file|max:10240',
            'body'=>'required',
            'amount'=>'required',
            'address'=>'required',
            'phonenumber'=>'required',
            'platenumber'=>'required|unique:buses',
            'workinghours'=>'required',
            'rows'=>'required',
            'from'=>'required|max:30',
            'to'=>'required|max:30',
            'date'=>'required|date',
            'time'=>'required|date_format:H:i',
            'route'=>'required',
            'g-recaptcha-response'=>['required', new RecaptchaRule]
        ]);

        $countries = new Countries;
        $states = $countries->whereNameCommon('Tanzania')->first()->hydrateStates()->states->pluck('name', 'postal')->toArray();

        if(!in_array($validated['from'], $states) || !in_array($validated['to'], $states)){
            return abort(422);
        } else{
        $validated['image_url'] = request('image_url')->store('buses');

        $bus = Bus::create([
            'name'=>$validated['name'],
            'image_url'=>$validated['image_url'],
            'body'=>$validated['body'],
            'rows'=>$validated['rows'],
            'amount'=>$validated['amount'],
            'phonenumber'=>$validated['phonenumber'],
            'platenumber'=>$validated['platenumber'],
            'workinghours'=>$validated['workinghours'],
            'address'=>$validated['address'],
            'from'=>$validated['from'],
            'to'=>$validated['to'],
            'date'=>$validated['date'],
            'time'=>$validated['time'],
            'route'=>$validated['route'],
            'user_id'=>$user->id
        ]);

        $user->addBus($bus);

        for ($i=1; $i <= $validated['rows']*4; $i++) {
         $bus->addSeat($i);
        }
        $bus->addSeat(($validated['rows']*4) + 1);
        return redirect()->route('buses')->with('success', trans('The bus has been created successfully'));
        }


    }

    public function show(Bus $bus){
        $seats = (Arr::flatten($bus->seats()->where('bus_id', $bus->id)->where('user_id', NULL)->pluck('seat')));

        return view('busdetail', [
            'bus'=>$bus,
            'seats'=>$seats,
            'notifications'=>auth()->user()->unreadNotifications
        ]);
    }

    public function showbuses(){
        $buses = Bus::latest()->paginate(10);
        return view('bus', compact('buses'));
    }

    public function updatebus(Bus $bus){
        $countries = new Countries;
        $states = $countries->whereNameCommon('Tanzania')->first()->hydrateStates()->states->pluck('name', 'postal')->toArray();
        return view('updatebus', [
            'bus'=> $bus,
            'states'=>$states
        ]);
    }

    public function update(Request $request, Bus $bus){

        $validated = $request->validate([
            'name'=>['required', Rule::unique('buses')->ignore($bus)],
            'body'=>'required',
            'image_url'=>'file|max:10240',
            'amount'=>'required',
            'platenumber'=>'required',
            'address'=>'required',
            'workinghours'=>'required',
            'phonenumber'=>'required',
            'rows'=>'required|max:2',
            'from'=>'required|max:30',
            'to'=>'required|max:30',
            'date'=>'required|date',
            'time'=>'required|date_format:H:i',
            'route'=>'required',
            'g-recaptcha-response'=>['required', new RecaptchaRule]
        ]);

        $validated['image_url'] = request('image_url')->store('buses');

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
        return redirect()->route('ShowBus', $bus)->with('success', trans('The bus has been updated'));
    }

    public function removeBus(Bus $bus){
        Bus::where('id', $bus->id)->delete();
        return redirect()->route('buses')->with('success', trans('The bus was removed'));
    }

    public function takeseat(Request $request, Bus $bus){
        $string = $request->seats_id;
        $array = explode(',', $string);
        $bus->seats_to_user($array, $bus->user);
        return redirect()->back()->with('success', trans('You have taken a seat successfully'));
    }

    public function payseat(Request $request, Bus $bus){
        $array = explode(',', $request->seats_id);
        $seats = sizeof($array);
        $user = auth()->user()->name;
        $fare = ($seats*$bus->amount); //for later use of integrating with tigopesa and mpesa push
        if(!auth()->user()->PhoneIsVerified()){
            auth()->user()->verifyphone(auth()->user()->phone_number);
            return redirect()->route('verification_code')->with('number_message', 'Verification code was sent to your number');
        } else{
            $bus->seats_to_user($array, auth()->user());
            $account_sid = getenv("TWILIO_SID");
            $auth_token = getenv("TWILIO_AUTH_TOKEN");
            $twilio_number = getenv("TWILIO_NUMBER");
            $client = new Client($account_sid, $auth_token);
            $client->messages->create($request->user()->phone_number,
            ['from' => $twilio_number, 'body' => 'You have taken the seat '.$request->seats_id.' with the price of '.$fare] );
            $bus->user->notify(new BusNotification($request->seats_id, $user));
            return redirect()->back()->with('toast_success', trans('Seat(s) has been reserved'));
        }
    }

    public function travel(Request $request){
        $from = $request['from'];
        $to = $request['to'];

        $buses = Bus::where('from', $from)->where('to', $to)->get();

        return view('travel-output', compact('buses'));
    }

    public function revokeSeat(Request $request, Bus $bus){
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

    public function resetbus(Bus $bus){
        $bus->resetbus();
        return redirect()->back()->with('success', trans('You have Successfully reseted this bus!'));
    }
}


