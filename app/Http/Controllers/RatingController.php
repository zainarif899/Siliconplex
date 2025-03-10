<?php

namespace App\Http\Controllers;
use App\Models\Rating;
use App\Http\Requests\RatingRequest;
use App\Models\Extension;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{

    public function rating_create(RatingRequest $request)
    {
       
        if (!Auth::check()) {
            return redirect()->route('login-page')->with('error', 'You must be logged in to submit a rating.');
        }
    
       
        $validation = $request->validated();
    
        
        $extension = Extension::find($request->ext_id);
        dd($extension);
        if (!$extension) {
            return response()->json([
                'fails' => true,
                'msg' => "Extension not found"
            ], 404);
        }
    
    
        $user_id = Auth::id(); 
    
      
        $rat = Rating::create([
            'review'  => $request->review,
            'rating'  => $request->rating,
            'user_id' => $user_id,  
            'pro_id'  => $request->ext_id  
        ]);
    
        if ($rat) {
            return redirect()->route('rating-page')->with('success', 'Rating added successfully!');
        } else {
            return response()->json([
                'fails' => true,
                'msg'   => "Rating could not be added"
            ], 500);
        }
    }
    


    public function rating_page()
    {
        return view('Extension.rating');
    }
}
