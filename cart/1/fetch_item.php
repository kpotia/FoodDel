<?php

//fetch_item.php

// include('admin/.php');

$connect = new PDO("mysql:host=localhost;dbname=nnk_fods", "root", "");


$query = "SELECT * FROM product_details ORDER BY id DESC";

$statement = $connect->prepare($query);

if($statement->execute())
{
 $result = $statement->fetchAll();
 $output = '';
 foreach($result as $row)
 {
  $output .= '
  <div class="col-md-3" style="margin-top:12px;margin-bottom:12px;">  
            <div style="border:1px solid #ccc; border-radius:5px; padding:16px; height:300px; width:300px;" align="center" id="product_'.$row["id"].'">
             <img src="images/'.$row["photo"].'" class="img-responsive" style="width: 100%;" /><br />
             <h4 class="text-info">
                        <div class="checkbox">
                            <label><input type="checkbox" class="select_product" data-product_id="'.$row["id"].'" data-product_name="'.$row["name"].'" data-product_price="'.$row["price"] .'" value="">'.$row["name"].'</label>
                        </div>
                  </h4>
             <h4 class="text-danger">GHS '.$row["price"] .'</h4>
            </div>
        </div>
  ';
 }
 echo $output;
}

?>