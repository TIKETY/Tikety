<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'route',
        'body',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
