<?php
//index.php
?>
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

  <script src="jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
      <!--
      CSS
      ============================================= -->
      <link rel="stylesheet" href="css/linearicons.css">
      <link rel="stylesheet" href="css/font-awesome.min.css">
      <link rel="stylesheet" href="css/bootstrap.css">
      <link rel="stylesheet" href="css/magnific-popup.css">
      <link rel="stylesheet" href="css/nice-select.css">          
      <link rel="stylesheet" href="css/animate.min.css">
      <link rel="stylesheet" href="css/owl.carousel.css">
      <link rel="stylesheet" href="css/main.css">
    </head>
    
 <body>
  <div class="container">
   <br />
   <h3 align="center">Dishes</h3>
   <br />
   
   <div class="panel panel-default">
    <div class="panel-heading">
     <div class="row">
      <div class="col-md-6">Cart Details</div>
      <div class="col-md-6" align="right">
       <button type="button" name="clear_cart" id="clear_cart" class="btn btn-warning btn-xs">Clear</button>
      </div>
     </div>
    </div>
    <div class="panel-body" id="shopping_cart">

    </div>
   </div>

   <div class="panel panel-default">
    <div class="panel-heading">
     <div class="row">
      <div class="col-md-6">Product List</div>
      <div class="col-md-6" align="right">
       <button type="button" name="add_to_cart" id="add_to_cart" class="btn btn-success btn-xs">Add to Cart</button>
      </div>
     </div>
    </div>
    <div class="panel-body" id="display_item">

    </div>
   </div>
  </div>
 </body>
</html>

<script>  
$(document).ready(function(){

 load_product();

 load_cart_data();
    
 function load_product()
 {
  $.ajax({
   url:"fetch_item.php",
   method:"POST",
   success:function(data)
   {
    $('#display_item').html(data);
   }
  });
 }

 function load_cart_data()
 {
  $.ajax({
   url:"fetch_cart.php",
   method:"POST",
   success:function(data)
   {
    $('#shopping_cart').html(data);
   }
  });
 }

 $(document).on('click', '.select_product', function(){
  var product_id = $(this).data('product_id');
  if($(this).prop('checked') == true)
  {
   $('#product_'+product_id).css('background-color', '#f1f1f1');
   $('#product_'+product_id).css('border-color', '#333');
  }
  else
  {
   $('#product_'+product_id).css('background-color', 'transparent');
   $('#product_'+product_id).css('border-color', '#ccc');
  }
 });

 $('#add_to_cart').click(function(){
  var product_id = [];
  var product_name = [];
  var product_price = [];
  var action = "add";
  $('.select_product').each(function(){
   if($(this).prop('checked') == true)
   {
    product_id.push($(this).data('product_id'));
    product_name.push($(this).data('product_name'));
    product_price.push($(this).data('product_price'));
    product_quantity.push($(this).data('product_quantity'));
   }
  });

  if(product_id.length > 0)
  {
   $.ajax({
    url:"cart-action.php",
    method:"POST",
    data:{product_id:product_id, product_name:product_name, product_price:product_price, action:action},
    success:function(data)
    {
     $('.select_product').each(function(){
      if($(this).prop('checked') == true)
      {
       $(this).attr('checked', false);
       var temp_product_id = $(this).data('product_id');
       $('#product_'+temp_product_id).css('background-color', 'transparent');
       $('#product_'+temp_product_id).css('border-color', '#ccc');
      }
     });

     load_cart_data();
     alert("Item has been Added into Cart");
    }
   });
  }
  else
  {
   alert('Select atleast one item');
  }

 });

 $(document).on('click', '.delete', function(){
  var product_id = $(this).attr("id");
  var action = 'remove';
  if(confirm("Are you sure you want to remove this product?"))
  {
   $.ajax({
    url:"cart-action.php",
    method:"POST",
    data:{product_id:product_id, action:action},
    success:function()
    {
     load_cart_data();
     alert("Item has been removed from Cart");
    }
   })
  }
  else
  {
   return false;
  }
 });

 $(document).on('click', '#clear_cart', function(){
  var action = 'empty';
  if(confirm('you are going to empty your cart')){
    $.ajax({
     url:"cart-action.php",
     method:"POST",
     data:{action:action},
     success:function()
     {
      load_cart_data();
      alert("Your Cart has been clear");
     }
    });}
 });
    
});

</script>