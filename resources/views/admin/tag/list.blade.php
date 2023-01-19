@extends('layouts.master')
@section('content')
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-content widget-content-area br-6">
            <button type="button" class="btn btn-primary mb-2 m-3" data-toggle="modal" data-target="#exampleModalCenter">
                Add New Tag
            </button>

            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $Sno = 1; ?>
                        @foreach ($lists as $list)
                            <tr>
                                <td>{{ $Sno }}</td>
                                <td>{{ $list['title'] }}</td>
                                <td>{{ $list['slug'] }}</td>
                                <td>{{ $list['updated_at'] }}</td>
                                <td>
                                    <a class="btn btn-success" href="{{ '/admin/tag/edit/' . $list['id'] }}">Edit</a>
                                    <a class="btn btn-danger" href="{{ '/admin/tag/delete/' . $list['id'] }}"
                                        onclick="return confirm('Are you sure?');">Delete</a>
                                </td>
                            </tr>
                            <?php $Sno++; ?>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <div class="modal fade" id="exampleModalCenter" tabindex="-2" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">New Tag</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-x">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                </div>
                <form action="add" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group mb-4">
                            <label for="inputTitle">Title</label>
                            <input type="text" class="form-control" id="inputTitle" name="title"
                                placeholder="Example: Red">
                        </div>
                        <div class="form-group mb-4">
                            <label for="inputSlug">Slug</label>
                            <input type="text" class="form-control" id="inputSlug" name="slug"
                                placeholder="Example: red">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>
        $('#inputTitle').keyup(function() {
            var replaceSpace = $(this).val();
            var result = replaceSpace.replace(/\s/g, "-").toLowerCase();
            $("#inputSlug").val(result);

        });
    </script>
@endsection
