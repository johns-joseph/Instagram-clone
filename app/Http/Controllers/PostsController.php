<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use views\posts;

class PostsController extends Controller
{
    //
    public function create()
    {
        return view('posts\create');
    }
}
