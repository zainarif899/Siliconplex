<?php

namespace App\Http\Controllers;
use App\Models\Rating;
use App\Http\Requests\RatingRequest;
use App\Models\User;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    // public function rating(Request $request){
    //     $rat = Rating::create($request->all());
    //     return view();
    // }

    public function rating_create(RatingRequest $request,$id)
    {
        $validation = $request->validated();
        dd($validation);
        $user_id = auth()->id();
        $currentuser = User::find($id);
        dd($user_id);
        $rat = Rating::create([
            'review'=>$request->review,
            'rating'=>$request->rating,
            'user_id'=>$user_id,
            'ext_id'=>$request->ext_id
        ]);
        dd($rat);
        if($rat){
            return view('Extension.rating');
        }else{
        return ['fails'=>false,'result'=>$rat,'msg'=>"Rating not Add successfull"];
    }

    }


    public function rating_page()
    {
        return view('Extension.rating');
    }
}
