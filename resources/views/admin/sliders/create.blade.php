@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} Slider
    </div>

    <div class="card-body">
        <form action="{{ route('admin.sliders.store') }}" method="POST" id="add-sliders" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="title">Name*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', '') }}" required>
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

@endsection


