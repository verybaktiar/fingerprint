<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title>MAGINREK | Magang Informasi Rekapitulasi Absensi</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="{{ asset ('auth/assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset ('auth/assets/vendor/font-awesome/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset ('auth/assets/vendor/linearicons/style.css') }}">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="{{ asset ('auth/assets/css/main.css') }}">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="{{ asset ('auth/assets/css/demo.css') }}">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="{{ asset ('auth/assets/img/logo.jpg') }}">
	<link rel="icon" type="image/png" sizes="96x96" href="{{ asset ('auth/assets/img/logo.jpg') }}">
    <style>
		.error-message {
			color: red;
			margin-top: 5px;
		}
	</style>
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box ">
					<div class="left">
						<div class="content">
							<div class="header">
								<div class="logo text-center"><img src="{{ asset ('auth/assets/img/logo.jpg') }}" alt="Klorofil Logo"></div>
								<p class="lead">Login to your account</p>
							</div>

                            {{-- VALIDATION --}}
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
							<form class="form-auth-small" action="login" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="signin-email" class="control-label sr-only">Email</label>
                                    <input name="email" type="email" class="form-control" id="signin-email" placeholder="Email">
                                    @if ($errors->has('email'))
                                        <span class="error-message">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="signin-password" class="control-label sr-only">Password</label>
                                    <input name="password" type="password" class="form-control" id="signin-password" placeholder="Password">
                                    @if ($errors->has('password'))
                                        <span class="error-message">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                                <div class="form-group clearfix">
                                    <label class="fancy-checkbox element-left">
                                        <input type="checkbox">
                                        <span>Remember me</span>
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
                                <div class="bottom">
                                    <span class="helper-text"><i class="fa fa-lock"></i> <a href="#">Forgot password?</a></span>
                                </div>
                            </form>
						</div>
					</div>
					<div class="right">

						<div class="content text">
							<h1 class="heading" style="color: rgb(3, 3, 3);" style="font-family: Helvetica;">Magang Informasi Rekapitulasi Absensi</h1>
							<p style="color: rgb(3, 3, 3);">MAGINREK</p>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
</body>

</html>
