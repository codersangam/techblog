<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    public function list()
    {
        $data = Tag::all();
        return view('admin.tag.list', ['lists' => $data]);
    }

    public function add(Request $request)
    {
        $rules = $request->validate([
            'title' => 'required',
            'slug' => 'required'
        ]);

        $data = new Tag();
        $data->title = $rules['title'];
        $data->slug = $rules['slug'];
        $data->save();

        return redirect('admin/tag/list');
    }

    public function edit($id)
    {
        $data = Tag::find($id);
        return view('admin.tag.edit', ['edits' => $data]);
    }

    public function update(Request $request)
    {
        $rules = $request->validate([
            'title' => 'required',
            'slug' => 'required'
        ]);

        $data = Tag::find($request->id);
        $data->title = $rules['title'];
        $data->slug = $rules['slug'];
        $data->save();

        return redirect('admin/tag/list');
    }

    public function destroy($id)
    {
        $data = Tag::find($id);
        $data->delete();
        return redirect('admin/tag/list');
    }
}
