

<form method="post">
            	<div class="row">
            		<div>
		<h4>RIDER ASSIGNMENT</h4>
		

		<div class="middle">
            <?php
            $riders = $conn->query('SELECT * FROM rider');
            $riders = $riders->fetch_all(MYSQLI_ASSOC);
            
            foreach ($riders as $rider):?>


			<label >
				  <input type="radio" name="myrider" required value=<?php echo '"'.($rider['id']).'"'; ?>/>
				  <div class="front-end box">
				     <?php echo ''.$rider['rider_fname'].''.$rider['rider_sname'].'<br> '.
								 $rider['phone'].'<br> '.
								 $rider['region'];
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