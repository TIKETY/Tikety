<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegularController extends Controller
{

    public function contact(){
        return view('contact');
    }

    public function about(){
        return view('about');
    }

    public function faq(){
        return view('faq');
    }

    public function travel(){
        return view('travel');
    }

    public function phoneverified(){
        return view('phoneverified');
    }

    public function verification_code(){
        return view('verification_code');
    }

}
