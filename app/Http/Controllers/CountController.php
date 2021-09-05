<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;

class CountController extends Controller
{
    public function index()
    {
        $data['tagcount']     = Tag::all()->count();
        $data['categorycount']    = Category::all()->count();
        $data['postcount']    = Post::all()->count();
        $data['usercount'] = User::all()->count();
        return view('dashboard')->with($data);
    }
}
