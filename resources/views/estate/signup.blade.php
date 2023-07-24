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
                        <input type="text" name="name" id="name" placeholder="Full Name" class="form-control sign-up-form-field transition w-100 d-block" required />
                    </div>
                    <div class="sign-up-form-group mb-lg-4 mb-3">
                        <input type="email" name="email" id="email" placeholder="Email" class="form-control sign-up-form-field transition w-100 d-block" required />
                    </div>
                    <div class="sign-up-form-group mb-lg-4 mb-3 position-relative">
                        <input type="password" placeholder="Password" name="password" id="password" class="form-control sign-up-form-field transition w-100 d-block" required />
                        <span id="togglePassword" class="password-toggle-icon" onclick="togglePasswordVisibility()">
        <i class="fa fa-eye"></i>
    </span>
                    </div>
                   {{-- <div class="sign-up-form-group mb-lg-4 mb-3">
                        <input type="password" placeholder="Confirm Password" name="confirmpassword" id="cpassword" class="form-control sign-up-form-field transition w-100 d-block" />
                    </div> --}}
                    <div class="sign-up-form-group mb-lg-4 mb-3 position-relative">
                        <input type="text" id="number" name="phone" placeholder="Phone number" class="form-control sign-up-form-field transition w-100 d-block" oninput="validateIndianMobileNumber(this)" maxlength="10" />
                        <span id="error-message" style="color: red;"></span>
                    </div>
                    <div class="alert alert-danger verify-otp-error" id="error" style="display: none;"></div>
                    <div class="alert alert-success " id="sentSuccess" style="display: none;"></div>
                    <div class="contact-bottom d-flex align-items-center justify-content-center">
                        <div class="d-flex align-items-center" id="recaptcha-container"></div>
                    </div>
                   <div class="position-relative">
                        <button type="button" class="verify-otp-btn d-block send-otp-btn px-4" onclick="phoneSendAuth();">Send OTP</button>
                    </div>
                    <div class="alert alert-success verify-otp-error" id="otpsuccess" style="display: none;"></div>
                    <div class="sign-up-form-group my-lg-4 my-3 position-relative verifyotp">
                        <input type="text" placeholder="OTP" id="verificationCode" class="form-control sign-up-form-field transition w-100 d-block" required />
                        <button type="button" class="verify-otp-btn" onclick="codeverify();">Verify</button>
                    </div> 
                    <div class="alert alert-danger verify-otp-error" id="otperror" style="display: none;"></div>
                    <div class="sign-up-form-group mb-lg-3 mb-3 d-flex align-items-center sign-up-conditions">
                        <input type="checkbox" name="tandc" id="terms_conditions" required />
                        <label for="terms_conditions" style="margin-left: 4px;" class="d-block ms-2 mb-0">I accept the <a href="/">terms and
                                conditions.</a></label>
                    </div>

                    <div class="contact-bottom d-flex align-items-center justify-content-center">

                        <button type="submit" class="contact-sub-btn btn btn-primary">Register</button>
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
            var response = grecaptcha.getResponse();
  if (response.length === 0) {
    // reCAPTCHA is not validated, display an error message or take appropriate action
    $("#error").text('Please complete the reCAPTCHA validation.');
    $("#error").show();
    return;
  }
            firebase.auth().signInWithPhoneNumber('+91'+number, window.recaptchaVerifier).then(function(confirmationResult) {
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
                    $("#error").hide();
                    $("#otpsuccess").text("OTP Verified Successfully");
                    $("#otpsuccess").show();
                    $("#sentSuccess").hide();

                }).catch(function(error) {
                    $("#sentSuccess").hide();
                    $("#otpsuccess").hide();
                    $("#otperror").text(error.message);
                    $("#otperror").show();
                });
            } else {
                $("#sentSuccess").hide();
                $("#otpsuccess").hide();
                $("#otperror").text("Invalid Otp.");
                $("#otperror").show();
            }

        }
    }
    function validateIndianMobileNumber(input) {
      const errorMessageElement = document.getElementById('error-message');
      // Remove all non-numeric characters
      const cleanedInput = input.value.replace(/[^0-9]/g, '');
      
      // Check if the number is 10 digits long and starts with 7, 8, or 9 (Indian mobile number format)
      const isValid = /^[5-9]\d{9}$/.test(cleanedInput);
      
      // Update the input value to show only the valid part
      input.value = cleanedInput.slice(0, 10);
      
      // Add or remove the 'invalid' class based on the validity of the input
      if (isValid) {
        input.classList.remove('invalid');
        errorMessageElement.textContent = ''; // Clear the error message
        return true;
      } else {
        input.classList.add('invalid');
        errorMessageElement.textContent = 'Please enter a valid 10-digit Indian mobile number.';
        return false;
      }
    }

    function submitForm() {
        // Check if the OTP is verified
        var otpVerified = isOTPVerified; // Implement your OTP verification logic here

        // If the OTP is not verified, prevent form submission
        if (!otpVerified) {
            // Display an error message or perform any necessary actions
            $("#sentSuccess").hide();
            $("#error").text("Please verify the OTP first.");
            $("#error").show();

            // Return false to prevent the form from submitting
            return false;
        }
        const phoneNumberInput = document.getElementById('number');
      var isvalid=validateIndianMobileNumber(phoneNumberInput);
if(!isvalid){
    return false;
}
        // If the OTP is verified and phone number is valid, allow the form submission
        return true;
    }
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