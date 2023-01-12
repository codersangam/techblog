@extends('layouts.master')
@section('content')
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-content widget-content-area br-6">
            <a href="/admin/post/add"><button type="button" class="btn btn-primary mb-2 m-3">
                    Add New Post
                </button></a>

            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Posted By</th>
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $Sno = 1; ?>
                        @foreach ($lists as $list)
                            <tr>
                                <td>{{ $Sno }}</td>
                                <td>{{ $list->user->name }}</td>
                                <td>{{ $list['title'] }}</td>
                                <td>{{ $list['slug'] }}</td>

                                @if ($list->status == '1')
                                    <td>Published</td>
                                @else
                                    <td>Not Published</td>
                                @endif
                                <td>{{ $list['updated_at'] }}</td>
                                <td>
                                    <a class="btn btn-success" href="{{ '/admin/post/edit/' . $list['id'] }}">Edit</a>
                                    <a class="btn btn-danger" href="{{ '/admin/post/delete/' . $list['id'] }}"
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
@endsection
