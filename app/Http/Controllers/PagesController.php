<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PagesController extends Controller
{
    public function index() {
        $posts1 = Post::where('type', '=', 'news')->orderBy('id', 'asc')->get();
        $posts2 = Post::where('type', '=', 'keuken')->orderBy('id', 'asc')->get();
        return view('posts.index')->with('posts1', $posts1)->with('posts2', $posts2);
    }
}
