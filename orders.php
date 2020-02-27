<?php include 'nav.php';?>
<main class="container">
			<section class="section-gap">
                <?php
                    include 'config.php';
$sql = 'SELECT o.id,o.datetime,addr_name,paid,total,status FROM `orders` o,address ad
WHERE address_id = ad.id and customerid = '.$_SESSION["customer"]["id"];

$orders = $conn->query($sql);?>
<section class="row">

<?php
                while($order = $orders->fetch_assoc()):?>
                <div class="col-md-4 mb-3">
                <div class="card p-3">
                    
                    <ul>
                        <li><?php echo $order['id'];?></li>
                        <li><?php echo $order['status'];?></li>
                        <li><?php echo $order['datetime'];?></li>
                        <li><?php echo $order['addr_name'];?></li>
                        <li><?php echo ($order['paid'] == 1) ?'paid': 'unpaid';?></li>
                        <li><?php echo $order['total'];?></li>
                    </ul>
                    <a href="order_det.php?oid=<?php echo $order['id'];?>">View order details</a>
                </div>
                </div>
<?php endwhile;?>
			</section>
            </section>
</main>

            <?php include 'footer.php';?>
</body>
</html>