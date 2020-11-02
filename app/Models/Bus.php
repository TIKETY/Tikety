<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Seat;

class Bus extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'rows',
        'route',
        'body',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
