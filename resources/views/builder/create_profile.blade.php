@extends('layouts.estate')
@section('content')
<link rel="stylesheet" href="{{ url('estate/summernote/summernote-bs4.css')}}">
<section class="dashboard-section">
    <div class="container">
        <div class="dashboard-row d-flex flex-wrap">
            @include('partials.dashboardsidebar', ['user'=>$data['user'], 'propertycount'=>$data['p_count'], 'is_builder'=>$data['is_builder']])
            <div class="dashboard-content-col">
                <div class="dashboard-title-wrap d-lg-block d-none">
                    <h1 class="dark-font text-left dashboard-title mb-4 ">Dashboard</h1>
                </div>
                <div class="refer-box side-refer-box text-center mb-5">
                    Refer To Your Friend
                </div>
                <div class="step-bar px-sm-5">
                    <ul class="d-flex step-list">
                        <li class="position-relative step-item step-done"><span class="d-block">1</span></li>
                        <li class="position-relative step-item"><span class="d-block">2</span></li>
                        <li class="position-relative step-item"><span class="d-block">3</span></li>
                    </ul>
                </div>

                <div class="step-content box-style">
                    <h3 class="dark-font text-center step-title">Add Details</h3>
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
                    <form action="{{ route('frontuser.builder-detail.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="company_name">Company Name</label>
            <input type="text" name="company_name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="company_logo">Company Logo</label>
            <input type="file" name="company_logo" class="form-control-file" accept="image/*" required>
        </div>

        <div class="form-group">
            <label for="banner_image">Banner Image</label>
            <input type="file" name="banner_image" class="form-control-file" accept="image/*" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control textarea" rows="4" required></textarea>
        </div>

        <div class="form-group">
            <label for="portfolio">Portfolio URL</label>
            <input type="url" name="portfolio" class="form-control">
        </div>

        <div class="form-group">
            <label for="total_experience">Total Experience</label>
            <input type="number" name="total_experience" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="total_projects">Total Projects</label>
            <input type="number" name="total_projects" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="total_flexible_living">Total Flexible Living</label>
            <input type="number" name="total_flexible_living" class="form-control">
        </div>

        <div class="form-group">
            <label for="running_projects">Running Projects</label>
            <input type="number" name="running_projects" class="form-control">
        </div>

        <div class="form-group">
            <label for="completed_projects">Completed Projects</label>
            <input type="number" name="completed_projects" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Next</button>
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
<script src="{{ url('estate/summernote/summernote-bs4.min.js')}}"></script>
<script>
  $(function() {
        // Summernote
        $('.textarea').summernote()
    })


</script>
@endsection