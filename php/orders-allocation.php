<?php
	//checking connection and connecting to a database
	require_once('connection/config.php');
	//Connect to mysql server
	$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
	if(!$link) {
		die('Failed to connect to server: ' . mysqli_error($link));
	}
	
	//Select database
	$db = mysqli_select_db($link,DB_DATABASE);
	if(!$db) {
		die("Unable to select database");
	}
 
 //Function to sanitize values received from the form. Prevents SQL injection
	function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysqli_real_escape_string($str);
	}
    
    //define default value for flag
    $flag_1 = 1;
	
	//Sanitize the POST values
	$OrderID = clean($_POST['orderid']);
	$StaffID = clean($_POST['staffid']);
	
 
     // update the entry
     $result = mysqli_query($link,"UPDATE orders_details SET StaffID='$StaffID', flag='$flag_1' WHERE order_id='$OrderID'")
     or die("The order or staff does not exist ... \n" . mysqli_error($link)); 
     
     //check if query executed
     if($result) {
     // redirect back to the allocation page
     header("Location: allocation.php");
     exit();
     }
     else
     // Gives an error
     {
     die("order allocation failed ..." . mysqli_error($link));
     }
 
?>