@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.amenity.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route('admin.amenity.update', [$amenity->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
            <label>Existing Icon Image: </label>
            @if ($amenity->image)
                <img src="{{ asset('storage/' . $amenity->image) }}" alt="Existing Icon Image" style="max-width: 100px;">
            @else
                No icon image available.
            @endif
        </div>

        <div class="form-group">
            <label for="name">Name*</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $amenity->name) }}" required>
        </div>
        
        <div class="form-group">
            <label for="change_image">Change Icon Image?</label>
            <input type="checkbox" name="change_image" id="change_image">
        </div>
        
        <div class="form-group" id="image_field" style="display: none;">
            <label for="image">Icon Image*</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>
        
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update</button>
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
    document.getElementById('change_image').addEventListener('change', function () {
            var imageField = document.getElementById('image_field');
            imageField.style.display = this.checked ? 'block' : 'none';
        });
})
    </script>
    @endsection