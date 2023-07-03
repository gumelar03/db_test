<!DOCTYPE html>
<html lang="en">
<head>
	<title>LOGIN UJIKOM</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Aplikasi SPP">
	<meta name="author" content="Aplikasi SPP">
	<link rel="shortcut icon" href="img/logo.png" />
	<link rel="stylesheet" href="css/bootstrap-4_4_1.min.css">
	<link rel="stylesheet" href="css/style_login.css">
</head>
<body>
	<div class="kotak">
		<form class="form-signin" action="proses.php" method="post" >
	 		<img src="img/logo.png" alt="SPP Login" width="85px" height="50px" style="margin-left:25px;">
	 		<div style="margin-left:120px;margin-top:-35px;font-size:22px; margin-bottom:15px;">Aplikasi SPP</div>
	 		<div class="input-group mb-0 px-3">
				<div class="input-group-prepend">
					<div class="input-group-text"><i class="fas fa-user text-primary"></i></div>
				</div>
				<input type="text" id="username" name="username" class="form-control form-control-sm" placeholder="Username" autocomplete="off" autofocus="on" required>
			</div>
			<div class="input-group mb-1 px-3">
				<div class="input-group-prepend">
					<div class="input-group-text"><i class="fas fa-key text-primary"></i></div>
				</div>
				<input type="password" id="password" name="password" class="form-control form-control-sm" placeholder="Password" autocomplete="off" required>
			</div>
			<button class="btn btn-sm btn-primary ml-3" type="submit"><i class="fas fa-lock mx-2"></i> Sign in</button>
		</form>
		<h5 class="copy" >Copyright &copy; <?=date('Y');?></h5>
		</div>
	<script src="js/fontawesome-5_7_2.js"></script>
	</body>
</html>