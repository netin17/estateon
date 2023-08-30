@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Blogs</h2>
            <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary mb-3">Add New Blog</a>
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Link</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($blogs as $blog)
                    <tr>
                        <td>{{ $blog->title }}</td>
                        <td>{!! $blog->description !!}</td>
                        <td>{{ $blog->link }}</td>
                        <td>
                            @if($blog->image)
                                <img src="{{ asset('storage/' . $blog->image) }}" alt="Blog Image" class="img-thumbnail" width="100">
                            @else
                                No Image
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.blogs.show', $blog->id) }}" class="btn btn-sm btn-info">View</a>
                            <a href="{{ route('admin.blogs.edit', $blog->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('admin.blogs.destroy', $blog->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this blog?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                <tr>
                        <td colspan="8" class="text-center pgntion">{{ $blogs->links() }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent



@endsection