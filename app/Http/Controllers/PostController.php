<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function list()
    {
        $data = Post::all();
        return view('admin.post.list', ['lists' => $data]);
    }

    public function add()
    {
        $data1 = Category::all();
        $data2 = Tag::all();
        return view('admin.post.add', ['lists1' => $data1, 'lists2' => $data2]);
    }

    public function store(Request $request)
    {
        $rules = $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'body' => 'required|string',
            'featuredimage' => 'required'
        ]);

        if ($request->hasFile('featuredimage')) {
            $imageName = $request->featuredimage->store('public/featured-image');
        }

        $data = new Post();
        $data->user_id = Auth::id();
        $data->title = $rules['title'];
        $data->slug = $rules['slug'];
        $data->body = $rules['body'];
        $data->status = $request->status;
        $data->featuredimage = $imageName;
        $data->save();
        $data->categories()->sync($request->categories);
        $data->tags()->sync($request->tags);

        return redirect('admin/post/list');
    }

    public function edit($id)
    {
        $data = Post::find($id);
        $data1 = Category::all();
        $data2 = Tag::all();
        return view('admin.post.edit', ['edits' => $data, 'categories' => $data1, 'tags' => $data2]);
    }

    public function update(Request $request)
    {
        $rules = $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'body' => 'required',
            'featuredimage' => 'nullable'

        ]);

        if ($request->hasFile('featuredimage')) {
            $imageName = $request->featuredimage->store('public/featured-image');

            $data = Post::find($request->id);
            $data->title = $rules['title'];
            $data->slug = $rules['slug'];
            $data->body = $rules['body'];
            $data->status = $request->status;
            $data->featuredimage = $imageName;
            $data->save();

            $data->categories()->sync($request->categories);
            $data->tags()->sync($request->tags);
        } else {
            $data = Post::find($request->id);
            $data->user_id = Auth::id();
            $data->title = $rules['title'];
            $data->slug = $rules['slug'];
            $data->body = $rules['body'];
            $data->status = $request->status;
            $data->save();

            $data->categories()->sync($request->categories);
            $data->tags()->sync($request->tags);
        }

        return redirect('admin/post/list');
    }

    public function destroy($id)
    {
        $data = Post::find($id);
        $data->delete();
        return redirect('admin/post/list');
    }
}
