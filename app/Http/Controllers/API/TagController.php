<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    public function index()
    {
        $result = Tag::all();
        $tags_count = $result->count();
        if ($result) {
            return response()->json([
                "status" => 1,
                "tags_count" => $tags_count,
                "tags" => $result,
            ]);
        } else {
            return response()->json([
                "status" => 0,
                "message" => "Operation Failed!!",
            ]);
        }
    }

    public function addTags(Request $request)
    {
        $rules = $request->validate([
            'title' => 'required',
            'slug' => 'required'
        ]);

        $data = new Tag();
        $data->title = $rules['title'];
        $data->slug = $rules['slug'];
        $result = $data->save();

        if ($result) {
            return response()->json([
                "status" => 1,
                "message" => "Tags Added Successfully!!"
            ]);
        } else {
            return response()->json([
                "status" => 0,
                "message" => "Operation Failed!!"
            ]);
        }
    }
    public function updateTags(Request $request)
    {
        $rules = $request->validate([
            'title' => 'required',
            'slug' => 'required'
        ]);

        $data =  Tag::find($request->id);
        $data->title = $rules['title'];
        $data->slug = $rules['slug'];
        $result = $data->save();

        if ($result) {
            return response()->json([
                "status" => 1,
                "message" => "Tags Updated Successfully!!"
            ]);
        } else {
            return response()->json([
                "status" => 0,
                "message" => "Operation Failed!!"
            ]);
        }
    }

    public function deleteTags($id)
    {
        $data = Tag::find($id);
        $result = $data->delete();

        if ($result) {
            return response()->json([
                "status" => 1,
                "message" => "Tags Deleted Successfully!!"
            ]);
        } else {
            return response()->json([
                "status" => 0,
                "message" => "Operation Failed!!"
            ]);
        }
    }
}
