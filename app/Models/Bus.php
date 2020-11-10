<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Seat;
use App\Models\User;

class Bus extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $dates = [
        'date'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function seats(){
        return $this->hasMany(Seat::class);
    }

    public function check_seat($seat){
        return !$this->seats()->where('id', $seat)->where('user_id', NULL)->exists();
    }

    public function seats_to_user($seats, $user){
        return $this->seats()->whereIn('seat', $seats)->where('user_id', NULL)->update(['user_id'=>$user->id]);
    }

    public function addSeat($seat){
        return $this->seats()->create(['seat'=>$seat]);
    }

    public function updateSeat($seat){
        return $this->seats()->update(['seat'=>$seat]);
    }

    public function seat_existence($seat){
        return $this->seats()->where('seat', $seat)->exists();
    }

    public function removeSeat($seat){
        return $this->seats()->where('seat', $seat)->delete();
    }
}
