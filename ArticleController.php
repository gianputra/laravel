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
        $attr = request()->validate([
            'title' => ['required', 'min:3', 'max:191'],
            'content' => ['required'],

        ]);

        Article::create($attr);

        return back();
    }

    public function show($slug)
    {
        $article = Article::whereSlug($slug)->first();
        return view('article.show', compact('article'));
    }
}
