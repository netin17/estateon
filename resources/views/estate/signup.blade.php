@extends('layouts.estate')
@section('content')
<section class="sign-up-section">
    <div class="container large-container">
        <div class="row align-items-center">
            <div class="col-xl-7 col-md-6">
                <div class="main-site-large-logo">
                    <img src="{{ url('estate/images/very-large-logo2.png')}}" alt="logo" />
                </div>
            </div>
            <div class="col-xl-5 col-md-6">
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
                <form action="{{route('home.postsignup')}}" method="POST" class="sign-up-form" onsubmit="return submitForm()">
                    @csrf
                    <div class="sign-up-form-group mb-lg-4 mb-3">
                        <input type="text" name="name" id="name" placeholder="Full Name" class="form-control sign-up-form-field transition w-100 d-block" />
                    </div>
                    <div class="sign-up-form-group mb-lg-4 mb-3">
                        <input type="email" name="email" id="email" placeholder="Email" class="form-control sign-up-form-field transition w-100 d-block" />
                    </div>
                    <div class="sign-up-form-group mb-lg-4 mb-3">
                        <input type="password" placeholder="Password" name="password" id="password" class="form-control sign-up-form-field transition w-100 d-block" />
                    </div>
                    <div class="sign-up-form-group mb-lg-4 mb-3">
                        <input type="password" placeholder="Confirm Password" name="confirmpassword" id="cpassword" class="form-control sign-up-form-field transition w-100 d-block" />
                    </div>
                    <div class="sign-up-form-group mb-lg-4 mb-3 position-relative">
                        <div class="alert alert-danger" id="error" style="display: none;"></div>
                        <div class="alert alert-success" id="sentSuccess" style="display: none;"></div>
                        <input type="text" id="number" name="phone" placeholder="Phone number with country code" class="form-control sign-up-form-field transition w-100 d-block" />
                        <button type="button" class="verify-otp-btn px-4" onclick="phoneSendAuth();">Send OTP</button>
                    </div>
                    <div class="contact-bottom d-flex align-items-center justify-content-center">
                        <div class="d-flex align-items-center" id="recaptcha-container"></div>
                    </div>
                    <!-- <div class="sign-up-form-group mb-lg-4 mb-3 position-relative">
                        <button type="button" class="verify-otp-btn" onclick="phoneSendAuth();">Send OTP</button>
                    </div> -->
                    <div class="sign-up-form-group my-lg-4 my-3 position-relative verifyotp">
                        <input type="text" placeholder="OTP" id="verificationCode" class="form-control sign-up-form-field transition w-100 d-block" required />
                        <button type="button" class="verify-otp-btn" onclick="codeverify();">Verify</button>
                    </div>
                    <div class="sign-up-form-group mb-lg-3 mb-3 d-flex align-items-center sign-up-conditions">
                        <input type="checkbox" name="tandc" id="terms_conditions" required />
                        <label for="terms_conditions" style="margin-left: 4px;" class="d-block ms-2">I accept the <a href="/">terms and
                                conditions.</a></label>
                    </div>

                    <div class="contact-bottom d-flex align-items-center justify-content-center">

                        <button type="submit" class="contact-sub-btn btn btn-primary">Submit</button>
                    </div>
                    <p class="text-center sign-up-bottom-text mt-3" style="font-size: 14px;">Already have an
                        account?
                        <a href="{{route('home.signin')}}">Go For Login</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
@section('scripts')
<script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script>
<script>
    var isOTPVerified = false;
    var coderesult;
    var firebaseConfig = {
        apiKey: "AIzaSyCxCC1NFlOCM9k9pI4paC8vhJytSY4t054",
        authDomain: "estateon-e5287.firebaseapp.com",
        databaseURL: "https://estateon-e5287.firebaseio.com",
        projectId: "estateon-e5287",
        storageBucket: "estateon-e5287.appspot.com",
        messagingSenderId: "191717721261",
        appId: "1:191717721261:web:21f5dd3cdcc7985ecf7224",
        measurementId: "G-6RE4Q4XQHD"
    };

    firebase.initializeApp(firebaseConfig);

    window.onload = function() {
        render();
    };

    function render() {
        window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container');
        recaptchaVerifier.render();
    }
    
    function phoneSendAuth() {
        var number = $("#number").val();
        if ($.isNumeric(number)) {
            $("#error").hide();
            firebase.auth().signInWithPhoneNumber(number, window.recaptchaVerifier).then(function(confirmationResult) {
                window.confirmationResult = confirmationResult;
                coderesult = confirmationResult;


                $("#verifyotp").show();
                $("#sentSuccess").text("Message Sent Successfully.");
                $("#sentSuccess").show();

            }).catch(function(error) {
                $("#error").text(error.message);
                $("#error").show();
                $("#verifyotp").hide();
            });
        } else {
            // Not a valid number
            $("#error").text("Not a valid number");
            $("#error").show();
            $("#verifyotp").hide();

        }
    }
   

    function codeverify() {
        var code = $("#verificationCode").val();
        if (code != "") {
            if (coderesult != undefined) {
                coderesult.confirm(code).then(function(result) {
                    var user = result.user;
                    console.log(user);
                    isOTPVerified = true;
                    $("#successRegsiter").text("you are register Successfully.");
                    $("#successRegsiter").show();

                }).catch(function(error) {
                    $("#error").text(error.message);
                    $("#error").show();
                });
            } else {
                $("#error").text("Invalid Otp.");
                $("#error").show();
            }

        }
    }

    function submitForm() {
        // Check if the OTP is verified
        var otpVerified = isOTPVerified; // Implement your OTP verification logic here

        // If the OTP is not verified, prevent form submission
        if (!otpVerified) {
            // Display an error message or perform any necessary actions
            $("#error").text("Please verify the OTP first.");
            $("#error").show();

            // Return false to prevent the form from submitting
            return false;
        }

        // If the OTP is verified, allow the form submission
        return true;
    }
</script>
@endsection