@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.amenity.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route('admin.amenity.store') }}" method="POST" id="add-aminities" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.amenity.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.amenity.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group d-flex align-items-center mb-4">
                                <label for="banner-image" class="d-block">Icon Image <span class="d-block red-font" style="font-size: 12px;">(jpeg or png. only)</span></label>
                                <input type="file" name="image" id="banner-image" placeholder="" class="d-block form-control profile-form-fild" required />
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
<script src="{{ url('estate/js/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{ url('estate/js/jquery-validation/additional-methods.min.js')}}"></script>
<script type="text/javascript">
$(document).ready(function(){
    var val = {
        rules: {
           
            image: {
                required: true,
                extension: "jpg|jpeg|png"
            },
            name: 'required',
        },
        messages: {
            image: {
                required: "Please select an image",
                extension: "Only JPG, JPEG, or PNG files are allowed"
            },
            name: "Enter name for your property",
            
        },
    
    }
    $("#add-aminities").validate(val)
})
    </script>
    @endsection