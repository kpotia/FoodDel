<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/fav.png">
    <!-- Author Meta -->
    <meta name="author" content="codepixer">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>Restaurant</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <!--
			CSS
			============================================= -->
    <link rel="stylesheet" href="css/linearicons.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/owl.carousel.css"> -->
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/radio.css">
    <?php include 'cart2-action.php';?>

</head>

<body>
<header id="header" id="home" class="mb-2">
			    <div class="container">
			    	<div class="row align-items-center justify-content-between d-flex">
				      <div id="logo">
				        <a href="index.html"><img src="img/logo.png" alt="" title="" /></a>
				      </div>
				      <nav id="nav-menu-container">
				        <ul class="nav-menu">
				          <li class="menu-active"><a href="index.php">Home</a></li>
				          <li><a href="dishes.php">Dishes</a></li>
				          <li><a href="orders.php">Orders</a></li>
				          <li><a href="cart-table.php">Cart
                              <span class="badge badge-danger p-1">
                                  <?php echo sizeof(json_decode($_COOKIE['shopping_cart']));?>
                              </span>
                          </a></li>
				          
                          <?php session_start(); if(isset($_SESSION['customer'])):?>
				          <li class="menu-has-children"><a href="">Hi <?php echo $_SESSION['customer']['fname'];?></a>
				            <ul>
				              <li><a href="profile.php">Profile</a></li>
				              <li><a href="addresses.php">My Addresses</a></li>
				              <li><a href="logout.php">Logout</a></li>
				              
				            </ul>
                          </li>
                        <?php else:?>
                            <li><a href="logreg.php">Login/Register</a></li>
                        <?php endif;?>
				        </ul>
				      </nav><!-- #nav-menu-container -->		    		
			    	</div>
			    </div>
        </header>
        
