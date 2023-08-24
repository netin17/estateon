@extends('layouts.estate')
@section('content')
<link rel="stylesheet" href="{{ url('estate/summernote/summernote-bs4.css')}}">
<link rel="stylesheet" href="{{ url('estate/css/newcss/jquery.fancybox.min.css')}}" />
<section class="dashboard-section">
    <div class="container">
        <div class="dashboard-row d-flex flex-wrap">
            @include('partials.dashboardsidebar', ['user'=>$data['user'], 'propertycount'=>$data['p_count'], 'is_builder'=>$data['is_builder']])
            <div class="dashboard-content-col">
                <div class="dashboard-title-wrap d-lg-block d-none">
                    <h1 class="dark-font text-left dashboard-title mb-4 ">Dashboard</h1>
                </div>
                <div class="refer-box side-refer-box text-center mb-5">
                    Builder Dashboard
                </div>
                

                <div class="step-content box-style">
                    <h3 class="dark-font text-center step-title">Add Details</h3>
					<div class="step-bar px-sm-5">
						<ul class="d-flex step-list">
							<li class="position-relative step-item step-done"><span class="d-block">1</span></li>
							<li class="position-relative step-item"><span class="d-block">2</span></li>
							<li class="position-relative step-item"><span class="d-block">3</span></li>
						</ul>
					</div>
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
                    <form action="{{ route('frontuser.builder-detail.edit', $data['builder_detail']->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

        <div class="form-group">
            <label for="company_name">Company Name</label>
            <input type="text" name="company_name" value="{{$data['builder_detail']->company_name ?? ''}}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="company_logo">Company Logo</label>
            <input type="file" name="company_logo" class="form-control-file" accept="image/*">
            <div>
            <a href="{{ asset('storage/' . $data['builder_detail']->company_logo) }}" data-fancybox="gallery"><img src="{{ asset('storage/' . $data['builder_detail']->company_logo) }}" alt="Existing Icon Image" style="max-width: 100px;"></a>
            </div>
        </div>

        <div class="form-group">
            <label for="banner_image">Banner Image</label>
            <input type="file" name="banner_image" class="form-control-file" accept="image/*">
            <div class="banner-img-box">
            <a href="{{ asset('storage/' . $data['builder_detail']->banner_image) }}" data-fancybox="gallery"><img src="{{ asset('storage/' . $data['builder_detail']->banner_image) }}" alt="Existing Icon Image" style="max-width: 100px;"></a>
            </div>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control textarea" rows="4" required>{{$data['builder_detail']->description}}</textarea>
        </div>

        <div class="form-group">
            <label for="portfolio">Portfolio URL</label>
            <input type="url" name="portfolio" value="{{$data['builder_detail']->portfolio}}" class="form-control">
        </div>
		
		<div class="row">
			<div class="col-12 col-md-4">
				<div class="form-group">
					<label for="total_experience">Total Experience</label>
					<input type="number" name="total_experience" value="{{$data['builder_detail']->total_experience}}" class="form-control" required>
				</div>
			</div>
			<div class="col-12 col-md-4">
				<div class="form-group">
					<label for="total_projects">Total Projects</label>
					<input type="number" name="total_projects" value="{{$data['builder_detail']->total_projects}}" class="form-control" required>
				</div>
			</div>
			<div class="col-12 col-md-4">
				<div class="form-group">
					<label for="total_flexible_living">Total Flexible Living</label>
					<input type="number" name="total_flexible_living" value="{{$data['builder_detail']->total_flexible_living}}" class="form-control">
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-12 col-md-6">
				<div class="form-group">
					<label for="running_projects">Running Projects</label>
					<input type="number" name="running_projects" value="{{$data['builder_detail']->running_projects}}" class="form-control">
				</div>
			</div>
			<div class="col-12 col-md-6">
				<div class="form-group">
					<label for="completed_projects">Completed Projects</label>
					<input type="number" name="completed_projects" value="{{$data['builder_detail']->completed_projects}}" class="form-control">
				</div>
			</div>
		</div>
		
		<div class="d-flex justify-content-end">
			<button type="submit" class="btn btn-primary submit-btn">Next</button>
		</div>

    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@section('scripts')
<script src="{{ url('estate/js/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{ url('estate/js/jquery-validation/additional-methods.min.js')}}"></script>
<script src="{{ url('estate/js/jquery.fancybox.min.js')}}"></script>
<script src="{{ url('estate/summernote/summernote-bs4.min.js')}}"></script>
<script>
$(document).ready(function(){

    $('.textarea').summernote()
    $.fancybox.defaults.animationEffect = "none";
  $.fancybox.defaults.transitionEffect = "none";
    $('[data-fancybox="gallery"]').fancybox();
})


</script>
@endsection