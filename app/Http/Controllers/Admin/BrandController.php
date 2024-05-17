<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index(){
        return view('admin.brand.index');
    }
    public function create(){
        return view('admin.brand.create');
    }
    public function store(Request $request){

    }
    public function edit($id){
        return view('admin.brand.edit');
    }
    public function update(Request $request, $id){

    }
    public function destroy($id){

    }
}
