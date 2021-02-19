<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Bus;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'phone_number', 'rating', 'body', 'user_id', 'user_name', 'user_image', 'bus_id', 'approved'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function bus(){
        return $this->belongsTo(User::class);
    }

    public function approve(){
        return $this->forceFill([
            'approved'=>1
        ])->save();
    }

    public function disapprove(){
        return $this->forceFill([
            'approved'=>0
        ])->save();
    }

}
