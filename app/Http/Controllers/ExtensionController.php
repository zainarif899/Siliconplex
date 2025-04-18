<?php

namespace App\Http\Controllers;

use App\Models\Extension;
use App\Http\Requests\ExtensionRequest;
use App\Models\Rating;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

use function Laravel\Prompts\error;

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
            'price' => $request->price,
            'image' => $imageName,
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

    public function delete($id)
    {
        $delete = Extension::findOrfail($id);
        if ($delete->delete()) {
            return redirect(route('extension-index'));
        } else {
            echo "the extension not deleted";
        }
    }

    public function search(Request $request)
    {
        $name = $request->query('name');
        $search = Extension::where('name', 'LIKE', "%$name%")->first();
        // dd($search);
        if ($search) {
            return redirect()->route('extension-show', ['id' => $search->id]);
        } else {
            return response()->json(['message' => 'No results found'], 404);
        }
    }

    // public function search_box(){
    //     $searchbox = Extension::paginate(10);
    //     dd($searchbox);
    //     return view('home',compact('searchbox'));
    // }

    public function autocomplete(Request $request)
    {
        $query = $request->get('query'); // User ka input

        $results = Extension::where('name', 'LIKE', "%{$query}%")
            ->pluck('name'); // Sirf names chahiye

        return response()->json($results);
    }
}
