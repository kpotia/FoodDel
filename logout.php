<?php
    session_start();
    session_unset('customer');
    header('location: logreg.php');
?>