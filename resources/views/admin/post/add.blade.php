@extends('layouts.master')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>General Form</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">General Form</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-xl-12 col-lg-12 col-sm-12">
                    <!-- general form elements -->
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Add Post</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="store" method="POST" enctype="multipart/form-data" class="dropzone"
                            id="my-awesome-dropzone">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="postTitleInput">Title</label>
                                    <input type="text" class="form-control" id="postTitleInput" name="title" required
                                        placeholder="Example: This is Demo Title">
                                </div>
                                <div class="form-group">
                                    <label for="postSlugInput">Slug</label>
                                    <input type="text" class="form-control" id="postSlugInput" name="slug" required
                                        placeholder="Example: this-is-demo-slug">
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Categories</label>
                                    <div class="select2-purple">
                                        <select class="select2" multiple="multiple" data-dropdown-css-class="select2-purple"
                                            style="width: 100%;" name="categories[]">
                                            @foreach ($lists1 as $list)
                                                <option value="{{ $list->id }}">{{ $list->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Tags</label>
                                    <div class="select2-purple">
                                        <select class="select2" multiple="multiple" data-dropdown-css-class="select2-purple"
                                            style="width: 100%;" name="tags[]">
                                            @foreach ($lists2 as $list)
                                                <option value="{{ $list->id }}">{{ $list->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="n-chk form-group">
                                    <label class="new-control new-checkbox checkbox-success">
                                        <input type="checkbox" class="new-control-input" name="status" value="1">
                                        <span class="new-control-indicator"></span>Publish
                                    </label>
                                </div>

                                <div class="card card-outline card-info">
                                    <div class="card-header">
                                        <h3 class="card-title">
                                            Content
                                        </h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <textarea id="summernote" name="body">
                                                Place <em>some</em> <u>text</u> <strong>here</strong>
                                         </textarea>
                                    </div>
                                </div>

                                <div class="card card-default">
                                    <div class="card-header">
                                        <h3 class="card-title">Featured Image (660*330)</h3>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group card-body">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="exampleInputFile"
                                                    name="featuredimage">
                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>
        $('#postTitleInput').keyup(function() {
            var replaceSpace = $(this).val();
            var result = replaceSpace.replace(/\s/g, "-").toLowerCase();
            $("#postSlugInput").val(result);
        });
    </script>
@endsection
