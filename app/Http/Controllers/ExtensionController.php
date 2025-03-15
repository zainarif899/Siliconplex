<?php

namespace App\Http\Controllers;

use App\Models\Extension;
use App\Http\Requests\ExtensionRequest;
use App\Models\Rating;
use Illuminate\Http\Request;

class ExtensionController extends Controller
{
    public function index()
    {
        $extension = Extension::all();
        return view('Extension.index', compact('extension'));
    }

    public function create()
    {
        return view('Extension.create');
    }

    public function store(ExtensionRequest $request)
    {
        $validation = $request->validated();
        $imageName = time() . '.' . request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'), $imageName);
        // dd($imageName);

        $Extension = Extension::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imageName,
            'price' => $request->price
        ]);
        // dd($Extension);
        return redirect(route('extension-index'));
    }

    public function show_all_extensions($id)
    {
        $shows = Extension::findOrFail($id);
        $reviews = Rating::where('ext_id', $id)->get();
        $averageRating = Rating::where('ext_id', $id)->avg('rating');

        return view('Extension.extensionpage', compact('shows', 'reviews', 'averageRating'));
    }
    public function Extension_edit($id)
    {
        $extension = Extension::findOrfail($id);
        // dd($extension);
        return view('Extension.extensionedit', compact('extension'));
    }

    public function update(ExtensionRequest $request, $id)
    {
        // dd($request);
        // $validation = $request->validate();
        // dd($validation);
        $imageName = time() . '.' . request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'), $imageName);
        $update = Extension::findOrfail($id);
        $update->update([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imageName,
            'price' => $request->price,
        ]);
        // dd($update);
        if ($update) {
            echo "the Update the Extension";

            return redirect(route('extension-index'));
        } else {
            echo "The update not add successfull";
        }
    }

    public function delete($id){
        $delete = Extension::findOrfail($id);
        if($delete->delete()){
            return redirect(route('extension-index'));
        }else{
            echo "the extension not deleted";
        }
    }
    // public function review_show($id){
    //     $review = Rating::where('ext_id', $id)->get(); 
    //     $shows = Extension::findOrFail($id);
    //     return view('Extension.extensionpage', compact('review', 'shows'));
    // }




}
