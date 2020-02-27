	<?php 
	
	if (isset($_POST['action']) && $_POST['action'] == 'Signup') {
			var_dump($_POST);
		extract($_POST);

		$password = md5($password);
		
		$sql = "INSERT INTO `customer` ( `fname`, `sname`, `email`, `password`, `phone`, `city`, `region`) 
		VALUES ( '$fname', '$sname', '$email', '$password', '$phone', '$city', '$region')";
		require 'config.php';

		if ($res = $conn->query($sql)) {
			session_start();
			$conn->query('SELECT * FROM customer where id ='. $conn->last_insert_id);
			print_r($_SESSION);
			?>
			<script type="text/javascript">
				alert('you are registered');		
				window.location = 'index.php';		
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
							<h1>Chicken Posey - Sign up </h1>
							<form class="form-area" id="myForm" action="register.php" method="post" class="contact-form text-right">
								<input name="fname" placeholder="Enter Firstname" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Firstname'" class="form-control mt-10" required="" type="text">
								<input name="sname" placeholder="Enter surname " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter surname '" class="form-control mt-10" required="" type="text">

								

								<input name="region" placeholder="Region" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Region'" class="form-control mt-10" required="" type="text">

								<input name="city" placeholder="City" onfocus="this.placeholder = ''" onblur="this.placeholder = 'City'" class="form-control mt-10" required="" type="text">

								<input name="email" placeholder="Enter Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email'" class="form-control mt-10" required="" type="text">

								<input name="phone" placeholder="Enter Phone number" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Phone number'" class="form-control mt-10" required="" type="text">
																
								<input type="password" class="form-control mt-10" name="password" placeholder="Enter Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Password'" required="">
								<button class="primary-btn mt-20" name="action" type="submit" value="Signup">Signup</button>
								<div class="mt-10 alert-msg">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			
		</body>
	</html>

