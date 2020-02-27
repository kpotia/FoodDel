<?php include 'nav.php'?>

<div class="section-gap">
<?php
include 'config.php';
    $addresses = [];
    $conn = new mysqli('localhost','root','','nnk_fods');
        $results = $conn->query('SELECT * FROM address where customer_id = '.$_SESSION['customer']['id']);
        if ($results) {?>

        <div class="container text-align-center">
       <h2>My Addresses</h2>

       <a href="add-addr.php" class="btn btn-warning">add address</a>

        <div class="row">

       <?php while ($address =$results->fetch_assoc()):?>
            
       <div class="card m-2">
           <div class="card-body">
           <?php echo '<h4 class="mb-0 pb-0">'.$address['addr_name'].'</h4 ><br> '.
								 $address['street'].'<br>'.
								 $address['area'].'<br> '.
								 $address['city'].'<br> '.
								 $address['region'];
								 ?>
				  </div>
           </div>
				    

        <?php endwhile;
        echo ' </div></div>';
    }else{
        echo $conn->error;
    }
?>

</div>
</body>

<?php include 'footer.php';?>
