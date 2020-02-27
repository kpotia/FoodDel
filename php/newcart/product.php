<?php
session_start();
$con =  new mysqli('localhost','root','','dadadadssdb');

$prods = $con->query('SELECT * FROM tblproduct');
// var_dump($prods);
while ($prod = $prods->fetch_assoc()) {
	// var_dump($prod);
?>
<div class="card product" style="display: inline-block; width: 250px;">
	<img src="" style="width: 200px; height: 200px;background: #98CCDD;" alt=<?php echo($prod['prod_name'])?>>

	<form method="post">
		product name: <?php echo($prod['prod_name'])?> - 
		cat: <?php echo($prod['prod_cat'])?><br>
		product Description: <?php echo($prod['prod_descr'])?><br>
		price: <?php echo($prod['prod_price'])?>

		quantity:<input type="number" name="product[quantity]"><br>
		<input type="hidden" name="product[prod_id]" value=<?php echo($prod['prod_id'])?> >
		<input type="hidden" name="product[prod_price]" value=<?php echo($prod['prod_price'])?>>
		<br>
		<button >Add to cart</button>
	</form>
</div>

<?php 
}

var_dump($_POST);

$product = $_POST['product'];

if (isset($_SESSION['cart'])) {

array_push($_SESSION['cart'], $product);

}else{
	$_SESSION['cart'] = [];

array_push($_SESSION['cart'], $product);

}



// $size = sizeof($_SESSION['cart']);
 foreach ($_SESSION["cart"] as $item) {
 	var_dump($item);
                // $count++;
            }

// session_unset();?>

<a href="buynow.php">Buy Now
</a>