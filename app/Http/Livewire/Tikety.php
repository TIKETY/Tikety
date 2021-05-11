<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Twilio\Rest\Client;
use App\Models\Bus;
use Illuminate\Support\Str;
use App\Notifications\BusNotification;
use App\Models\History;
use App\Models\Tikety as Tik;

class Tikety extends Component
{
    public $bid;
    public $bus;
    public $seat;

    public function buy_tikety(){
        $array = explode(',', $this->seat);
        $seats = sizeof($array);
        $token = Str::random(60);
        $code = mt_rand(100000, 999999);
        $fare = ($seats*$this->bus->amount); //for later use of integrating with tigopesa and mpesa push
        if(!auth()->user()->PhoneIsVerified()){
            auth()->user()->verifyphone(auth()->user()->phone_number);
            // return redirect(url('/'.app()->getLocale().'/verification_code'))->with('number_message', trans('Verification code was sent to your number'));
        } else{
            //for later integration with mobile money payments
            $tikety = Tik::create([
                'user_id'=>auth()->user()->id,
                'bus_id'=>$this->bus->id,
                'seat'=>$this->seat,
                'from'=>$this->bus->from,
                'amount'=>$fare,
                'to'=>$this->bus->to,
                'date'=>$this->bus->date,
                'time'=>$this->bus->time,
                'code'=>$code,
                'token'=>$token,
            ]);
            $this->bus->seats_to_user($array, auth()->user());
            History::create(['user_id'=>auth()->user()->id, 'tikety_id'=>$tikety->id,'bus_name'=>$this->bus->name, 'bus_id'=>$this->bus->id, 'amount_paid'=>$fare, 'seat'=>$this->seat, 'depature_date'=>$this->bus->date]);
            $account_sid = getenv("TWILIO_SID");
            $auth_token = getenv("TWILIO_AUTH_TOKEN");
            $twilio_number = getenv("TWILIO_NUMBER");
            $client = new Client($account_sid, $auth_token);
            $client->messages->create(auth()->user()->phone_number,
            ['from' => $twilio_number, 'body' => trans('You have taken the seat ').
            $this->seat.trans(' with the price of ').$fare.trans(' .Your Tikety Code is ').
            $code.trans('. This Tikety is for the bus ').$this->bus->name.trans(' which is traveling from ').
            $this->bus->from.trans(' to ').
            $this->bus->to.trans('. On date ').
            $this->bus->date.trans(' at ').
            $this->bus->time.trans('. This Tikety will expire on the date of depature use it on time. Thank you for using Tikety')]);
            session()->flash('seat_message', trans('Seat(s) has been reserved'));

            return redirect()->to('/'.app()->getLocale().'/showbus/'.$this->bus->id);
        }

    }

    public function render()
    {
        $this->bus = Bus::where('id', $this->bid)->first();
        return view('livewire.tikety');
    }
}
