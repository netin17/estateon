@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Sliders</h2>
            <a href="{{ route('admin.sliders.create') }}" class="btn btn-primary mb-3">Add New Slider</a>
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sliders as $slide)
                    <tr>
                        <td>{{ $slide->name }}</td>
                        <td>
                            <a href="{{ route('admin.sliders.show', $slide->id) }}" class="btn btn-sm btn-info">View</a>
                           <a href="{{ route('admin.sliders.edit', $slide->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('admin.sliders.destroy', $slide->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this Slider?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                <tr>
                        <td colspan="8" class="text-center pgntion">{{ $sliders->links() }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent



@endsection