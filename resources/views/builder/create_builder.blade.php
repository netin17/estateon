@extends('layouts.estate')
@section('content')
<section class="dashboard-section">
    <div class="container">
        <div class="dashboard-row d-flex flex-wrap">
            @include('partials.dashboardsidebar', ['user'=>$data['user'], 'propertycount'=>$data['p_count'], 'is_builder'=>$data['is_builder']])
            <div class="dashboard-content-col">
                <div class="dashboard-title-wrap d-lg-block d-none">
                    <h1 class="dark-font text-left dashboard-title mb-4 ">Dashboard</h1>
                </div>
                <div class="refer-box-red side-refer-box text-center mb-5">
                    Activate Builder Profile
                </div>
                <div class="step-content box-style">
                    <h3 class="dark-font text-center step-title">Add Basic Information</h3>
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
                    @if(!$data['profile_created'])
                    <form id="create-form" action="{{ route('frontuser.builders.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label>Builder Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Contact Number</label>
                            <input type="text" name="contact_number" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Company Name</label>
                            <input type="text" name="company_name" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Registration Number</label>
                            <input type="text" name="registration_number" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>ID Proof (Image/PDF)</label>
                            <input type="file" name="id_proof" class="form-control-file" required>
                        </div>

                        <div class="form-group">
                            <label>Comment</label>
                            <textarea name="comment" class="form-control"></textarea>
                        </div>
						
						<div class="d-flex justify-content-end">
							<button type="submit" class="btn btn-primary submit-btn">Create Builder</button>
						</div>
                    </form>
                    @else
                    <div>
                        @if($data['profile_created']->status=='inactive')
                        <div class="alert text-center alert-warning" role="alert">
                            Your profile is under review.
                        </div>
                        @else
                        <div class="alert text-center alert-success">
                            Your profile is approved.
                            @if ($data['profile_created'] && $data['profile_created']->details)
                            <a class="alert-link" href="{{route('frontuser.builder.profile_edit')}}">View your profile</a>
                            @else
                            <a href="{{route('frontuser.builder.profile_create')}}">Create your profile</a>
                            @endif


                        </div>
                        @endif
                    </div>
                    @endif
                </div>

            </div>
        </div>
    </div>
</section>

@endsection
@section('scripts')
<script src="{{ url('estate/js/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{ url('estate/js/jquery-validation/additional-methods.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $("#create-form").validate({
            rules: {
                name: {
                    required: true,
                    regex: /^[a-zA-Z\s]+$/
                },
                contact_number: {
                    required: true,
                    regex: /^[6789]\d{9}$/
                },
                registration_number: {
                    required: true,
                    maxlength: 50
                },
                id_proof: {
                    required: true,
                    extension: "jpeg|jpg|png|pdf",
                    filesize: 2048000 // in bytes (2MB)
                }
            },
            messages: {
                name: {
                    required: "Please enter a name.",
                    regex: "Name should only contain letters and spaces."
                },
                contact_number: {
                    required: "Please enter a contact number.",
                    regex: "Please enter a valid Indian phone number."
                },
                registration_number: {
                    required: "Please enter a registration number.",
                    maxlength: "Registration number should not exceed 50 characters."
                },
                id_proof: {
                    required: "Please upload an ID proof.",
                    extension: "Allowed file types: jpeg, jpg, png, pdf.",
                    filesize: "File size should not exceed 2MB."
                }
            }
        });
    });
</script>
@endsection