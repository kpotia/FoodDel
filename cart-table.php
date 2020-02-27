<?php include 'nav.php';?>
    <div class="container">
    <main class="container">
			<!-- <section class="section-gap" id="dish"> -->
        <div class="row section-gap">
            <div class="col-5 table-responsive">
                <!-- <div align="right">
                    <a href="cart2-action.php?action=clear" class="btn btn-warning" style="color: white;"><b>Clear Cart</b></a>
                </div> -->
                <table class="table table-border  ">
                    <thead>
                        <tr><b>
                                <th>product name</th>
                                <th>UP</th>
                                <th>Qty</th>
                                <th>Sub-total</th>
                            </b></tr>
                    </thead>
                    <tbody>
                    	<?php if(isset($_COOKIE["shopping_cart"]))
   {
    $total = 0;
    $cookie_data = stripslashes($_COOKIE['shopping_cart']);
    $cart_data = json_decode($cookie_data, true);
    // var_dump($cart_data);
    }
  foreach($cart_data as $keys => $values)
    {
    	echo '<tr>
                <td>'.$values["item_name"] .'</td>
                <td>'.$values["item_price"] .'</td>
                <td>'.$values["item_quantity"] .'</td>
                <td>'.($values["item_quantity"] * $values["item_price"]).'</td>
            </tr>';
     $total = $total + ($values["item_quantity"] * $values["item_price"]);
    }
			$addresses = [];
			$conn = new mysqli('localhost','root','','nnk_fods');
			@$results = $conn->query('SELECT * FROM address where customer_id = '.$_SESSION['customer']['id']);
				if ($results) {				
			$addresses = $results->fetch_all(MYSQLI_ASSOC);
			}
			else{
				// echo $conn->error;
			}
			// var_dump($_POST);
		 ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2"></td>
                            <td> <b>Total :</b></td>
                            <td> <?=$total?></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="col table-responsive">
            	<h2>check-out form</h2>
<form method="post">
            	<div class="row">
            		<div>
		<h4>My Addresses</h4>
		

		<div class="middle">
			<?php foreach ($addresses as $address):?>


			<label >
				  <input type="radio" name="myaddress" required value=<?php echo '"'.($address['id']).'"'; ?>/>
				  <div class="front-end box">
				     <?php echo ''.$address['addr_name'].'<br> '.
								 $address['street'].'<br>'.
								 $address['area'].'<br> '.
								 $address['city'].'<br> '.
								 $address['region'];
								 ?>
				  </div>
				</label>
			<?php endforeach;?>
            	</div>
            </div>
        </div>
    <code>Payment is made at delivery</code>

        <a href="add-addr.php" class="btn btn-warning">add address</a>
            <button name="order" value="1">
            	submit
            </button>
</form>
            </div>
        </div>
    </main>
    </div>

<?php
    if(isset($_POST['order'])){
        // var_dump($_POST);
        $order_q = "INSERT INTO `orders` ( `customerid`, `datetime`, `address_id`, `total`) 
        VALUES ('".$_SESSION['customer']['id']."', CURRENT_TIMESTAMP,'".$_POST['myaddress']."', '$total')";
        echo $order_q;

        if($conn->query($order_q)){
            $order_id = $conn->insert_id;
            foreach($cart_data as $keys => $values){
                $order_det = "INSERT INTO `order_details` ( `order_id`, `food_id`, `qty`, `subtotal`) VALUES ( '".$order_id."', '".$values["item_id"]."', '".$values["item_quantity"]."', '".$values["item_quantity"]*$values["item_price"]."')";

               if(!$conn->query($order_det)) echo $conn->error;
            }
            // header('location: orders.php');

        }else{
            echo $conn->error;
        }
    }
?>

<?php include 'footer.php';?>
