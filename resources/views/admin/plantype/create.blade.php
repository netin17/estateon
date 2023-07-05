@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} Plan
    </div>

    <div class="card-body">
        <form action="{{ route("admin.subscription.planstore") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.subscription.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" required>
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
