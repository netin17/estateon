@extends('layouts.estate')
@section('content')
<section class="forgot-password-section">
            <div class="container">
                <div class="forgot-password-box mx-auto text-center">
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
                    <form method="POST" action="{{route('reset.password.post')}}">
                    {{ csrf_field() }}
                        <div class="gmail-icon d-flex align-items-center justify-content-center mx-auto mb-2"><img
                                src="{{ url('estate/images/lock-icon.svg')}}" alt="gmail"></div>
                        <h1 class="forgot-password-title dark-font mb-3">Set new password</h1>
                        <div class="sign-up-form-group mb-lg-4 mb-3">

                        <input name="token" value="{{ $token }}" type="hidden">
                            <div class="form-group has-feedback">
                                <input type="email" name="email" style="background-color: #FFFBFB;" class="form-control sign-up-form-field transition w-100 d-block" required placeholder="{{ trans('global.login_email') }}">
                            </div>
                        </div>
                        <div class="sign-up-form-group mb-lg-4 mb-3">
                        <input type="password" name="password" style="background-color: #FFFBFB;" class="form-control sign-up-form-field transition w-100 d-block" required placeholder="{{ trans('global.login_password') }}">
                        </div>
                        <div class="sign-up-form-group mb-lg-4 mb-3">
                        <input type="password" name="password_confirmation" style="background-color: #FFFBFB;" class="form-control sign-up-form-field transition w-100 d-block" required placeholder="{{ trans('global.login_password_confirmation') }}">
                        </div>
                        <button type="submit" class="contact-sub-btn btn btn-primary mx-auto px-lg-5 mb-2"> Reset Password </button>
                        <a href="{{route('home.signin')}}" class="back-login transition">
                            <span class="d-flex align-items-center">
                                <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4.67188 8.9375L0.734375 5L4.67188 1.0625M1.28125 5H9.26562"
                                        stroke="#7C7C7C" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <span class="d-inline-block ms-1">Back to log in</span>
                            </span>
                        </a>
                    </form>
                </div>
            </div>
        </section>
@endsection