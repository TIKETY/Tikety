<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Bus;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'bus_id', 'image_url'
    ];

    public function bus(){
        return $this->belongsTo(Bus::class);
    }
}
