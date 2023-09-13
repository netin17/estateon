@extends('layouts.estate')
@section('title', 'Sign In | Post Your Property on EstateOn') 
@section('metaDescription', 'EstateOn account helps you to contact our Top Builder Projects in India and Leading Agents Properties in India. Owners Can Post Properties to Get More Users.') 
@section('content')
<section class="sign-up-section login-section">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-6 col-md-6">
                        <div class="main-login-logo ms-0">
                            <img src="{{ url('estate/images/very-large-logo2.png')}}" alt="logo" />
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6">
                    @if(count($errors) > 0 )
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  <ul class="p-0 m-0" style="list-style: none;">
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                  </ul>
                </div>
                @endif
                        <form action="{{route('home.postsignin')}}" method="POST" class="sign-up-form pt-5">
                        @csrf
                        <input type="hidden" name="referrer" value="{{ $referrer }}">
                            <div class="sign-up-form-group mb-lg-4 mb-3">
                                    <input type="email" name="email" id="email" class="form-control sign-up-form-field transition w-100 d-block" placeholder="Email address">
                            </div>
                            <div class="sign-up-form-group mb-lg-4 mb-3 position-relative">
                                <input type="password" name="password" id="password" style="background-color: #FFFBFB;" placeholder="Password"  class="form-control sign-up-form-field transition w-100 d-block" />
                                <span id="togglePassword" class="password-toggle-icon" onclick="togglePasswordVisibility()">
        <i class="fa fa-eye"></i>
    </span>
                            </div>
                            <div class="mb-lg-3 mb-3 d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center ">
                                    <input type="checkbox" name="" id="terms_conditions" />
                                    <label for="terms_conditions" style="font-size: 14px; margin-left: 4px;" class="d-block dark-font mb-0"> Remember Password</label>
                                </div>
                                <a href="{{route('forget.password.get')}}" class="d-block dark-font" style="font-size: 14px;">Forgot Password?</a>
                            </div>
                            <div class="contact-bottom d-flex align-items-center justify-content-end">
                                <button type="submit" class="contact-sub-btn btn btn-primary submit-btn-style">Login</button>
                            </div>
                            <p class="text-center sign-up-bottom-text mt-3" style="font-size: 14px;">Don’t have an
                                account?
                                <a href="{{route('home.signup')}}">Register here</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </section>
@endsection
@section('scripts')
<script>
     function togglePasswordVisibility() {
        const passwordInput = document.getElementById('password');
        const togglePasswordIcon = document.getElementById('togglePassword');
        
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            togglePasswordIcon.innerHTML = '<i class="fa fa-eye-slash"></i>'; // Change the icon to eye-slash
        } else {
            passwordInput.type = 'password';
            togglePasswordIcon.innerHTML = '<i class="fa fa-eye"></i>'; // Change the icon back to eye
        }
    }
</script>
@endsection
</script>