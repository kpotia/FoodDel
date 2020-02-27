<?php 
	session_start();
	print_r($_SESSION);
	

if (isset($_POST['add_addr'])) {
	extract($_POST);


	$sql = "INSERT INTO `address` (`addr_name`, `customer_id`, `region`, `city`, `area`, `street`, `house No`, `addr_description`) VALUES ( '$addr_name', '$customer_id', '$region', '$city', '$area', '$street', '$house', '$addr_description')";
	include 'config.php';

	echo $sql;

	$conn->query($sql);

}
	

 ?>

 <form method="post">
 	<input type="text" name="addr_name" placeholder="addr_name" class="form-control">
 	<input type="hidden" name="customer_id" value='<?=$_SESSION['customer']['id']?>'>
 	<input type="text" name="region" placeholder="region" class="form-control">
 	<input type="text" name="city" placeholder="city" class="form-control">
 	<input type="text" name="area" placeholder="area" class="form-control">
 	<input type="text" name="street" placeholder="street" class="form-control">
 	<input type="text" name="house" placeholder="house" class="form-control">
 	<input type="text" name="addr_description" placeholder="addr_description" class="form-control">
 	<button name="add_addr" value="submit">submit</button>
 </form>
 

 <?php

 unset($_POST);?>