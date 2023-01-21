<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
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

        if ($data) {
            return response()->json([
                "status" => 1,
                "total_tags_count" => $data['tagcount'],
                "total_categories_count" => $data['categorycount'],
                "total_posts_count" =>  $data['postcount'],
                "total_users_count" => $data['usercount'],
            ]);
        } else {
            return response()->json([
                "status" => 0,
                "message" => "Operation Failed!!"
            ]);
        }
    }
}
