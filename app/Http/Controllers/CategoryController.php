<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function list()
    {
        $data = Category::all();
        return view('admin.category.list', ['lists' => $data]);
    }

    public function add(Request $request)
    {
        $rules = $request->validate([
            'title' => 'required',
            'slug' => 'required'
        ]);

        $data = new Category();
        $data->title = $rules['title'];
        $data->slug = $rules['slug'];
        $data->save();

        return redirect('admin/category/list');
    }

    public function edit($id)
    {
        $data = Category::find($id);
        return view('admin.category.edit', ['edits' => $data]);
    }

    public function update(Request $request)
    {
        $rules = $request->validate([
            'title' => 'required',
            'slug' => 'required'
        ]);

        $data = Category::find($request->id);
        $data->title = $rules['title'];
        $data->slug = $rules['slug'];
        $data->save();

        return redirect('admin/category/list');
    }

    public function destroy($id)
    {
        $data = Category::find($id);
        $data->delete();
        return redirect('admin/category/list');
    }
}
