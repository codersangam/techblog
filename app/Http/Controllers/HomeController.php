<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Cookie;
use App\Models\Category;
use App\Models\SocialLink;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Models\Tag;
use Jorenvh\Share\Share;
use Illuminate\Support\Facades\URL;
use Jorenvh\Share\ShareFacade;

class HomeController extends Controller
{
    public function index()
    {
        $data = Post::where('status', 1)->orderBy('created_at', 'DESC')->paginate(5);
        // foreach ($data as $post) {
        //     echo $post->title;
        //     echo $post->user->name;
        // }
        // $data1 = User::join('posts', 'posts.user_id', '=', 'users.id')
        //     ->distinct()
        //     ->get();

        // return $data1;
        return view('frontend.posts.home', ['posts' => $data]);
    }

    public function singlepost(Post $post)
    {
        // if (Cookie::get($post->id) != '') {
        //     Cookie::set('$post->id', '1', 60);
        //     $post->incrementReadCount();
        // }

        $post->incrementReadCount();
        // $share = 'http://127.0.0.1:8000';
        return view('frontend.posts.singlepost', compact('post'));
    }

    public function postByCategory(Category $category)
    {
        $posts =  $category->posts();
        return view('frontend.posts.postsbycategory', compact('posts'));
    }

    public function postByTag(Tag $tag)
    {
        $posts =  $tag->posts();
        return view('frontend.posts.postsbytag', compact('posts'));
    }
}
