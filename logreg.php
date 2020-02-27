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
    // print_r($_SESSION);
    ?>
    <script type="text/javascript">
        alert('you are registered');		
        window.location = 'index.php';		
    </script>
    <?php 
    
}else{ echo $conn->error;}
}

if (isset($_POST['action']) && $_POST['action'] == 'login') {
    $username = (!empty($_POST['username'])) ? $_POST['username'] : null ;
    $pwd = (!empty($_POST['password'])) ? md5($_POST['password']) : null ;
    
    $sql = "SELECT * FROM customer where email = '".$username."' and password ='".$pwd."'";
    require 'config.php';
    $res = $conn->query($sql);
    if ($res->num_rows > 0) {
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
<?php include 'nav.php';?>


        <main class="container">
			<section class="section-gap" id="dish">

            <div class="row">
                <section class="col-lg-6">
                <div class="card p-5">
							<h1>admin login </h1>
							<form class="form-area" id="myForm" action="login.php" method="post" class="contact-form text-right">
								<input name="username" placeholder="username" onfocus="this.placeholder = ''" onblur="this.placeholder = 'username'" class="form-control mt-10" required="" type="text">
								
								<input type="password" class="form-control mt-10" name="password" placeholder="Enter Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Password'" required="">
								<button class="primary-btn mt-20" name="action" type="submit" value="login">Login</button>
								<div class="mt-10 alert-msg">
								</div>
							</form>
						</div>
                </section>
                <section class="col-lg-6">
                <div class="card p-5">
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
                </section>
            </div></section>
        </main>
        <?php include 'footer.php';?>
