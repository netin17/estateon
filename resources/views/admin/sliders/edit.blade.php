@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Edit Slider</h2>
            <form action="{{ route('admin.sliders.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="title">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $slider->name) }}" required>
                </div>
               
                <button type="submit" class="btn btn-primary">Update Slider</button>
                <a href="{{ route('admin.sliders.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent


@endsection