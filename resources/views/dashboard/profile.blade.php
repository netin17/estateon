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
                <div class="refer-box side-refer-box text-center mb-5">
                    Refer To Your Friend
                </div>
                <div class="dashboard-profile-content box-style pb-0">
                <div style="padding-top: 20px" class="container-fluid">
                @if(session('message'))
                    <div class="row mb-2">
                        <div class="col-lg-12">
                            <div class="alert alert-success" role="alert">{{ session('message') }}</div>
                        </div>
                    </div>
                @endif
                @if($errors->count() > 0)
                    <div class="alert alert-danger">
                        <ul class="list-unstyled">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @yield('content')

            </div>
                    <form action="{{ route('frontuser.frontuser.change_password') }}" method="POST" class="dashboard-profile-form">
                        <div class="mx-auto" style="max-width:600px;">

                            @csrf
                            @method('PATCH')
                            <div class="profile-form-group d-flex align-items-center mb-4">
                                <label for="name" class="d-block">Name:</label>
                                <label for="phone" class="d-block">{{$data['user']->name}}</label>
                            </div>
                            <div class="profile-form-group d-flex align-items-center mb-4">
                                <label for="email" class="d-block">Email:</label>
                                <label for="phone" class="d-block">{{$data['user']->email}}</label>
                            </div>
                            <div class="profile-form-group d-flex align-items-center mb-4">
                                <label for="phone" class="d-block">Phone No.:</label>
                                <label for="phone" class="d-block">{{$data['user']->phone}}</label>
                            </div>
    
    
                            <div class="profile-form-group d-flex align-items-center mb-5 {{ $errors->has('current_password') ? 'has-error' : '' }}">
                                <label for="current_password">Current password*</label>
                                <input type="password" id="current_password" name="current_password" class="form-control d-block profile-form-fild">
                                @if($errors->has('current_password'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('current_password') }}
                                </em>
                                @endif
                            </div>
                            <div class="profile-form-group d-flex align-items-center mb-5 {{ $errors->has('new_password') ? 'has-error' : '' }}">
                                <label for="new_password">New password*</label>
                                <input type="password" id="new_password" name="new_password" class="form-control d-block profile-form-fild">
                                @if($errors->has('new_password'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('new_password') }}
                                </em>
                                @endif
                            </div>
                            <div class="profile-form-group d-flex align-items-center mb-5 {{ $errors->has('new_password_confirmation') ? 'has-error' : '' }}">
                                <label for="new_password_confirmation">New password confirmation*</label>
                                <input type="password" id="new_password_confirmation" name="new_password_confirmation" class="form-control d-block profile-form-fild">
                                @if($errors->has('new_password_confirmation'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('new_password_confirmation') }}
                                </em>
                                @endif
                            </div>
    
    
    
    
    
                            <div class="profile-form-group">
                                <button type="submit" class="profile-save-btn btn btn-primary px-5">Save</button>
                            </div>
                        </div>
                    </form>
                    <img src="{{ url('estate/images/dashboard-profile.svg')}}" alt="no-property" class="mx-auto profile-form-img d-block" />
                </div>

            </div>
        </div>
    </div>
</section>
@endsection