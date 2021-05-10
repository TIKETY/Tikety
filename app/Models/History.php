<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class History extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'bus_id', 'tikety_id', 'bus_name', 'seat', 'amount_paid', 'depature_date'
    ];

    public function user(){
        return $this->belongsToMany(User::class);
    }

    public function tikety(){
        return $this->belongsToMany(Tikety::class);
    }
}
