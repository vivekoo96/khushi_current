<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helpers;
use App\Models\Category;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redis;

class CategoryController extends Controller
{
    public function index(Category $category):View
    {
          $categories = $category::all();
        return view('admin.category.index',compact('categories'));
    }

    public function create():View
    {
          $categories = Category::all();
        return view('admin.category.create',compact('categories'));
    }

    public function store(Request $request):RedirectResponse
    {

          $request->validate([
            'name' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:categories,id',
        ]);
        $category = new Category();
        $category->name = $request->name;
        $category->slug = uniqueSlug($request->name,Category::class);
        $category->parent_id = $request->parent_id;
        $category->status = $request->status;
        $category->save();
        if($category){
            toastr()->success('Category has been saved successfully!', 'Congrats');
            return redirect()->route('category');
        }
    }
    public function edit(Request $request,$id):View{
        $category = Category::find($id);
        $categories   = Category::all();
        return view('admin.category.edit',compact('category',
    'categories',));
    }

    public function update(Request $request){
          $request->validate([
            'name' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:categories,id',
        ]);
        $category = Category::find($request->id);
        $category->name = $request->name;
        $category->slug = uniqueSlug($request->name,Category::class);
        $category->parent_id = $request->parent_id;
        $category->status = $request->status;
        $category->save();
        if($category){
            toastr()->success('Category has been updated successfully!', 'Congrats');
            return redirect()->route('category');
        }
    }

    public function delete(Request $request,$id){
        $category = Category::findOrFail($id);
        $category->delete();
         toastr()->success('Category has been deleted successfully!', 'Congrats');
            return redirect()->back();
    }
}
