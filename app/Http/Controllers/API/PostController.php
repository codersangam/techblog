<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index()
    {
        $data = User::join('posts', 'posts.user_id', '=', 'users.id')
            ->join('posts', 'posts.id', '=', 'post_tags.post_id')
            ->distinct()
            ->get();

        // $data = DB::table('users')
        //     ->join('posts', 'posts.user_id', '=', 'users.id')
        //     ->join('category_posts', 'category_posts.post_id', '=', 'posts.id')
        //     ->get();
        return $data;
    }
}
