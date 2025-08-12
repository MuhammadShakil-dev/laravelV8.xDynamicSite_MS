<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> LDS | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('public/backend/assets/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('public/backend/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('public/backend/assets/dist/css/adminlte.min.css')}}">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="{{ route('login') }}" class="h1"><b>laravel</b> dynamic SiteV8.x</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>




      <form method="POST" action="{{ route('login') }}">
        @csrf

        @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        
        <strong>Warning!</strong> These credentials do not match our records.
        </div>
        @endif


        <div class="input-group mb-3">
          <label for="email" class="col-md-12 col-form-label text-md-lift">{{ __('E-Mail Address') }}</label>
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email" autofocus >

          
          <div class="input-group-append">
            <div class="input-group-text">
          
           @error('email')
              <span class="fas fa-envelope" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror

            </div>
          </div>
        </div>



        <div class="input-group mb-3">
         <label for="password" class="col-md-12 col-form-label text-md-lift">{{ __('Password') }}</label>
          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="current-password">
          <div class="input-group-append">
            <div class="input-group-text">
             
         @error('password')
          <span class="fas fa-lock invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
               </span>
         @enderror

            </div>
          </div>
        </div>


        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
             <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} >

               <label class="form-check-label" for="remember">
               {{ __('Remember Me') }}
                </label>
            </div>
          </div>
          <!-- /.col -->

              <div class="col-4">
        <button type="submit" class="btn btn-primary btn-block">{{ __('Login') }}  </button>                    
          </div>
          <!-- /.col -->
        </div>
      </form>


     <!-- social-auth-links -->

    <!--   <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div> -->

      <!-- /.social-auth-links -->



         @if (Route::has('password.request'))
         <p class="mb-0">
            <a class="btn btn-link" href="{{ route('password.request') }}">
              {{ __('Forgot Your Password?') }}
               </a>
          </p>     
           @endif


      @if (Route::has('register'))
      <p class="mb-0">
        <a class="btn btn-link" href="{{ route('register') }}">  {{ __('Register ') }} </a>
      </p>
       @endif
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('public/backend/assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('public/backend/assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('public/backend/assets/dist/js/adminlte.min.js')}}"></script>
</body>
</html>
