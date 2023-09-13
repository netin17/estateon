@extends('layouts.admin')
@section('content')

<div class="container">
    @if( count($data['cards']) < 6) <h1>Create Card</h1>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <form action="{{ route('admin.card.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" class="form-control-file" accept="image/*" required>
            </div>

            <div class="form-group">
                <label for="thumbnail">Thumbnail</label>
                <input type="file" name="thumbnail" class="form-control-file" accept="image/*" required>
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" class="form-control" required>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
        @endif
        <div class="col-12 col-md-8">
            <div class="card-items-box">
                @foreach($data['cards'] as $savedcard)
                <div class="card-items">
                    <label class="card-thumbnail">
                      
                        <a href="{{route('admin.card.edit',['id'=>$savedcard->id])}}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                        <img src="{{ asset('storage/' . $savedcard->thumbnail) }}" alt="Card Thumbnail">
                    </label>
                </div>
                @endforeach
            </div>
        </div>
</div>

@endsection