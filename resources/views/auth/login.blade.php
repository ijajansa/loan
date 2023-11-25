<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Loan Panel</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="dist/css/custom.css">
</head>
<body class="hold-transition login-page">
  <div class="row h-100 w-100">
    <div class="col-sm-6 h-100 banner-box-login">
      <div style="margin:0 auto;padding-top:25%;padding-bottom:25%;color:#ffffff">
        <div style="font-size:50pt;font-weight: bolder;text-align: center;">
          WELCOME
        </div>
        <div style="font-size:xx-large;font-weight:200;text-align:center;">
        Connector Login        </div>
        <div style="position:absolute;bottom:35px;left:0px;padding:30px;">
          <div style="font-size:x-large;font-weight:900;font-family:ui-sans-serif;">
            TALK TO US
          </div>
          
          <div>
            hello@loanpanel.in
          </div>
          <div class="invalid-feedback">Email is not Valid.</div>
        </div>
      </div>
      <!-- <img class="login-banner" src="/dist/img/login-banner.png"> -->
    </div>
    <div class="col-sm-6">
      <div class="login-box">
        <div class="login-logo">
          <a href="{{url('/')}}"><b>Loan</b>LENDERS</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
          <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to <b> Panel</b></p>

            <form action="{{route('login')}}" method="post"   class="needs-validation">
                @csrf
              <div class="input-group mb-3">
                <input type="hidden" name="logintype" value="password" id="logintype">
                <input type="email" class="form-control" placeholder="Email" id="email" name="email" required>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                  </div>
                </div>
                <div class="invalid-feedback">Email is not Valid.</div>
              </div>
              <div class="input-group mb-3" id="password_filed">
                <input type="password" class="form-control" placeholder="Password" id="password" name="password">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
                <div class="invalid-feedback">Please fill out this field.</div>
              </div>
              <div class="input-group mb-3" style="display:none" id="otp_filed">
                <input type="text" class="form-control" placeholder="6 Digit OTP" id="otp" name="otp">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
                <div class="invalid-feedback">Please fill out this field.</div>
              </div>
              <div class="row">
               <!--  <div class="col-8">
                  <button type="button" class="btn btn-warning" id="getloginotp">Login with OTP</button>
                </div> -->
                <!-- /.col -->
                <div class="col-4">
                  <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                </div>
                <!-- /.col -->
              </div>
              <div class="row">
                <div class="col text-center">
                  &nbsp;
                </div>
              </div>
              <div class="row">
                <div class="col text-center">
                  <a class="text-danger" href="index26d0.html?path=user&amp;method=forgotpassword">Forgot Password</a>
                </div>
              </div>
              <div class="row">
                <div class="col text-danger" id="login-error"></div>
              </div>
            </form>
          </div>
          <div class="row">
            <div class="col-sm-12"><div style="padding:10px"><strong>Disclaimer: </strong>please enter your registered Email ID with Loan Lenders</div></div>
          </div>
          <!-- /.login-card-body -->
        </div>
      </div>
    </div>
  </div>

<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<script src="dist/js/login.js"></script>
<script>
// Disable form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Get the forms we want to add validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
</body>

</html>