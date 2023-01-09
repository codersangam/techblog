<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $data = User::join('posts', 'posts.user_id', '=', 'users.id')
            ->distinct()
            ->get();
        return $data;
    }

    public function list()
    {
        $currentUser = Auth::user();
        $data = Post::where('user_id', '=', $currentUser->id)->orderBy('created_at', 'DESC')->get();
        return $data;
    }
}
