@extends('layouts.admin')
@section('content')
<link rel="stylesheet" href="{{ url('estate/summernote/summernote-bs4.css')}}">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Edit Blog</h2>
            <form action="{{ route('admin.blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $blog->title) }}" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control textarea" required>{{ old('description', $blog->description) }}</textarea>
                </div>
                <div class="form-group">
                    <label for="link">Link</label>
                    <input type="url" name="link" id="link" class="form-control" value="{{ old('link', $blog->link) }}">
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" name="image" id="image" class="form-control-file">
                    @if($blog->image)
                        <img src="{{ asset('storage/' . $blog->image) }}" alt="Current Blog Image" class="mt-2" style="max-width: 200px;">
                    @else
                        <p>No Image</p>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Update Blog</button>
                <a href="{{ route('admin.blogs.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script src="{{ url('estate/summernote/summernote-bs4.min.js')}}"></script>
<script>
  $(function() {
        // Summernote
        $('.textarea').summernote()
    })


</script>

@endsection