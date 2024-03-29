<!DOCTYPE html>
<html lang="en">
<head>
	<title>PMIS</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<!-- <link rel="icon" type="image/png" href="{{ asset('resources/Login_v15/images/icons/favicon.ico') }}"/> -->
	<link rel="icon" href="{{ asset('resources/img/favicon.png') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('resources/Login_v15/vendor/bootstrap/css/bootstrap.min.css') }} "> 
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('resources/Login_v15/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }} ">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('resources/Login_v15/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }} ">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('resources/Login_v15/vendor/animate/animate.css') }} ">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ asset('resources/Login_v15/vendor/css-hamburgers/hamburgers.min.css') }} ">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('resources/Login_v15/vendor/animsition/css/animsition.min.css') }} ">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('resources/Login_v15/vendor/vendor/select2/select2.min.css') }} ">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ asset('resources/Login_v15/vendor/daterangepicker/daterangepicker.css') }} ">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('resources/Login_v15/css/util.css') }} ">
	<link rel="stylesheet" type="text/css" href="{{ asset('resources/Login_v15/css/main.css') }} ">
<!--===============================================================================================-->
</head>
<body>
@if(Session::has('ok'))
        <div class="row">
            <div class="alert alert-success text-center">
                <strong class="text-center">{{ Session::get('ok') }}</strong>
            </div>
        </div> 
    @endif
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url('{{ asset('public/img/background-kirkwood.jpg') }}'); width:100%; height:100%;">
                    <div style="position: relative; bottom: 50px;">
                    <center>
                        <img src="{{ asset('public/img/doh.png') }}" style="width: 100px; height: 100px; " />
                        <img src="{{ asset('public/img/dohro12logo_100RES.png') }}" style="width: 100px; height: 100px;" />
                        <br />
                        <a href="#" style="font-weight:bolder; color:black;"><i><label style="font-size: 13pt;">Procurement Management Information System</label></i></a>
                    </center>
                    </div><!-- /.login-logo -->
				</div>
                
				<form class="login100-form validate-form" method="POST" action="{{ url('/login') }}">
                    {{ csrf_field() }}
                    @if(Session::has('errors'))
                         <strong style="color: black;">  {{ Session::get('errors')}}</strong>   
                     @endif 
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="username" placeholder="Enter username" value="@if(Session::get('LoginUsername')){{ Session::get('LoginUsername')}}@endif">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="password" placeholder="Enter password">
						<span class="focus-input100"></span>
					</div>

					<!-- <div class="flex-sb-m w-full p-b-30">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								Remember me
							</label>
						</div>

						<div>
							<a href="#" class="txt1">
								Forgot Password?
							</a>
						</div>
					</div> -->

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>