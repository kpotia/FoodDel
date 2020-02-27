<?php include 'nav.php';?>

			<!-- Start top-dish Area -->
			<section class="top-dish-area section-gap" id="dish">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-60 col-lg-8">
							<div class="title text-center">
								<h1 class="mb-10">Our Top Rated Dishes</h1>
								<p>Who are in extremely love with eco friendly system.</p>
							</div>
						</div>
					</div>						
					
						<?php include_once 'cart2-action.php'; ?>

   <div class="row ">
   <?php
   $query = "SELECT * FROM product_details  ORDER BY id ASC";
   $statement = $connect->prepare($query);
   $statement->execute();
   $result = $statement->fetchAll();
if(sizeof($result)>0){
   foreach($result as $row)
   {
   ?>
   
   <form method="post" class="single-dish col-md-3 card m-4">
   	     <div class="thumb">
                <img class="img-fluid w-100"  src="images/<?php echo $row["photo"]; ?>" style='background: #09fcdd;' alt="">
              </div>
               <h4 class="text-uppercase"><?php echo $row["name"]; ?></h4>

      <h4 class="text-danger">$ <?php echo $row["price"]; ?></h4>

      <input type="number" name="quantity" value="1" class="form-control" min="0" max="10" />
      <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />
      <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />
      <input type="hidden" name="hidden_id" value="<?php echo $row["id"]; ?>" />
      <input type="submit" name="add_to_cart" style="margin-top:5px;" class="primary-btn" value="Add to Cart" />
            </form>
     
        
   <?php } 

   }

   else {
     	echo "No dishes available";
     }  ?>
 </div>
					</div>
				</div>	
			</section>
			<!-- End top-dish Area -->
			

			
			<!-- start footer Area -->		
			<?php include 'footer.php';?>



