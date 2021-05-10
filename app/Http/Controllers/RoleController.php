<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\General;
use App\Models\User;

class RoleController extends Controller
{

    public function role(){
        $customer = General::where(['role'=>'customer'])->first();
        $manager = General::where(['role'=>'manager'])->first();
        $master = General::where(['role'=>'master'])->first();
        return view('registration.price', ['customer'=>$customer, 'manager'=>$manager, 'master'=>$master]);
    }

    public function makeRole($language, $role){
        $role1 = Role::where(['name'=>'master'])->first();
        $role2 = Role::where(['name'=>'manager'])->first();
        $role3 = Role::where(['name'=>'customer'])->first();
        if($role==='master'){
            auth()->user()->addRole($role1);
        } else if($role==='manager'){
            auth()->user()->addRole($role2);
        } else if($role==='customer') {
            auth()->user()->addRole($role3);
        }

        return redirect()->route('home', app()->getLocale())->with('success', trans('Success'));
    }

}
