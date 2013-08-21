<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->

<head>
<meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">

<!-- Bootstrap Stylesheet -->
<link rel="stylesheet" href="<?php echo HOME; ?>bootstrap/css/bootstrap.min.css" media="screen">

<!-- Uniform Stylesheet -->
<link rel="stylesheet" href="<?php echo HOME; ?>plugins/uniform/css/uniform.default.css" media="screen">

<!-- Plugin Stylsheets first to ease overrides -->

<!-- End Plugin Stylesheets -->

<!-- Main Layout Stylesheet -->
<link rel="stylesheet" href="<?php echo HOME; ?>assets/css/fonts/icomoon/style.css" media="screen">
<link rel="stylesheet" href="<?php echo HOME; ?>assets/css/login.css" media="screen">
<link rel="stylesheet" href="<?php echo HOME; ?>plugins/zocial/zocial.css" media="screen">

<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<title>Login | Entrar</title>

</head>

<body>


    <div id="login-wrap">

		<div id="login-ribbon"><i class="icon-lock"></i></div>

		<div id="login-buttons">
			<div class="btn-wrap">
				<button type="button" class="btn btn-inverse" data-target="#login-form"><i class="icon-key"></i></button>
			</div>
			<!--
			<div class="btn-wrap">
				<button type="button" class="btn btn-inverse" data-target="#forget-form"><i class="icon-question-sign"></i></button>
			</div>
			-->
		</div>

		<div id="login-inner" class="login-inset">

			<div id="login-circle">
				<section id="login-form" class="login-inner-form" data-angle="0">
					<h1>Login</h1>
                                        <form class="form-vertical" action="<?php echo HOME; ?>?section=login&action=authenticate" method="post">
						<div class="control-group-merged">
							<div class="control-group">
								<input type="text" placeholder="Usuario" name="login[usuario]" id="input-username" class="big required">
							</div>
							<div class="control-group">
								<input type="password" placeholder="Password" name="login[password]" id="input-password" class="big required">
							</div>
						</div>
						<div class="control-group">
							
						</div>
						<div class="form-actions">
							<button type="submit" class="btn btn-success btn-block btn-large">Login</button>
						</div>
					</form>
				</section>
				<section id="register-form" class="login-inner-form" data-angle="90">
					<h1>Register</h1>
					<form class="form-vertical" action="dashboard.html">
						<div class="control-group">
							<label class="control-label">Email</label>
							<div class="controls">
								<input type="text" name="Register[email]" class="required email">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Password</label>
							<div class="controls">
								<input type="password" name="Register[password]" class="required">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Fullname</label>
							<div class="controls">
								<input type="text" name="Register[fullname]" class="required">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Payment Method</label>
							<div class="controls">
								<select class="required" name="Register[payment]">
									<option>PayPal</option>
									<option>Credit Card</option>
								</select>
							</div>
						</div>
						<div class="form-actions">
							<button type="submit" class="btn btn-danger btn-block btn-large">Register</button>
						</div>
					</form>
				</section>
				<section id="forget-form" class="login-inner-form" data-angle="180">
					<h1>Reset Password</h1>
					<form class="form-vertical" action="dashboard.html">
						<div class="control-group">
							<div class="controls">
								<input type="text" name="Reset[email]" class="big required email" placeholder="Enter Your Email...">
							</div>
						</div>
						<div class="form-actions">
							<button type="submit" class="btn btn-danger btn-block btn-large">Reset</button>
						</div>
					</form>
				</section>
			</div>

		</div>

	   
    </div>

	<!-- Core Scripts -->
	<script src="<?php echo HOME; ?>assets/js/libs/jquery-1.8.2.min.js"></script>
	<script src="<?php echo HOME; ?>assets/js/libs/jquery.placeholder.min.js"></script>
    
    <!-- Login Script -->
    <script src="<?php echo HOME; ?>assets/js/login.js"></script>

    <!-- Validation -->
    <script src="<?php echo HOME; ?>plugins/validate/jquery.validate.min.js"></script>

    <!-- Uniform Script -->
    <script src="<?php echo HOME; ?>plugins/uniform/jquery.uniform.min.js"></script>

</body>

</html>

