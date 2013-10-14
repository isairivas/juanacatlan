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
<link rel="stylesheet" href="<?php echo HOME; ?>/assets/bootstrap/css/bootstrap.min.css" media="screen">


<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<title>Login | Entrar</title>

</head>

<body>


    <div id="login-wrap" class="center" style="width: 100%" >

        <div id="login-inner" class="login-inset  " style=" margin: auto; width: 400px;margin-top: 100px; " >

			<div id="login-circle ">
				<section id="login-form" class="login-inner-form" data-angle="0">
					<h1>Acceso</h1>
                                        <form class="form-vertical" action="<?php echo HOME; ?>/admin/security/login" method="post">
						<div class="control-group-merged">
							<div class="control-group">
								<input type="text" placeholder="Usuario" name="registro[usuario]" id="input-username" class="big required">
							</div>
							<div class="control-group">
								<input type="password" placeholder="Password" name="registro[password]" id="input-password" class="big required">
							</div>
						</div>
						<div class="control-group">
							
						</div>
						<div class="form-actions span3">
							<button type="submit" class="btn btn-success btn-block  ">Login</button>
						</div>
					</form>
				</section>
				
				
			</div>

		</div>

	   
    </div>





</body>

</html>

