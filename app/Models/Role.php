<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ability;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function abilities(){
        return $this->belongsToMany(Ability::class)->withTimestamps();
    }

    public function addAbility($ability){
        $this->abilities()->save($ability);
    }
}
