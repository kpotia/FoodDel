<?php
if(isset($_GET['oid'])){
    include 'config.php';
    include 'nav.php';

    $order1 = $conn->query('SELECT * FROM orders inner join address on address.id = address_id where orders.id  ='.$_GET['oid']);
    //echo $conn->error;
    $order1 = $order1->fetch_assoc();
    $order_det = $conn->query('SELECT * FROM order_details inner join product_details on food_id = id where order_id  ='.$_GET['oid']);
}else {
    header('location: orders.php');
    exit;
}
?>

<body>
    <div class="container section-gap">
        <section class="row">
            <div class="col-md-4">
            <div class="card p-3 ">
            <?php //var_dump($order1); ?>
            <ul>
                <li>
                    ORDER ID: <?php echo $order1['id'];?>

                </li>
                <li>
                    ORDER Date: <?php echo $order1['datetime'];?>

                </li>

                <li>
                    Status: <?php echo strtoupper($order1['status']);?>
                </li>

                <li>
                    Address:
                    <?php echo $order1['house No'].' '.$order1['street'] .' '.strtoupper($order1['area']) .' '.strtoupper($order1['region']) ; ?>
                </li>

                <li>
                    Total: <?php echo $order1['total'];?>
                </li>
            </ul>
        </div>
            </div>

            <div class="col-3"> 
            <div class="card p-3 ">

                rider info
            </div>
            </div>
        </section>
        
        <table class="table table-responsive">
            <thead>
                <tr>
                    <th>food</th>
                    <th>U.P.</th>
                    <th>Qty</th>
                    <th>SubTotal</th>
                </tr>
            </thead>

            <?php while($order = $order_det->fetch_assoc()):?>

            <tr>
                <?php //var_dump($order);?>
                <td> <?php echo $order['name'];?></td>
                <td> <?php echo $order['price'];?></td>
                <td> <?php echo $order['qty'];?></td>
                <td> <?php echo $order['subtotal'];?></td>
            </tr>

            <?php endwhile;?>

            <tr>
                <td colspan="2"></td>
                <td class='font-weight-bold'>Total:</td>
                <td class='font-weight-bold text-primary'><?php echo $order1['total'];?></td>
            </tr>
        </table>
    </div>

    </main>


    <?php include 'footer.php';?>