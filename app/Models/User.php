<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Role;
use Twilio\Rest\Client;
use App\Models\Bus;
use App\Models\Fleet;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'phone_number',
        'password',
        'verification_code'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function bus(){
        return $this->belongsToMany(Bus::class);
    }

    public function fleet(){
        return $this->hasOne(Fleet::class);
    }

    public function seat(){
        return $this->hasOneThrough('App\Models\Seat', 'App\Models\Bus');
    }

    public function roles(){
        return $this->belongsToMany(Role::class)->withTimestamps();
    }

    public function addRole($role){
        $this->roles()->sync($role, false);
    }

    public function addBus($bus){
        $this->bus()->sync($bus, false);
    }

    public function abilities(){
        return $this->roles->map->abilities->flatten()->pluck('name')->unique();
    }

    public function roleChecker(){
        if($this->roles->map->abilities->flatten()->pluck('name')!='[]'){
            return true;
        } else{
            return false;
        };
    }

    public function verifyphone($phone){
        $code = mt_rand(100000, 999999);

        $this->forceFill([
          'verification_code' => $code
        ])->save();

        $account_sid = getenv("TWILIO_SID");
        $auth_token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_number = getenv("TWILIO_NUMBER");
        $client = new Client($account_sid, $auth_token);
        return $client->messages->create($phone,
                ['from' => $twilio_number, 'body' => 'Your Verification code is: '.$code] );
    }

    public function PhoneIsVerified(){
        return is_null($this->phone_verified_at);
    }

    public function phone_register($phone){
        return User::where('id', $this->id)->update(['phone_number'=>$phone]);
    }

    public function verify(){
        return User::where('id', $this->id)->update(['phone_verified_at'=>date("Y-m-d H:i:s")]);
    }
}
