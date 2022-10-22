<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $posts = Post::latest()->paginate(5);

        return view('index',compact('posts'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
