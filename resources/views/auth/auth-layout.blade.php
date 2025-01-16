<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>@yield('title')</title>
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
	<link rel="stylesheet" href="{{asset('back_auth/asset/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('back_auth/asset/plugins/fontawesome/css/all.min.css')}}">
	<link rel="stylesheet" href="{{asset('back_auth/asset/plugins/fontawesome/css/fontawesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('back_auth/asset/css/feathericon.min.css')}}">
	<link rel="stylesheet" href="{{asset('back_auth/asset/plugins/morris/morris.css')}}">
	<link rel="stylesheet" href="{{asset('back_auth/asset/css/style.css')}}"> </head>

<body>
	<div class="main-wrapper login-body">
		<div class="login-wrapper">
			<div class="container">
				<div class="loginbox">
					<div class="login-left"><img class="img-fluid" src="{{asset('back_auth/asset/img/logo.png')}}" alt="Logo"> </div>
					<div class="login-right">
						<div class="login-right-wrap">
							@yield('auth-form')    
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="{{asset('back_auth/asset/js/jquery-3.5.1.min.js')}}"></script>
	<script src="{{asset('back_auth/asset/js/popper.min.js')}}"></script>
	<script src="{{asset('a/js/asset/bootstrap.min.js')}}"></script>
	<script src="{{asset('back_auth/asset/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
	<script src="asset('back_auth/js/asset/script.js')"></script>

</body>
</html>