<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function create()
    {
        return view('article.create');
    }

    public function store()
    {

        //validasi
        request()->validate([
            'title' => ['required'],
            'content' => ['required'],

        ]);

        $article = new Article;
        $article->title = request('title');
        $article->slug = \Str::slug(request('title')) . '-' . \Str::random(5);
        $article->content = request('content');
        $article->save();

        return back();
    }
}
