<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $category = Category::all();
        return view('category.catindex',compact('category'));
    }
    public function create(){
        return view('category.create');
    }

    public function show($id){
        $category = Category::findOrfail($id);
        return view('category.show',compact('category'));
    }
    
    public function store(CategoryRequest $request){
         $validation = $request->validated();
        $category = Category::create($request->all());
        return redirect(route('category-show',$category->id));
    }

}
