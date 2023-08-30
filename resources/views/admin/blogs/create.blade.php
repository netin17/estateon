@extends('layouts.admin')
@section('content')
<link rel="stylesheet" href="{{ url('estate/summernote/summernote-bs4.css')}}">
<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} Blog
    </div>

    <div class="card-body">
        <form action="{{ route('admin.blogs.store') }}" method="POST" id="add-blogs" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="title">Title*</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ old('title', '') }}" required>
            </div>
            <div class="form-group {{ $errors->has('link') ? 'has-error' : '' }}">
                <label for="link">link*</label>
                <input type="text" id="link" name="link" class="form-control" value="{{ old('link', '') }}" required>
            </div>
            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                <label for="description">description*</label>
                <textarea id="description" name="description" class="form-control textarea"  required></textarea>
            </div>
            <div class="form-group d-flex align-items-center mb-4">
                                <label for="blog-image" class="d-block">Image <span class="d-block red-font" style="font-size: 12px;">(jpeg or png. only)</span></label>
                                <input type="file" name="image" id="blog-image" placeholder="" class="d-block form-control profile-form-fild" required />
                            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


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


