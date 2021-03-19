<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'time', 'emails', 'body', 'link'
    ];

    public function user(){
        return $this->belongsToMany(User::class)->withPivot('user_id');
    }

    public function seen($user){
        $this->user()->sync($user, false);
    }

}
