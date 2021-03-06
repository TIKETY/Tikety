<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Temp extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'bus_id', 'variable3', 'variable4', 'variable5', 'variable6', 'variable7', 'variable8', 'variable9', 'variable0',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function delete(){
        return $this->delete();
    }
}
