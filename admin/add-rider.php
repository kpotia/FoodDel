<?php
include  'inc/top.php';
include  'config.php';


?>

<div class="section-gap">
    <form action="" method="post" class="form-area">
        <input name="sname" placeholder="Enter surname " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter surname '" class="form-control mt-10" required="" type="text">
        <input name="fname" placeholder="Enter firstname " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter firstname '" class="form-control mt-10" required="" type="text">
        <input name="phone" placeholder="Enter phone number " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter phone number '" class="form-control mt-10" required="" type="text">
        <input name="uname" placeholder="Enter username " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter username '" class="form-control mt-10" required="" type="text">
        <input name="pwd" placeholder="Enter password " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter password '" class="form-control mt-10" required="" type="password">
        <input name="cpwd" placeholder="Confirm password " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Confirm password '" class="form-control mt-10" required="" type="password">
        <button type="submit" name="register-rider">Register rider</button>

    </form>

</div>