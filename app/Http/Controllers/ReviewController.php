<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\RecaptchaRule;
use App\Models\Review;

class ReviewController extends Controller
{
    public function store($language, Request $request, $bus){

        $validated = $request->validate([
            'rating'=>'integer',
            'phone_number'=>'required',
            'body'=>'required',
            'title'=>'required',
            'g-recaptcha-response'=>['required', new RecaptchaRule]
        ]);

        if(Review::where('phone_number', auth()->user()->phone_number)->exists()){
            Review::where('phone_number', auth()->user()->phone_number)->update([
                'title'=>$validated['title'],
                'rating'=>$validated['rating'],
                'phone_number'=>$validated['phone_number'],
                'body'=>$validated['body'],
                'user_id'=>auth()->user()->id,
                'user_name'=>auth()->user()->name,
                'user_image'=>auth()->user()->image_url,
                'approved'=>0,
                'bus_id'=>$bus,
            ]);
        } else{
            Review::create([
                'title'=>$validated['title'],
                'rating'=>$validated['rating'],
                'phone_number'=>$validated['phone_number'],
                'body'=>$validated['body'],
                'user_id'=>auth()->user()->id,
                'user_name'=>auth()->user()->name,
                'user_image'=>auth()->user()->image_url,
                'bus_id'=>$bus,
            ]);
        }

        return redirect()->back()->with('success', trans('Your Review has been submitted! Thank you!'));
    }

    public function approve($language, $bus,  $review_user_id){

        $review_inst = Review::where('user_id', $review_user_id)->where('bus_id', $bus)->first();

        if(!$review_inst->approved){
            $review_inst->approve();
        }   else{
            $review_inst->disapprove();
        }

        return redirect()->back()->with('toast_success', trans('Review updated'));
    }
}
