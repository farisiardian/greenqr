<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\MainCategory;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index(){
        $banner = Banner::get();
        $category = MainCategory::get();
        return view('admin.banner.index')
            ->with('category',$category)  //folder/folder/page/
            ->with('banner',$banner);  //folder/folder/page/
    }

    public function addBanners(Request $request)
    {
        if (isset($request->image)) {
            $addMainCate = new Banner();
            $image = 'banner/' . time() . '.' . $request->image->getClientOriginalName();
            $request->image->storeAs('public/', $image);
            $addMainCate->image = $image;
            $addMainCate->name = $request->bannerName;
            $addMainCate->url = '';
            $addMainCate->category_id = '';
            $addMainCate->status = 1;
            $addMainCate->save();
            return back()->with('success', 'Add Banner Successfully Add!');
        }
        return redirect()->back();
    }

    public function editBanner($id){
        $view = Banner::where('id',$id)->first();
        return view('admin.banner.editBanner')->with('view',$view);
    }


//    public function addBannersPre(Request $request)
//    {
//        if (isset($request->image)) {
//            $addMainCate = new Banner();
//            $image = 'banner/' . time() . '.' . $request->image->getClientOriginalName();
//            $request->image->storeAs('public/', $image);
//            $addMainCate->image = $image;
//            $addMainCate->url = '';
//            $addMainCate->category_id = $request->cateId;
//            $addMainCate->status = 1;
//            $addMainCate->save();
//            return back()->with('success', 'Add Banner Successfully Add!');
//        }
//        return redirect()->back();
//    }

    public function updateBanner(Request $request){
        if(isset($request->image)) {
            $category = Banner::where('id', $request->id)->first();
            $image = 'category/'.time() . '.' .  $request->image->getClientOriginalName();
            $request->image->storeAs('public/', $image);
            $category->image = $image;
            $category->name = $request->cateName2;
            $category->save();
            return back()->with('success', 'Update Banner Successfully!');
        }
        return redirect()->back();
    }

    public function deleteBanner($id){
        $data=Banner::find($id);
        $data->delete();
        return back()->with('success','Delete Successfully!');
        return redirect()-back();
    }


}
