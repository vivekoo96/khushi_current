<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\FileUploadTrait;
use App\Helpers\Helpers;

class ProductController extends Controller
{
     use FileUploadTrait;
    public function index(){
        $products = Product::all();
        return view('admin.product.index',compact('products'));
    }
    public function create(){
            $categories = Category::with('children')->whereNull('parent_id')->get();

        return view('admin.product.create',compact('categories'));
    }
    public function store(Request $request){
      $request->validate([
        'name' => 'required',
        'category_id' => 'required|numeric',
        'short_desc' => 'required',
        'descs' => 'required',
        'image' => 'required',
      ]);
        $product = new Product();
        $product->name = $request->name;
        $product->slug = uniqueSlug($request->name,Product::class);
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;
         $product->sub_subcategory = $request->sub_subcategory_id;
        $product->short_description = $request->short_desc;
        $product->description = $request->descs;
        if($request->hasFile('image')){
            $product->images =  json_encode($this->uploadMultipleFiles($request->file('image'), 'Product'));
        }
        $product->save();
         if($product){
            toastr()->success('product has been saved successfully!', 'Congrats');
            return redirect()->route('product');
        }
    }
    public function edit(Request $request,$id){
        $product = Product::find($id);
          $categories = Category::with('children')->whereNull('parent_id')->get();
        return view('admin.product.edit',compact('product', 'categories'));
    }
    public function update(Request $request){
        $request->validate([
        'name' => 'required',
        'category_id' => 'required|numeric',
        'short_desc' => 'required',
        'descs' => 'required',
      ]);
        $product = Product::find($request->id);
        $product->name = $request->name;
        $product->slug = uniqueSlug($request->name,Product::class);
        $product->category_id = $request->category_id;
        if($request->subcategory_id){
            $product->subcategory_id = $request->subcategory_id;
        }
           if($request->sub_subcategory_id){
         $product->sub_subcategory = $request->sub_subcategory_id;
           }
        $product->short_description = $request->short_desc;
        $product->description = $request->descs;
        if($request->hasFile('image')){
            $product->images =  json_encode($this->uploadMultipleFiles($request->file('image'), 'Product'));
        }
        $product->save();
         if($product){
            toastr()->success('product has been updated successfully!', 'Congrats');
            return redirect()->route('product');
        }
    }
    public function delete($id){
        $product = Product::findOrFail($id);
        $product->delete();
         toastr()->success('product has been deleted successfully!', 'Congrats');
            return back();

    }

    public function getSubcategories($id)
{
    $category = Category::findOrFail($id);
    $subcategories = $category->children;

    return response()->json($subcategories);
}

  public function subsubcategories($id)
{
    $category = Category::findOrFail($id);
    $subcategories = $category->children;

    return response()->json($subcategories);
}
}
