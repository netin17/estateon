@extends('layouts.estate')
@section('content')
<section class="forgot-password-section">
            <div class="container">
                <div class="forgot-password-box mx-auto text-center">
                    <form method="POST" action="{{ route('forget.password.post') }}">
                    {{ csrf_field() }}
                        <h1 class="forgot-password-title dark-font mb-3">Forgot Password?</h1>
                        <p class="sm-text mb-4 pb-2">No worries, we’ll send your reset instructions.</p>
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
                        <div class="sign-up-form-group pb-lg-2 mb-4">
                        {{ csrf_field() }}
                        <input type="email" name="email" class="form-control" required="autofocus" placeholder="{{ trans('global.login_email') }}">
            
                        </div>
                        <button type="submit" class="contact-sub-btn btn btn-primary mx-auto px-lg-5 mb-lg-4 mb-3">Reset
                            Password</button>

                        <a href="{{route('home.signin')}}" class="back-login transition">
                            <span class="d-flex align-items-center">
                                <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4.67188 8.9375L0.734375 5L4.67188 1.0625M1.28125 5H9.26562"
                                        stroke="#7C7C7C" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <span class="d-inline-block ms-1">Back to log in</span>
                            </span>
                            {!! \Session::get('message') !!}
                        </a>
                    </form>
                </div>
            </div>
        </section>
@endsection