<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($slug){

        $category = Category::where('slug',$slug)->first();


        $product = $category->product;
        if($product != null){
       return view('frontend.productDetails',compact('product','category'));
        }else{
            abort(404);
        }


    }
    public function product($slug){
        $product = Product::where('slug',$slug)->first();
        if($product != null)
        {
        $category = $product->subcategory;
        return view('frontend.productDetails',compact('product','category'));
        }
        else{
        abort(404);
        }
    }
}
