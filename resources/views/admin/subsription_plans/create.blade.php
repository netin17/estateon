@extends('layouts.admin')
@section('content')
<link rel="stylesheet" href="{{ url('estate/summernote/summernote-bs4.css')}}">
<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} Subscription Plan
    </div>

    <div class="card-body">
        <form action="{{ route('admin.subscription.store', ['id' => $id])}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.subscription.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" required>
                @if($errors->has('name'))
                <em class="invalid-feedback">
                    {{ $errors->first('name') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.subscription.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="name">Title*</label>
                <input type="text" id="title" name="title" class="form-control" required>
                @if($errors->has('title'))
                <em class="invalid-feedback">
                    {{ $errors->first('title') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.subscription.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
                <label for="price">{{ trans('cruds.subscription.fields.price') }}*</label>
                <input type="number" id="price" name="price" class="form-control" required>
                @if($errors->has('price'))
                <em class="invalid-feedback">
                    {{ $errors->first('price') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.subscription.fields.price_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('time_in_monthes') ? 'has-error' : '' }}">
                <label for="time_in_monthes">{{ trans('cruds.subscription.fields.duration') }}</label>
                <input type="text" id="time_in_monthes" name="time_in_monthes" class="form-control" required>
                @if($errors->has('time_in_monthes'))
                <em class="invalid-feedback">
                    {{ $errors->first('time_in_monthes') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.subscription.fields.durtion_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('features') ? 'has-error' : '' }}">
                <label for="features">{{ trans('cruds.subscription.fields.features') }}</label>
                <textarea id="features" name="features" class="form-control textarea" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                @if($errors->has('features'))
                <em class="invalid-feedback">
                    {{ $errors->first('features') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.subscription.fields.features_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                <label for="features">Description</label>
                <textarea id="description" name="description" class="form-control textarea" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                @if($errors->has('description'))
                <em class="invalid-feedback">
                    {{ $errors->first('description') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.subscription.fields.features_helper') }}
                </p>
            </div>
            <div class="form-group">
                <p>Status</p>
                <input type="radio" id="active" name="status" value="active" @php if(old('status', 'active') === 'active') echo 'checked'; @endphp>
                <label for="active">Active</label><br>
                <input type="radio" id="inactive" name="status" value="inactive" @php if(old('status') === 'inactive') echo 'checked'; @endphp>
                <label for="inactive">Inactive</label><br>
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
    $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>
@endsection