<?php 

include_once 'cart2-action.php';

?>

   <div class="row">
   <?php
   $query = "SELECT * FROM product_details ORDER BY id ASC";
   $statement = $connect->prepare($query);
   $statement->execute();
   $result = $statement->fetchAll();

   foreach($result as $row)
   {
   ?>
   
   <div class="single-dish col-lg-4">
              <div class="thumb">
                <img class="img-fluid"  src="images/<?php echo $row["photo"]; ?>" alt="">
              </div>
               <h4 class="text-uppercase"><?php echo $row["name"]; ?></h4>

      <h4 class="text-danger">$ <?php echo $row["price"]; ?></h4>

      <input type="text" name="quantity" value="1" class="form-control" />
      <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />
      <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />
      <input type="hidden" name="hidden_id" value="<?php echo $row["id"]; ?>" />
      <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />
            </div>
   <?php }   ?>
 </div>
   

   