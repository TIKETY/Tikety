<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Tikety extends Model
{
    protected $fillable = [
        'user_id',
        'bus_id',
        'code',
        'token',
        'seat',
        'from',
        'amount',
        'to',
        'date',
        'time',
        'used_state',
    ];

    protected $hidden = [
        'code',
        'token',
    ];

    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function history(){
        return $this->belongsTo(History::class);
    }
}
