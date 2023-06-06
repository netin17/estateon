@extends('layouts.estate')
@section('content')
<div class="align-items-center log-bg">
  <div class="container">
    <div class="row no-gutters">
      <div class="col-lg-10 col-md-12 mx-auto">
        <div class="card login-card register-card">
          <div class="card-body">
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
            <h3 class="login-card-description text-center">Sign up your account</h3>
            <form action="{{ route("home.postsignup") }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <div class="col-md-12 col-lg-6">
                  <div class="form-group">
                    <input type="text" name="name" id="name" class="form-control" placeholder="Full Name">
                  </div>
                </div>
                <div class="col-md-12 col-lg-6">
                  <div class="form-group mb-4">
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email Address">
                  </div>
                </div>
                <div class="col-md-12 col-lg-6">
                  <div class="form-group mb-4">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                  </div>
                </div>
                <div class="col-md-12 col-lg-6">
                  <div class="form-group mb-4">
                    <input type="password" name="confirmpassword" id="password" class="form-control" placeholder="Confirm Password">
                  </div>
                </div>
                <div class="col-md-12 col-lg-6">
                  <div class="alert alert-danger" id="error" style="display: none;"></div>  
                   <div class="alert alert-success" id="sentSuccess" style="display: none;"></div>
                  <div class="form-group mb-4">
                    <input type="text" id="number" name="phone" class="form-control" placeholder="Phone number with country code">
                    <div id="recaptcha-container"></div>
                    <button type="button" class="btn btn-success" onclick="phoneSendAuth();">Get OTP</button>
                  </div>
                </div>

                <div class="col-md-12 col-lg-6">
                   <div class="alert alert-success" id="successRegsiter" style="display: none;"></div>
                  <div class="form-group mb-4">
                    <input type="text" id="verificationCode" class="form-control" placeholder="Enter verification code" required>
                  <button type="button" class="btn btn-success" onclick="codeverify();">Verify OTP</button>
                  </div>
                </div>


                <div class="col-md-12 col-lg-6">
                  <div class="form-group mb-4">
                    <select class="form-control" id="role" name="role">
                      <option>Select Role</option>
                      @foreach($data['roles'] as $role)
                      <option value="{{$role}}">{{$role}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>
            <input name="signup" id="signup" class="btn btn-block login-btn mb-4" type="submit" value="Sign Up">
            </form>
            <div class="text-center">
              <p class="login-card-footer-text">Already Have An Account? <a href="{{ route("home.signin") }}" class="web-clr">Go For Log In</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
   <script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script>
  
<script>
      
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
</script>
  
<script type="text/javascript">
  
    window.onload=function () {
      render();
    };
  
    function render() {
        window.recaptchaVerifier=new firebase.auth.RecaptchaVerifier('recaptcha-container');
        recaptchaVerifier.render();
    }
  
    function phoneSendAuth() {
           
        var number = $("#number").val();
          
        firebase.auth().signInWithPhoneNumber(number,window.recaptchaVerifier).then(function (confirmationResult) {
              
            window.confirmationResult=confirmationResult;
            coderesult=confirmationResult;
            console.log(coderesult);
  
            $("#sentSuccess").text("Message Sent Successfully.");
            $("#sentSuccess").show();
              
        }).catch(function (error) {
            $("#error").text(error.message);
            $("#error").show();
        });
  
    }
  
    function codeverify() {
  
        var code = $("#verificationCode").val();
  
        coderesult.confirm(code).then(function (result) {
            var user=result.user;
            console.log(user);
  
            $("#successRegsiter").text("you are register Successfully.");
            $("#successRegsiter").show();
  
        }).catch(function (error) {
            $("#error").text(error.message);
            $("#error").show();
        });
    }
  
</script>