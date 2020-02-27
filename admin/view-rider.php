<?php
include 'config.php';
    if(isset($_GET['rid'])){
        $riderinfo = $conn->query('SELECT * FROM rider');
        $riderinfo = $riderinfo->fetch_assoc();
       

        $deliveries = $conn->query('SELECT * FROM orders inner join address on address.id = address_id  where rider_id = '.$_GET['rid']);
       
        $deliveries = $deliveries->fetch_all(MYSQLI_ASSOC);
        $count_del = sizeof($deliveries);

    }else {
        ?>
            <script>
                alert('Rider Id not set');
                window.location = 'rider.php';
            </script>
        <?php
    }
    include 'inc/top.php';
?>
<div class="container">
<section class="section-gap">
    <div class="card p-3">
        <h4>rider info</h4>
        <ul>
           
                <li>Phone : <?php echo $riderinfo['id']?></li>

                <li>Name : <?php echo $riderinfo['rider_fname'].' '.$riderinfo['rider_lname'];?></li>
                <li>Phone : <?php echo $riderinfo['rider_phone']?></li>
          

            <li>Number of delivery: <?=$count_del?></li>
        </ul>
    </div>

    <table class="table">
        <caption>delivery history</caption>

        <thead>
            <tr>
                <td>orderID</td>
                <td>Date</td>
                <td>address</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach($deliveries as $del):
            // var_dump($del);
            ?>
            <tr>
                <td><?php echo $del['id'];?></td>
                <td><?php echo date('d/M/Y',strtotime($del['datetime']));?></td>
                <td><?php echo strtoupper( $del['region'].' '.$del['city'].' '.$del['area']);?></td>
            </tr>

            <?php
            
            endforeach;?>
        </tbody>
    </table>
</section>
</div>
