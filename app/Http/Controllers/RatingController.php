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
        // dd($request);

        if (!Auth::check()) {
            return redirect()->route('login-page')->with('error', 'You must be logged in to submit a rating.');
        }


        $validation = $request->validated();
        // $ext_id = Rating::with('extension')->get();
        // dd($ext_id);
        // $ext_id = Extension::find($id)->ext_id;
        // // dd($ext_id);
        // if (!$ext_id) {
        //     return response()->json([
        //         'fails' => true,
        //         'msg' => "Extension not found"
        //     ], 404);
        // }


        $user_id = Auth::id();

        //   dd($user_id);
        $rat = Rating::create([
            'review'  => $request->review,
            'rating'  => $request->rating,
            'user_id' => $user_id,
            'ext_id'  => $request->ext_id
        ]);
        // dd($rat);

        if ($rat) {
            return redirect()->route('home')->with('success', 'Rating added successfully!');
        } else {
            return response()->json([
                'fails' => true,
                'msg'   => "Rating could not be added"
            ], 500);
        }
    }

    // public function rating_get($id)
    // {
    //     $rating = Extension::findOrfail($id); 
    //     return view('Extension.extensionpage',compact('rating'));
    // }

    public function rating_page($id)
    {
        return view('Extension.rating', compact(('id')));
    }
}
