<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('admin.category.category',[
            'categories'=>$categories
        ]);

    }
    public function saveCategory(Request $request){
        $category = new Category();

        $category->cat_name = $request->cat_name;
        $category->cat_desc = $request->cat_desc;
        $category->status = $request->status;
        $category->save();
        return redirect()->back()->with('message','Category Added Successfully');

    }
    public function unpublishedCategory($id){
        $category = Category::find($id);
        $category->status = 0;
        $category->save();
        return back();
    }
    public function publishedCategory($id){
        $category = Category::find($id);
        $category->status = 1;
        $category->save();
        return back();
    }

    public function deleteCategory($id){

        $category = Category::find($id);
        try{
            $category->delete();
            return back()->with('message', 'Category Deleted Successfully');
        }catch (\Exception $e){
            return back()->with('message', 'Category Can not be deleted!');
        }
    }

    public function updateCategory(Request $request){

        $category = new Category();
        $category = category::find($request->id);
        $category->cat_name = $request->cat_name;
        $category->cat_desc = $request->cat_desc;
        $category->status = $request->status;
        $category->save();

        return back()->with('message','Category Updated Successfully.');
    }

}
