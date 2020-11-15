<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Bus;

class Fleet extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'bus_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function buses(){
        return $this->hasMany(Bus::class);
    }

    public function addBus($bus, $user){
        Fleet::create([
            'user_id'=>$user->id,
            'bus_id'=>$bus->id
        ]);
    }

}
