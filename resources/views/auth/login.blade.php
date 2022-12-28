<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Procurement 2.0 | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{ asset('resources/assets/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('resources/assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('resources/assets/css/AdminLTE.min.css') }}">
    <link rel="icon" href="{{ asset('resources/img/favicon.png') }}">
    <script src="{{ asset('resources/assets/js/jquery.min.js') }}"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{ asset('resources/assets/js/bootstrap.min.js') }}"></script>
  </head>
  <style>
        body {
            background-image: url('{{ asset('public/img/1.jpg') }}');
            min-height: 500px;
            background-repeat: no-repeat;
            background-size: 104%;
        }
        * {
	box-sizing: border-box;
}
body {
	font-family: poppins;
	font-size: 16px;
	color: #fff;
}
.form-box {
	background-color: rgba(0, 0, 0, 0.4);
	margin: auto auto;
	padding: 40px;
	border-radius: 5px;
	box-shadow: 0 0 10px #000;
	position: absolute;
	top: 0;
	bottom: 0;
	left: 0;
	right: 0;
	width: 400px;
	height: 350px;
}
.form-box:before {
	/* background-image: url("https://i.postimg.cc/8cnYLpfc/ddddd.jpg"); */
	width: 100%;
	height: 100%;
	background-size: cover;
	content: "";
	position: fixed;
	left: 0;
	right: 0;
	top: 0;
	bottom: 0;
	z-index: -1;
	display: block;
	filter: blur(2px);
}
.form-box .header-text {
	font-size: 32px;
	font-weight: 600;
	padding-bottom: 30px;
	text-align: center;
}
.form-box input {
	margin: 10px 0px;
	border: none;
	padding: 10px;
	border-radius: 5px;
	width: 100%;
	font-size: 18px;
	font-family: poppins;
}

.form-box label {
	position: relative;
	margin-left: 5px;
	margin-right: 10px;
	top: 5px;
	display: inline-block;
	width: 20px;
	height: 20px;
	cursor: pointer;
}

.form-box span {
	font-size: 14px;
}
.form-box button {
	background-color: deepskyblue;
	color: #fff;
	border: none;
	border-radius: 5px;
	cursor: pointer;
	width: 100%;
	font-size: 18px;
	padding: 10px;
	margin: 20px 0px;
}
span a {
	color: #BBB;
}

    </style>
  <body>
    @if(Session::has('ok'))
        <div class="row">
            <div class="alert alert-success text-center">
                <strong class="text-center">{{ Session::get('ok') }}</strong>
            </div>
        </div>
    @endif
    <div class="login-box">
      <div class="login-logo">
          <img src="{{ asset('public/img/doh.png') }}" style="width: 100px; height: 100px;" />
           <img src="{{ asset('public/img/dohro12logo_100RES.png') }}" style="width: 100px; height: 100px;" />
          <br />
          <a href="#" style="font-weight:bolder;"><label style="font-size: 17pt;">PROCUREMENT 2.0</label></a>

      </div><!-- /.login-logo -->
      <form role="form" method="POST" action="{{ url('/login') }}">
          {{ csrf_field() }}
            <div class="form-box">
                     @if(Session::has('errors'))
                         <strong style="color: #F7F7F7;">  {{ Session::get('errors')}}</strong>   
                     @endif 
                    <div class="form-group has-feedback">
                        <input id="username" type="text" placeholder="Login ID" class="form-control" name="username" value="{{ old('username') }}">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input id="password" type="password" class="form-control" name="password" placeholder="Password">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                        <div class="row">
                                <div class="col-xs-8">
                                        <label style="width:130px;">
                                            <input type="checkbox" name="remember" style="  float: right;width: 200px;"> Remember Me
                                        </label>
                                </div><!-- /.col -->
                                <div class="col-xs-4">
                                    <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                                </div><!-- /.col -->
                                <a href="https://forms.gle/VTu7CFCfeeP4Ln3g6" target="_blank">Click me to Register</a>
                        </div> 
                      
               </form>        
               <br>
               <p align="center"> <small>Created by: Josmar Del Poso</small></p>

        </div>

    {{--@include('modal.announcement')--}}
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    
    <!-- iCheck -->
  </body>
</html>
@section('js')
<script>

@if(Session::get('not_active'))
        Lobibox.notify('success', {
            title: "",
            msg: "Account not active. Please contact admin",
            size: 'mini',
            rounded: true
        });
        <?php
        Session::put("not_active",false)
        ?>
@endif
</script>
@endsection