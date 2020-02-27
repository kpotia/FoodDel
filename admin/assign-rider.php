<?php
include 'config.php';
include 'inc/top.php';
if(isset($_GET['order_id'])){
    if(isset($_POST['assign-rider'])){
        if($conn->query('update order set rider = '.$_POST["myrider"].' where order_id='.$_GET["order_id"])){
            // echo '
            // <script>
            //     window.location = 
            // </script>
            // ';
        }
    }
}else {
    header('location: index.php');
    exit;
}
?>
<div class="container">
    <section class="section-gap">

<form method="post">
            	<div class="row">
            		<div>
		<h4>RIDER ASSIGNMENT</h4>
        
        <input type="text" readonly value="orderid">
        <input type="text" readonly value="area">
        <input type="text" readonly value="city">
        <input type="text" readonly value="region">

		<div class="middle">
            <?php
            $riders = $conn->query('SELECT * FROM rider');
            $riders = $riders->fetch_all(MYSQLI_ASSOC);
            
            foreach ($riders as $rider):
            ?>


			<label >
				  <input type="radio" name="myrider" required value=<?php echo '"'.($rider['id']).'"'; ?>/>
				  <div class="front-end box">
				     <?php echo ''.$rider['rider_fname'].' '.$rider['rider_lname'].'<br> '.
								 $rider['rider_phone'].'<br> ';
							//	 $rider['region'];
								 ?>
				  </div>
				</label>
			<?php endforeach;?>
            	</div>
            </div>
        </div>
    <code>Payment is made at delivery</code>

        <!-- <a href="add-addr.php" class="btn btn-warning">add address</a> -->
            <button name="assign-rider" value="1">
            	submit
            </button>
</form>
</section>
</div>
