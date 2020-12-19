<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Founders extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'instagram',
        'position',
        'email',
        'facebook',
        'story',
        'image_url',
        'twitter',
        'linkedin',
        'phone_number'
    ];

}
