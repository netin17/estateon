@extends('layouts.estate')
@section('content')
<section class="forgot-password-section">
            <div class="container">
                <div class="forgot-password-box mx-auto text-center">
                    <div class="gmail-icon d-flex align-items-center justify-content-center mx-auto mb-2"><img
                            src="{{ url('estate/images/mail-red-icon.svg')}}" alt="gmail"></div>
                    <h1 class="forgot-password-title dark-font mb-3">Check your email</h1>
                    <p class="sm-text mb-2">We sent a password reset link to </p>
                    <p class="dark-font gmail-name fw-bolder mb-4">{{$user_email}}</p>
                        <a href="mailto:" class="contact-sub-btn btn btn-primary mx-auto px-lg-5 mb-2">Open email app</a>
                    <p class="sign-up-bottom-text mb-3 pt-1" style="font-size: 16px;">Didn’t receive the email? <a
                    href="{{route('forget.password.get')}}">Click to
                            resend</a></p>
                    <a href="{{route('home.signin')}}" class="back-login transition">
                        <span class="d-flex align-items-center">
                            <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.67188 8.9375L0.734375 5L4.67188 1.0625M1.28125 5H9.26562" stroke="#7C7C7C"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <span class="d-inline-block ms-1">Back to log in</span>
                        </span>
                    </a>
                </div>
            </div>
        </section>
@endsection