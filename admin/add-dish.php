<?php
	session_start();
	include 'config.php';
    //setup a directory where images will be saved 

    if (isset($_POST) && isset($_POST['add-dish'])) {
    	# code...
    
    $target = "../images/"; 
    $target = $target . basename( $_FILES['photo']['name']); 
    
    //Sanitize the POST values
    $name = trim($_POST['name']);
    $description = trim($_POST['description']);
    $price = trim($_POST['price']);
    $category = trim($_POST['category']);
    $photo = trim($_FILES['photo']['name']);
    var_dump($_FILES);

    //Create INSERT query
    $qry = "INSERT INTO product_details(name, description, price, photo, category) VALUES('$name','$description','$price','$photo','$category')";
    $result = @mysqli_query($conn,$qry);
    
    //Check whether the query was successful or not
    if($result) {
            //Writes the photo to the server 
         $moved = move_uploaded_file($_FILES['photo']['tmp_name'], $target);
         
         if($moved) 
         {      
             //everything is okay
             echo "The photo ". basename( $_FILES['photo']['name']). " has been uploaded, and your information has been added to the directory"; 
         } else {  
             //Gives an error if its not okay 
             echo "Sorry, there was a problem uploading your photo. "  . $_FILES["photo"]["error"]; 
         }
        header("location: dish.php");
        exit();
    }else {
        die("Query failed " . mysqli_error($conn));
    } 
    }
 ?>



<form method="post" enctype="multipart/form-data">

	<div class="form-group">
		<input class="form-control" name="name" placeholder="Product name">			
	</div>


	<div class="form-group">
		<input class="form-control" name="description" placeholder="Product description">			
	</div>

	<div class="form-group">
		<input class="form-control" name="price" placeholder="Product price">			
	</div>

	<div class="form-group">
		<select class="form-control" name="category" >
			<option value="dish">Dish</option>
			<option value="drink">Drink</option>
		</select>
	</div>
	
	<div class="form-group">
		<input class="form-control" type="file" name="photo" id="photo">			
	</div>

	<button name="add-dish">Submit</button>
</form>