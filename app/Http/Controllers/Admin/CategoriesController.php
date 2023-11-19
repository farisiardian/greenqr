<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MainCategory;
use App\Models\ProductImage;
use App\Models\staff;
use App\Models\User;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index(){
        $category = MainCategory::get();
        return view('admin.categories.index')->with('category',$category);
    }

    public function editCategory($id){
        $view = MainCategory::where('sort_id',$id)->first();
        return view('admin.categories.editCategory')->with('view',$view);
    }

    public function updateCategory(Request $request){
        if(isset($request->image)) {
            $category = MainCategory::where('sort_id', $request->id)->first();
            $image = 'category/'.time() . '.' .  $request->image->getClientOriginalName();
            $request->image->storeAs('public/', $image);
            $category->image = $image;
            $category->name = $request->cateName2;
            $category->save();
            return back()->with('success', 'Update Category Successfully!');
        }
        return redirect()->back();
    }
//        if(isset($request->image)){
//        $addproductimage = new ProductImage;
//        $image = 'product/'.time() . '.' .  $request->image->getClientOriginalName();
//        $request->image->storeAs('public/', $image);
//        $addproductimage->image = $image;

    public function addMainCategory(Request $request){
        $id = MainCategory::select('id')->whereNull('deleted_at')->get();
        $count = count($id);
        //dd($count);
        if(isset($request->image)) {
            $addMainCate = new MainCategory();
            $image = 'category/'.time() . '.' .  $request->image->getClientOriginalName();
            $request->image->storeAs('public/', $image);
            $addMainCate->image = $image;
            $addMainCate->sort_id = $count + 1;
            $addMainCate->name = $request->cateName;
            $addMainCate->status = 1;
            $addMainCate->save();
            return back()->with('success','Add Main Category Successfully Add!');
        }
        return redirect()->back();
    }

    public function deleteCategories($id){
        $data=MainCategory::find($id);
        $data->delete();
        return back()->with('success','Delete Successfully!');
        return redirect()-back();
    }
}
