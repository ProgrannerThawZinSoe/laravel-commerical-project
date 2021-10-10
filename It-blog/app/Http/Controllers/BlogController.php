<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $articles = Article::when(isset(request()->search), function ($q) {
            $search = request()->search;
            return $q->orwhere("title", "like", "%$search%")->orwhere("description", "like", "%$search%");
        })->with(['user', 'category'])->latest('id')->paginate(7);

        return view('welcome', compact('articles'));
    }

    public function detail($id)
    {
        $article = Article::find($id);
        return view('blog.detail', compact('article'));
    }
}
