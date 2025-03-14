<?php

namespace App\Http\Controllers;
use App\Models\Extension;
use App\Http\Requests\ExtensionRequest;
use App\Models\Rating;
use Illuminate\Http\Request;

class ExtensionController extends Controller
{
    public function index(){
        $Extension = Extension::all();
        return view('Extension.index',compact('Extension'));
    }

    public function create(){
        return view('Extension.create');
    }

    public function store(ExtensionRequest $request){
        $validation = $request->validated();
        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'), $imageName);
        // dd($imageName);

        $Extension = Extension::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'image'=>$imageName
        ]);
        // dd($Extension);
        return redirect(route('extension-index'));
    }

    public function show_all_extensions($id){
        $shows = Extension::findOrFail($id);
        $reviews = Rating::where('ext_id', $id)->get();
        return view('Extension.extensionpage', compact('shows', 'reviews'));
    }
    

    // public function review_show($id){
    //     $review = Rating::where('ext_id', $id)->get(); 
    //     $shows = Extension::findOrFail($id);
    //     return view('Extension.extensionpage', compact('review', 'shows'));
    // }
    

  

}
