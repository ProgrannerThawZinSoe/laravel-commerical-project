<?php

namespace App\Http\Controllers;

use App\Blog;
use App\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Laravel\Ui\Presets\React;
use Illuminate\Support\Facades\Hash;
use App\Rules\MatchOldPassword;
use App\User;
use App\Article;
use Illuminate\Support\Facades\DB;


class BlogController extends Controller
{
    //index
    public function index(){
        $blogs = Blog::when(isset(request()->search), function ($q) {
            $search = request()->search;
            return $q->orwhere("title", "like", "%$search%")->orwhere("description", "like", "%$search%");
        })->with(['user', 'category'])->latest('id')->paginate(7);
        return view('blog.index', compact('blogs'));
    }

     //create
     public function create(){
        $blogcategory = BlogCategory::get();
        return view("blog.create",[
            "blogcategory" => $blogcategory,
        ]);
    }

    //store
    public function store(Request $request){

        $request->validate([
            "photo" => "required|mimes:png,jpg,jpeg|file|max:25000",
            "title" => "required|string",
            "read" => "required|string",
            "category" => "required|string",
            "description" => "required|string",
        ]);
        
        $blog = new Blog();

        $blog->title = $request->title;
        $blog->categories = $request->category;
        $blog->read_time = $request->read;
        $blog->description = $request->description;
        $user = User::find(Auth::id());
        $blog->user_id = $user->name;
        

        $file = $request->file("photo");
        $imageName = time().'.'.$file->getClientOriginalExtension();
        $file->move(public_path('/blog-images'), $imageName);

        $blog->feature_image = $imageName;

        $blog->save();

        return redirect('/dashboard/blogs')->with("toast", ["icon" => "success", "title" => "Blog Create Success."]);
        
    }

    public function show($id){
        $blog = Blog::where("id","=",$id)->get();
        return view("blog.show",[
            "blogs" => $blog
            
        ]);
    }

     //edit
     public function edit($id){
        $blog = Blog::where("id","=",$id)->get();
        $blogcategory = BlogCategory::get();
        return view("blog.edit",[
            "blogs" => $blog,
            "blogcategory" => $blogcategory,
        ]);
    }

     //upgrade
     public function upgrade(Request $request,$id){
        $request->validate([
            "photo" => "required|mimes:png,jpg,jpeg|file|max:25000",
            "title" => "required|string",
            "read" => "required|string",
            "category" => "required|string",
            "description" => "required|string",
        ]);
        
        $user = User::find(Auth::id());
        $file = $request->file("photo");
        $imageName = time().'.'.$file->getClientOriginalExtension();
        $file->move(public_path('/blog-images'), $imageName);

        DB::table("blogs")->where("id",$request->id)->update([
            "title" => $request->title,
            "categories" => $request->category,
            "read_time" => $request->read,
            "description" => $request->description,
            "user_id" => $user->name,
            "feature_image" => $imageName,
        ]);



        return redirect('/dashboard/blogs')->with("toast", ["icon" => "success", "title" => "Blog Upgrade Success."]);
        
    }

    //delete
    public function delete($id){
      $blog =  Blog::find($id);
      $blog->delete();
      return redirect('/dashboard/blogs')->with("toast", ["icon" => "success", "title" => "Blog Delete Success."]);
    }
}
