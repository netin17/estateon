@extends('layouts.estate')
@section('content')
<section class="forgot-password-section">
            <div class="container">
                <div class="forgot-password-box mx-auto text-center">
                    <div
                        class="gmail-icon successfully-icon d-flex align-items-center justify-content-center mx-auto mb-2">
                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6 14L12.5858 20.5858C13.3668 21.3668 14.6332 21.3668 15.4142 20.5858L29 7"
                                stroke="#36B30A" stroke-width="2" stroke-linecap="round" />
                            <path
                                d="M28.5 11.2786C28.8259 12.4636 29 13.7115 29 15C29 22.732 22.732 29 15 29C7.26801 29 1 22.732 1 15C1 7.26801 7.26801 1 15 1C19.305 1 23.1561 2.94305 25.7242 6"
                                stroke="#36B20A" stroke-width="2" stroke-linecap="round" />
                        </svg>
                    </div>
                    <h1 class="forgot-password-title dark-font mb-3">Password Reset</h1>
                    <p class="sm-text mb-1 mx-auto">Your password has been successfully reset.</p>
                    <p class="sm-text mb-4 mx-auto">Click below to log in magically</p>
                    {{-- <button type="button" class="contact-sub-btn btn btn-primary mx-auto px-lg-5 mb-2">Continue</button> --}}
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