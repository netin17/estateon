@extends('layouts.estate')
@section('content')
<link rel="stylesheet" href="{{ url('estate/summernote/summernote-bs4.css')}}">
<link rel="stylesheet" href="{{ url('estate/css/newcss/jquery.fancybox.min.css')}}" />
<section class="dashboard-section">
    <div class="container">
        <div class="dashboard-row d-flex flex-wrap">
            @include('partials.dashboardsidebar', ['user'=>$data['user'], 'propertycount'=>$data['p_count'], 'is_builder'=>$data['is_builder']])
            <div class="dashboard-content-col">
                <div class="dashboard-title-wrap d-lg-block d-none">
                    <h1 class="dark-font text-left dashboard-title mb-4 ">Dashboard</h1>
                </div>
                <div class="refer-box side-refer-box text-center mb-5">
                    Builder Dashboard
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
                    <form action="{{route('frontuser.contacts.add')}}" method="POST" id="contact_form">
                    @csrf
                        <div class="form-group-row d-flex flex-wrap">
                            <div class="form-group-col">
                                <label for="fname">Name*</label>
                                <input type="text" id="name" name="name" class="form-group-file" required />
                               
                            </div>
                            <div class="form-group-col px-1">
                                <label for="plan">Select a topic</label>
                                <select name="message_type" id="message_type" class="form-group-file" required>
                                <option value="">--Select--</option>
                                    <option value="Payment related issues">Payment related issues</option>
                                    <option value="Property listing related Issues">Property listing related Issues</option>
                                    <option value="About premium plans">About premium plans</option>
                                    <option value="Talk to our Agent">Talk to our Agent</option>
                                    <option value="Other">Other</option>
                                 
                                </select>
                            </div>
                            <div class="form-group-col">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" class="form-group-file" required />
                            </div>
                            <div class="form-group-col px-1">
                                <label for="phone_no">Mobile Number*</label>
                                <input type="number" id="phone_no" name="phone" class="form-group-file" required />
                            </div>
                            
                            <div class="form-group-col mb-0">
                                <label for="phone_no">Write Message*</label>
                                <textarea name="message" id="message" cols="30" rows="1" class="form-group-file textarea-msg" required></textarea>
                            </div>
                            <div class="contact-bottom mb-0 px-1 form-group-col d-flex align-items-center justify-content-end flex-wrap">
                                <div class="form-group-col px-1 w-100">
                                    <label for="phone_no">State*</label>
                                    <select name="state_id" id="state_id" class="form-group-file" required>
                                        <option value="">--Select--</option>
                                        @foreach($data['states'] as $state)
                                        <option value="{{$state->id}}">{{$state->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="contact-bottom d-flex align-items-center justify-content-end w-100">
                                    <div class="d-flex align-items-center" id="recaptcha-container"></div>
                                </div>
                                <button type="submit" class="contact-sub-btn btn btn-primary mt-2">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@section('scripts')
<script src="{{ url('estate/js/wow.min.js')}}"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script>
<script>
   

        jQuery(document).ready(function () {
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

    $('#contact_form').submit(function(event) {
  event.preventDefault(); // Prevent the default form submission

  // Validate reCAPTCHA
  var response = grecaptcha.getResponse();
  if (response.length === 0) {
    // reCAPTCHA is not validated, display an error message or take appropriate action
    alert('Please complete the reCAPTCHA validation.');
    return;
  }

  // reCAPTCHA is validated, proceed with form submission
  $(this).unbind('submit').submit();
});
        })
</script>
@endsection