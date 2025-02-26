<?php

namespace App\Http\Controllers;
use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function rating(Request $request){
        $rat = Rating::create($request->all());
        return view();
    }
}
