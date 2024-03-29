<?php
session_start();
include 'auth.php';
include 'config.php';

$sql = 'SELECT * FROM `orders` o,address ad,customer cus 
WHERE address_id = ad.id and o.customerid = cus.id';

$orders = $conn->query($sql);

$orders = $orders->fetch_all(MYSQLI_ASSOC);
// var_dump($orders)

?>

	<?php include 'inc/top.php';?>
		<main class="main-wrapper">
			<div class="container mb-5" style="margin-top: 50px">
				<section class="row justify-content-center align-items-center mb-5">
					<h1>Welcome to the admin panel</h1>					
				</section>

			<section class="row">
				<div class="col-lg-3">
				<p>primary-action</p>

				<a class="btn btn-ouline-primary btn-block" href="dish.php">Add Dish</a>
				<!-- <a class="btn btn-ouline-primary btn-block">update Dish availability</a> -->
				<!-- <a class="btn btn-ouline-primary btn-block">Add Promotion</a> -->
				<a class="btn btn-ouline-primary btn-block" href="riders.php" >Add Rider</a>
			</div>

			<div class="col">
				
				<div id="Orders">
					<h2>New Orders</h2>

					<table class="table table-border">
						<thead>
							<tr>
								<th>Time</th>
								<th>Customer</th>
								<th>Delivery Address</th>
								<th>Total</th><th>status</th>
								
								<th>Rider</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($orders as $order):?>
							<tr>
								

								<td>
									<?php echo $order['datetime']; ?>
								</td>

								
								<td>
									<?php echo $order['fname']; ?>
									<?php echo $order['sname']; ?>
								</td><td>
									<?php echo $order['region']; ?>
									<?php echo $order['city']; ?>
									<?php echo $order['area']; ?>
								</td>
								
								<td>
									<?php echo $order['total']; ?>
								</td>
								
								<td>
									<?php echo $order['status']; ?>
								</td>

								<td>
									<?php echo $order['rider_id']; ?>
								</td>

								<td>
									<a href="assign-rider.php?order_id=<?php echo $order['id']?>" class="btn">assign rider</a>
									<a href="update-status.php?order_id=<?php echo $order['id']?>" class="btn">update status</a>
								</td>
							</tr>
						<?php endforeach;?>
							
						</tbody>
					</table>
				</div>
			</div>
			</section>

			

		</div>





		</main>


		  <!-- start footer Area -->		
			<footer class="footer-area section-gap">
				<div class="container">
					<div class="row">
						<div class="col-lg-3  col-md-6 col-sm-6">
							<div class="single-footer-widget">
								<h4 class="text-white">About Us</h4>
								<p>
									Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore dolore magna aliqua.
								</p>
							</div>
						</div>
						<div class="col-lg-4  col-md-6 col-sm-6">
							<div class="single-footer-widget">
								<h4 class="text-white">Contact Us</h4>
								<p>
									Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore dolore magna aliqua.
								</p>
								<p class="number">
									012-6532-568-9746 <br>
									012-6532-569-9748
								</p>
							</div>
						</div>						
						<div class="col-lg-5  col-md-6 col-sm-6">
							<div class="single-footer-widget">
								<h4 class="text-white">Newsletter</h4>
								<p>You can trust us. we only send  offers, not a single spam.</p>
								<div class="d-flex flex-row" id="mc_embed_signup">


									  <form class="navbar-form" novalidate="true" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get">
									    <div class="input-group add-on">
									      	<input class="form-control" name="EMAIL" placeholder="Email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email address'" required="" type="email">
											<div style="position: absolute; left: -5000px;">
												<input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
											</div>
									      <div class="input-group-btn">
									        <button class="genric-btn primary circle arrow"><span class="lnr lnr-arrow-right"></span></button>
									      </div>
									    </div>
									      <div class="info mt-20"></div>									    
									  </form>

								</div>
							</div>
						</div>						
					</div>
					<div class="footer-bottom d-flex justify-content-between align-items-center flex-wrap">
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            <p class="footer-text m-0">Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a></p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						<div class="footer-social d-flex align-items-center">
							<a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-twitter"></i></a>
							<a href="#"><i class="fa fa-dribbble"></i></a>
							<a href="#"><i class="fa fa-behance"></i></a>
						</div>
					</div>
				</div>
			</footer>	
			<!-- End footer Area -->
			<script src="js/vendor/jquery-2.2.4.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
			<script src="js/vendor/bootstrap.min.js"></script>			
			<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
  			<script src="js/easing.min.js"></script>			
			<script src="js/hoverIntent.js"></script>
			<script src="js/superfish.min.js"></script>	
			<script src="js/jquery.ajaxchimp.min.js"></script>
			<script src="js/jquery.magnific-popup.min.js"></script>	
			<script src="js/owl.carousel.min.js"></script>			
			<script src="js/jquery.sticky.js"></script>
			<script src="js/jquery.nice-select.min.js"></script>			
			<script src="js/parallax.min.js"></script>	
			<script src="js/waypoints.min.js"></script>
			<script src="js/jquery.counterup.min.js"></script>
			<script src="js/mail-script.js"></script>				
			<script src="js/main.js"></script>	
		</body>
	</html>
