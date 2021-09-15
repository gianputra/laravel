<?php

namespace App\Http\Controllers;

use DB;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $articles = DB::table('articles')->get();
        // dd($articles);
        return view('about', compact('articles'));
    }
}
