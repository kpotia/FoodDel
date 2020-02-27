<?php
    include 'inc/top.php';
    include 'config.php';
    if(isset($_GET['del'])){
        if($conn->query('DELETE FROM rider WHERE id ='.$_GET['del'])){
            echo'<script>alert("record deleted successfully");</script>';
        }else{
            echo $conn->error;
        }
    }
    if(isset($_POST['register-rider'])){
    $rider = "INSERT INTO `rider` (`rider_fname`, `rider_lname`, `rider_phone`, `username`, `password`) VALUES ( ?,?,?, ?, ?) ";

        var_dump($_POST);
        extract($_POST);
        $rider_stmt = $conn->prepare($rider);
        $password =  ($pwd == $cpwd) ? md5($pwd) : '';
        $rider_stmt->bind_param('sssss',$sname,$sname,$phone,$uname,$password);

        if($rider_stmt->execute()){
            ?>
                <script>
                    alert('rider registered successfully');
                    window.location = 'rider.php';
                </script>
            <?php
        }

    }
    $rider = $conn->query('SELECT * FROM rider') or die($conn->error);
    $riders = $rider->fetch_all(MYSQLI_ASSOC);


?>

<div class="container">
<section class="section-gap ">
    <!-- <h2>Riders</h2> -->
    <div class="row justify-content-center">

   <div class="col-md-7">
       <h3>Riders</h3>
   <table class="table  ">
    <thead>
        <tr>
            <th>id</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Phone</th>
            <th>Username</th>
            <th>action</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach($riders as $rider):?>
            <tr>
                <td><?php echo $rider['id'];?></td>
                <td><?php echo $rider['rider_fname'];?></td>
                <td><?php echo $rider['rider_lname'];?></td>
                <td><?php echo $rider['rider_phone'];?></td>
                <td><?php echo $rider['username'];?></td>
                <td>
                <?php echo '<a class="btn btn-secondary mx-2" href="?del='.$rider['id'].'">delete</a>';?>
                    <?php echo '<a class="btn btn-secondary mx-2" href="view-rider.php?rid='.$rider['id'].'">view</a>';?>
            </td>
            </tr>

        <?php endforeach;?>
    </tbody>
</table>
   </div>
   <div class="col-md-5">
       <h3>Register Rider</h3>

    <form action="" method="post" class="form-area">
        <input name="sname" placeholder="Enter surname " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter surname '" class="form-control mt-10" required="" type="text">
        <input name="fname" placeholder="Enter firstname " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter firstname '" class="form-control mt-10" required="" type="text">
        <input name="phone" placeholder="Enter phone number " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter phone number '" class="form-control mt-10" required="" type="text">
        <input name="uname" placeholder="Enter username " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter username '" class="form-control mt-10" required="" type="text">
        <input name="pwd" placeholder="Enter password " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter password '" class="form-control mt-10" required="" type="password">
        <input name="cpwd" placeholder="Confirm password " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Confirm password '" class="form-control mt-10 mb-2" required="" type="password">
        <button type="submit" name="register-rider" class="btn btn-primary">Register rider</button>

    </form>

   </div>

</div>
</section>
</div>

