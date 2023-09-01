@extends('layouts.admin')
@section('content')
<link rel="stylesheet" href="{{ url('estate/css/newcss/jquery.fancybox.min.css')}}" />
<link rel="stylesheet" href="{{ url('estate/summernote/summernote-bs4.css')}}">
<div class="container">
    <h1>Edit Builder</h1>
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
    <div class="card">
        <div class="card-header">
            <h3>Builder {{$data['builder']->name}}</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.builders.update', $data['builder']->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="card-body">
                    <h5 class="card-title">Basic Information</h5>

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $data['builder']->name) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="name">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $data['builder']->email) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="name">Contact Number</label>
                        <input type="number" name="contact_number" id="contact_number" class="form-control" value="{{ old('contact_number', $data['builder']->contact_number) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="name">Company Name</label>
                        <input type="text" name="company_name" id="company_name" class="form-control" value="{{ old('company_name', $data['builder']->company_name) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="name">Registration Number</label>
                        <input type="text" name="registration_number" id="registration_number" class="form-control" value="{{ old('registration_number', $data['builder']->registration_number) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="image">Id Proof</label>
                        <input type="file" name="id_proof" id="id_proof" class="form-control-file">
                        @if($data['builder']->id_proof)
                        <a href="{{asset('storage/' . $data['builder']->id_proof)}}" data-fancybox="gallery">
                            <img src="{{ asset('storage/' . $data['builder']->id_proof) }}" alt="Current id Image" class="mt-2" style="max-width: 200px;">
                        </a>
                        @else
                        <p>No Image</p>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Comment</label>
                        <textarea name="comment" class="form-control">{{ old('comment', $data['builder']->comment) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="active" {{$data['builder']->status=='active' ? 'selected': ''}}>Active</option>
                            <option value="inactive" {{$data['builder']->status=='inactive' ? 'selected': ''}}>InActive</option>
                        </select>
                    </div>


                </div>
                <div class="card-body">
                    <h5 class="card-title">More Information</h5>
                    <div class="form-group">
                        <label for="name">Company Name</label>
                        <input type="text" name="detail_company_name" id="detail_company_name" class="form-control" value="{{ old('detail_company_name', $data['builder']->details->company_name) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="image">Company Logo</label>
                        <input type="file" name="company_logo" id="company_logo" class="form-control-file">
                        @if($data['builder']->details->company_logo)
                        <a href="{{asset('storage/' . $data['builder']->details->company_logo)}}" data-fancybox="gallery">
                            <img src="{{ asset('storage/' . $data['builder']->details->company_logo) }}" alt="Current id Image" class="mt-2" style="max-width: 200px;">
                        </a>
                        @else
                        <p>No Image</p>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="image">Banner Image</label>
                        <input type="file" name="banner_image" id="banner_image" class="form-control-file">
                        @if($data['builder']->details->banner_image)
                        <a href="{{asset('storage/' . $data['builder']->details->banner_image)}}" data-fancybox="gallery">
                            <img src="{{ asset('storage/' . $data['builder']->details->banner_image) }}" alt="Current id Image" class="mt-2" style="max-width: 200px;">
                        </a>
                        @else
                        <p>No Image</p>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control textarea" rows="4" required>{{$data['builder']->details->description}}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="portfolio">Portfolio URL</label>
                        <input type="url" name="portfolio" value="{{$data['builder']->details->portfolio}}" class="form-control">
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label for="total_experience">Total Experience</label>
                                <input type="number" name="total_experience" value="{{$data['builder']->details->total_experience}}" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label for="total_projects">Total Projects</label>
                                <input type="number" name="total_projects" value="{{$data['builder']->details->total_projects}}" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label for="total_flexible_living">Total Flexible Living</label>
                                <input type="number" name="total_flexible_living" value="{{$data['builder']->details->total_flexible_living}}" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="running_projects">Running Projects</label>
                                <input type="number" name="running_projects" value="{{$data['builder']->details->running_projects}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="completed_projects">Completed Projects</label>
                                <input type="number" name="completed_projects" value="{{$data['builder']->details->completed_projects}}" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary submit-btn">Update</button>
                    </div>
            </form>



        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script src="{{ url('estate/js/jquery.fancybox.min.js')}}"></script>
<script src="{{ url('estate/summernote/summernote-bs4.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $.fancybox.defaults.animationEffect = "none";
        $.fancybox.defaults.transitionEffect = "none";
        $('[data-fancybox="gallery"]').fancybox();
        $('.textarea').summernote()
    })
</script>
@endsection