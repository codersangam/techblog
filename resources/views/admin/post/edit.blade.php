@extends('layouts.master')
@section('content')
<div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
    <div class="widget-content widget-content-area br-6">
        <div class="container">
            <div class="row layout-spacing">
                <div id="flActionButtons" class="col-lg-12 py-3">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4>Edit Post</h4>
                            </div>
                        </div>
                    </div>
                    <form class="form-vertical" action="/editpost" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input name="id" type="hidden" class="form-control" id="id" value="{{$edits['id']}}">
                        <div class="form-group mb-4">
                            <label class="control-label">Title</label>
                            <input type="text" name="title" class="form-control" value="{{$edits['title']}}">
                        </div>
                        <div class="form-group mb-4">
                            <label class="control-label">Slug</label>
                            <input type="text" name="slug" class="form-control" value="{{$edits['slug']}}">
                        </div>

                        <div class="n-chk form-group mb-4">
                            <label class="new-control new-checkbox checkbox-success">
                                <input type="checkbox" class="new-control-input" name="status" value="1" @if ($edits->status == 1)
                                {{ 'checked' }}
                                @endif>
                                <span class="new-control-indicator"></span>Publish
                            </label>
                        </div>
                        <div class="form-group mb-4">
                            <label class="control-label">Categories</label>
                            <select class="form-control tagging" multiple="multiple" name="categories[]">
                                @foreach ($categories as $category)
                                <option value=" {{ $category->id}}" @foreach ($edits->categories as $postCategory)
                                    @if ($postCategory->id == $category->id)
                                    selected
                                    @endif
                                    @endforeach
                                    >{{ $category->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-4">
                            <label class="control-label">Tags</label>
                            <select class="form-control tagging" multiple="multiple" name="tags[]">
                                @foreach ($tags as $tag)
                                <option value=" {{ $tag->id}}" @foreach ($edits->tags as $postTag)
                                    @if ($postTag->id == $tag->id)
                                    selected
                                    @endif
                                    @endforeach
                                    >{{ $tag->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-4">
                            <label class="control-label">Content</label>
                            <textarea id="summernote" name="body">{{$edits['body']}}</textarea>
                        </div>

                        <div class="custom-file-container" data-upload-id="myFirstImage">
                            <label>Upload (Single File) <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                            <label class="custom-file-container__custom-file">
                                <input type="file" class="custom-file-container__custom-file__custom-file-input" accept="image/*" name="featuredimage">
                                <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                <span class="custom-file-container__custom-file__custom-file-control"></span>
                            </label>
                            <div class="custom-file-container__image-preview"></div>
                        </div>

                        <input type="submit" value="Submit" class="btn btn-primary ml-3 mt-3">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection