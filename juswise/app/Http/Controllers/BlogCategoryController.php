<?php

namespace App\Http\Controllers;

use App\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Ui\Presets\React;

class BlogCategoryController extends Controller
{
    //index
    public function index(){
        $blogCategory = BlogCategory::get();
        return view("blog-category.index",[
            "blogCategory"=> $blogCategory,
        ]);
    }

    //create
    public function create(Request $request)
    {
        $request->validate([
            "title" => "required|unique:article_categories,title"
        ]);

        $blogCategory = new BlogCategory();
        $blogCategory->title = $request->title;
        $blogCategory->user_id = Auth::id();
        $blogCategory->save();

        return redirect('/dashboard/blog-category')->with('toast', ['icon' => 'success', 'title' => 'New Category Created']);
    }

    //delete
    public function destory($id)
    {
        $blog = BlogCategory::find($id);
        $blog->delete();
        return redirect("/dashboard/blog-category")->with('toast', ['icon' => 'success', 'title' =>  "Category  delete Success."]);
    }

    //edit
    public function edit($id){
        $blogCategory = BlogCategory::get();
        $blog = BlogCategory::where("id","=",$id)->get();
        return view("blog-category.edit",[
            "blogs" => $blog,
            "blogCategory"=> $blogCategory,
        ]);
       
    }

    public function upgrade(Request $request,$id){
        $request->validate([
            "title" => "required|unique:article_categories,title"
        ]);

        DB::table("blog_categories")->where("id",$request->id)->update([
            "title" => $request->title,
        ]);



        return redirect('/dashboard/blog-category')->with('toast', ['icon' => 'success', 'title' => ' Category Upgrade Success']);
    }
}
