<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index(Request $request){
        $product = Product::with('category')->get();
        return view('product.index',compact('product'));  
    }

    public function create(){
        $category = Category::all();
        return view('product.create',compact('category'));
    } 

    
    public function show($id){
        $product = Product::findOrfail($id);
        // $products = Product::with('category')->get();
        return view('product.show',compact('product'));
    }

    public function store(ProductRequest $request){
        $validation = $request->validated();
        $product = Product::create([
            'name'=>$request->name,
            'cat_id'=>$request->cat_id,
        ]);
        return view('product.show',compact('product'));
    }

    public function productpage(){
        $product = Product::with('category')->get();
        return view('product.productpage',compact('product'));
    }


}
