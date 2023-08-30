@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Blog Details</h2>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $blog->title }}</h5>
                    <p class="card-text">{!! $blog->description !!}</p>
                    @if($blog->link)
                        <p><strong>Link:</strong> <a href="{{ $blog->link }}" target="_blank">{{ $blog->link }}</a></p>
                    @endif
                    @if($blog->image)
                        <img src="{{ asset('storage/' . $blog->image) }}" alt="Blog Image" class="img-fluid">
                    @else
                        <p>No Image</p>
                    @endif
                </div>
            </div>
            <a href="{{ route('admin.blogs.index') }}" class="btn btn-secondary mt-3">Back to Blogs</a>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent



@endsection