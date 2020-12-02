<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Seat;
use App\Models\User;
use App\Models\Fleet;
use Laravel\Scout\Searchable;

class Bus extends Model
{
    use HasFactory, Searchable;

    protected $guarded = [];

    protected $dates = [
        'date'
    ];

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {
        $array = $this->toArray();

        // Customize array...

        return $array;
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function seats(){
        return $this->hasMany(Seat::class);
    }

    public function fleet(){
        return $this->belongsTo(Fleet::class);
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

    public function checkfleet(){
       return Fleet::where('bus_id', $this->id)->exists();
    }

    public function busstate(){
        return !$this->seats()->where('user_id', NULL)->exists();
    }

    public function revokeSeat($seat){
        return $this->seats()->where('seat', $seat)->update(['user_id'=>NULL]);
    }

    public function seatowner($seat){
        return $this->seats()->where('seat', $seat)->pluck('user_id');
    }

    public function resetbus(){
        return $this->seats()->update(['user_id'=>NULL]);
    }
}
