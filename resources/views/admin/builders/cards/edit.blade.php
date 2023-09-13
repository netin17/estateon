@extends('layouts.admin')
@section('content')
<link rel="stylesheet" href="{{ url('estate/summernote/summernote-bs4.css')}}">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Edit Blog</h2>
            <form action="{{ route('admin.card.update', $data['card']->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" name="image" id="image" class="form-control-file">
                    @if($data['card']->image)
                        <img src="{{ asset('storage/' . $data['card']->image) }}" alt="Current Card Image" class="mt-2" style="max-width: 200px;">
                    @else
                        <p>No Image</p>
                    @endif
                </div>

                <div class="form-group">
                    <label for="thumbnail">Thumbnail</label>
                    <input type="file" name="thumbnail" id="thumbnail" class="form-control-file">
                    @if($data['card']->image)
                        <img src="{{ asset('storage/' . $data['card']->thumbnail) }}" alt="Current Card Thumbnail" class="mt-2" style="max-width: 200px;">
                    @else
                        <p>No Image</p>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Update Card</button>
                <a href="{{ route('admin.card.create') }}" class="btn btn-secondary">Cancel</a>
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