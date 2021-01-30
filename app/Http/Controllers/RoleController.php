<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;

class RoleController extends Controller
{

    public function role(){
        return view('registration.role');
    }

    public function makeRole($role){

        $role1 = Role::find(1);
        $role2 = Role::find(2);
        $role3 = Role::find(3);
        if($role==='master'){
            auth()->user()->addRole($role1);
            dd('hello1');
        } else if($role==='manager'){
            auth()->user()->addRole($role2);
            dd('hello2');
        } else if($role==='customer') {
            auth()->user()->addRole($role3);
            dd('hello3');
        }

        return redirect()->route('home', app()->getLocale());
    }

}
