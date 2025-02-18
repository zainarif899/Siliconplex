<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index(ProductRequest $request){
        $validation = $request->validated();
        $validation = $request->safe()->only(['name','cat_id']);
        $product = Product::with('category')->get();
        // dd($product);
        return view('product.index',compact('product'));  
    }

    public function create(){
        $category = Category::all();
        return view('product.create',compact('category'));
    } 

    
    public function show($id){
        $product = Product::findOrfail($id);
        return view('product.show',compact('product'));
    }

    public function store(ProductRequest $request){
        $product = Product::create([
            'name'=>$request->name,
            'cat_id'=>$request->cat_id,
        ]);
        return view('product.show',compact('product'));
    }
}
