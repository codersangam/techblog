<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $result = Category::all();
        $categories_count = $result->count();
        if ($result) {
            return response()->json([
                "status" => 1,
                "categories_count" => $categories_count,
                "categories" => $result,
            ]);
        } else {
            return response()->json([
                "status" => 0,
                "message" => "Operation Failed!!",
            ]);
        }
    }

    public function addCategories(Request $request)
    {
        $rules = $request->validate([
            'title' => 'required',
            'slug' => 'required'
        ]);

        $data = new Category();
        $data->title = $rules['title'];
        $data->slug = $rules['slug'];
        $result = $data->save();

        if ($result) {
            return response()->json([
                "status" => 1,
                "message" => "Category Added Successfully!!"
            ]);
        } else {
            return response()->json([
                "status" => 0,
                "message" => "Operation Failed!!"
            ]);
        }
    }
    public function updateCategories(Request $request)
    {
        $rules = $request->validate([
            'title' => 'required',
            'slug' => 'required'
        ]);

        $data =  Category::find($request->id);
        $data->title = $rules['title'];
        $data->slug = $rules['slug'];
        $result = $data->save();

        if ($result) {
            return response()->json([
                "status" => 1,
                "message" => "Category Updated Successfully!!"
            ]);
        } else {
            return response()->json([
                "status" => 0,
                "message" => "Operation Failed!!"
            ]);
        }
    }

    public function deleteCategories($id)
    {
        $data = Category::find($id);
        $result = $data->delete();

        if ($result) {
            return response()->json([
                "status" => 1,
                "message" => "Category Deleted Successfully!!"
            ]);
        } else {
            return response()->json([
                "status" => 0,
                "message" => "Operation Failed!!"
            ]);
        }
    }


    // Api Functions
    public function postByCategory(Category $category)
    {
        $posts =  $category->posts();
        if ($posts) {
            return response()->json([
                "status" => 1,
                "posts" => $posts,
            ]);
        } else {
            return response()->json([
                "status" => 0,
                "message" => "Operation Failed!!"
            ]);
        }
    }
}
