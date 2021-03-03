<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from thememinister.com/crm/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 02 Jun 2019 11:09:03 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>CRM Admin Panel</title>

    <!-- Favicon and touch icons -->
    <link rel="shortcut icon" href="{{ asset('admin-assets/dist/img/ico/favicon.png') }}" type="image/x-icon">
    <!-- Bootstrap -->
    <link href="{{ asset('admin-assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Bootstrap rtl -->
    <!--<link href="assets/bootstrap-rtl/bootstrap-rtl.min.css" rel="stylesheet" type="text/css"/>-->
    <!-- Pe-icon-7-stroke -->
    <link href="{{ asset('admin-assets/pe-icon-7-stroke/css/pe-icon-7-stroke.css') }}" rel="stylesheet"
          type="text/css"/>
    <!-- style css -->
    <link href="{{ asset('admin-assets/dist/css/stylecrm.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Theme style rtl -->
    <!--<link href="assets/dist/css/stylecrm-rtl.css" rel="stylesheet" type="text/css"/>-->
</head>
<body>
<!-- Content Wrapper -->

@if(\Illuminate\Support\Facades\Session::has('error-login'))
    <div class="alert alert-danger alert-sm alert-block" role="alert">
        <strong>{{ Session('error-login') }}
            !</strong> You should check in on some of those fields below.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(\Illuminate\Support\Facades\Session::has('flash user data'))
    <div class="alert alert-danger alert-sm alert-block" role="alert">
        <strong>{{ Session('flash user data') }}
            !</strong> You should check in on some of those fields below.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif


<div class="container-center">
    <div class="login-area">
        <div class="panel panel-bd panel-custom">
            <div class="panel-heading">
                <div class="view-header">
                    <div class="header-icon">
                        <i class="pe-7s-unlock"></i>
                    </div>
                    <div class="header-title">
                        <h3>Login</h3>
                        <small><strong>Please enter your credentials to login.</strong></small>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <form action="{{ route('admin') }}" id="loginForm" method="post">
                    @csrf
                    <div class="form-group">
                        <label class="control-label" for="username">Username</label>
                        <input type="text" placeholder="example@gmail.com" title="Please enter you username" required=""
                               value="" name="username" id="username" class="form-control">
                        <span class="help-block small">Your unique username to app</span>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="password">Password</label>
                        <input type="password" title="Please enter your password" placeholder="******" required=""
                               value="" name="password" id="password" class="form-control">
                        <span class="help-block small">Your strong password</span>
                    </div>
                    <div>
                        <button class="btn btn-add">Login</button>
                        <a class="btn btn-warning" href="register.html">Register</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<!-- /.content-wrapper -->
<!-- jQuery -->
<script src="{{ asset('admin-assets/plugins/jQuery/jquery-1.12.4.min.js') }}" type="text/javascript"></script>
<!-- bootstrap js -->
<script src="{{ asset('admin-assets/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
</body>

<!-- Mirrored from thememinister.com/crm/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 02 Jun 2019 11:09:03 GMT -->
</html>
