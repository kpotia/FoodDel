	<?php 
	
	if (isset($_POST['action']) && $_POST['action'] == 'login') {
		$username = (!empty($_POST['username'])) ? $_POST['username'] : null ;
		$pwd = (!empty($_POST['password'])) ? md5($_POST['password']) : null ;
		
		$sql = "SELECT * FROM customer where email = '".$username."' and password ='".$pwd."'";
		require 'config.php';

		if ($res = $conn->query($sql)) {
			session_start();
			$_SESSION['customer']= $res->fetch_assoc();
			print_r($_SESSION);
			?>
			<script type="text/javascript">
				alert('you are login');		
				window.location = 'dishes.php';		
			</script>
			<?php 
			
		}else{ echo $conn->error;}
	}
 ?>


	<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/fav.png">

		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>Restaurant</title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="css/linearicons.css">
			<link rel="stylesheet" href="css/font-awesome.min.css">
			<link rel="stylesheet" href="css/bootstrap.css">
			<link rel="stylesheet" href="css/magnific-popup.css">
			<link rel="stylesheet" href="css/nice-select.css">					
		<!-- 	<link rel="stylesheet" href="css/animate.min.css">
			<link rel="stylesheet" href="css/owl.carousel.css"> -->
			<link rel="stylesheet" href="css/main.css">
		</head>
		<body>

			<div class="container">
				<div class="row justify-content-center align-item-center">
					<div class="card col-md-8 p-4">
						<div class="card-body">
							<h1>admin login </h1>
							<form class="form-area" id="myForm" action="login.php" method="post" class="contact-form text-right">
								<input name="username" placeholder="username" onfocus="this.placeholder = ''" onblur="this.placeholder = 'username'" class="form-control mt-10" required="" type="text">
								
								<input type="password" class="form-control mt-10" name="password" placeholder="Enter Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Password'" required="">
								<button class="primary-btn mt-20" name="action" type="submit" value="login">Login</button>
								<div class="mt-10 alert-msg">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			
		</body>
	</html>

