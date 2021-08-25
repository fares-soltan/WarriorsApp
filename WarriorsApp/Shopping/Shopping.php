<?php

session_start();
include('php/connection.php');
include('php/products.php');

$failure = false;
if(isset($_POST['add'])){
  if(isset($_SESSION['cart'])){
     $item_array_id = array_column($_SESSION['cart'], "product_id");
    
     if(in_array($_POST['product_id'] , $item_array_id)){
       echo "<script>alert('Product is already added in the cart..!')</script>";
       echo "<script>window.location = 'Shopping.php #Items'</script>";
      
     }else{

      $count = count($_SESSION['cart']);
      $item_array = array(
          'product_id' => $_POST['product_id']
      );
      $_SESSION['cart'][$count] = $item_array; 
      header("Location: Shopping.php#Items");
      
  }
  }else{
    $iteam_array = array( 'product_id' => $_POST['product_id']);
    
    $_SESSION['cart'][0]=$iteam_array;
    header("Location: Shopping.php#Items");
  }
}
?>
<!DOCTYPE html>
<html lang="en">
 <head>
    <link rel="shortcut icon" href="img/Logo-tilte.png" type="image/x-icone">
	   <meta charset="utd-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Warriors Store</title>
    <link rel="stylesheet" href="bootstrap-4.1.3-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/fixed.css">
  <link rel="stylesheet" href="style-shop.css">
 </head>
 <body data-spy="scroll" data-target="#navbarResponsive">
  	<!--N A V B A R-->
  <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
  <a class="navbar-brand warning" href="../home" style="color:#ffc107;">Warriors Store</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
     <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
     <ul class="navbar-nav ml-auto">

      <li class="nav-item active">
       <a class="nav-link" href="#home">Store</a>
      </li>
      <li class="nav-item">
       <a class="nav-link" href="#Items">Items</a>
      </li>
      <li class="nav-item">
       <a class="nav-link" href="../Admin/index.php">Admin</a>
      </li>
      <li class="nav-item dropdown">
        <a class="btn btn-warning dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <?php
            
            $user=$_SESSION['user_email'];
            $qeuery= "SELECT * FROM users where user_email='$user'";
            $run =mysqli_query($connect,$qeuery);
            $row=mysqli_fetch_array($run);
            $user_name=$row['user_name'];
            echo $user_name;
              ?>
      </a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href="../sign/edit_profile.php">Edit profile</a>
          <a class="dropdown-item" href="../sign/logout.php">Logout</a>
        </div>
     </li>
      <li class="nav-item">
       <a class="nav-link" href="cart.php" ><img src="img/carts.png" width="30px";> Cart 
       
       <?php 
         if(isset($_SESSION['cart'])){
           $count = count($_SESSION['cart']);
           echo "<span id='cart_count' class='text-warning' > $count</span>";
         }else{
          echo "<span id='cart_count' class='text-warning' > 0</span>";
         }
        ?> 
        </a>
      </li>
       
     </ul>
    </div>
  </nav>
<!--endnav-->
  <!--Landing-->
	<div class="landing" id="home">
      <div class="home-wrap">
		<div class="home-inner">
		  </div>
	  </div>
	</div>
		<div class="caption text-center">
			<h1>Welcome to our store</h1>
			<h3>Lets go shopping</h3>
		</div>
		<!--End-Landing-->
<!--shop-->
<div class="container-fluid padding" id="Items">
	<div class="row welcome text-center">
		<div class="col-12">
			<h1 class="display-4">Items</h1>
			<hr style="margin-bottom:5px !important; margin-top:5px !important;" />
		</div>
	</div>
</div>
<div class="container" >
  <?php
  
  if ($failure !== false){
    echo "<h5 class='text-center'>$failure</h5>";
  } 
  ?>
    <div class="row text-center py-3">
        <?php
        products();
        ?>
    </div>
</div>
<!--E N D- S H O P-->
<div class="container">
 <hr>
 <div class="row">
        <div class="col-md-4">
          <div class="block">
           <i class="fas fa-shopping-cart " style="    width: 60px;
    height: 70px;"></i>
            <h3 class="block__heading heading--4">Shoping Lowest Price🔥 </h3>
            <p class="block__content py-3">Find Our Lowest Possible Price ✓<br> Cheapest Shoping For Sale ✓<br> Special Discounts ✓</p>
</div>        </div>
        <br>
        <div class="col-md-4">
          <div class="block">
           <i class="fas fa-tshirt" style="    width: 60px;
    height: 70px;"></i>
            <h3 class="block__heading heading--4">High Quality T-Shirts from Bar Warriors 🤙</h3>
            <p class="block__content">Unique designs ✓ <br>Shop High QualityT-Shirts now!✓</p>
</div>        </div>
        <br>
        <div class="col-md-4">
          <div class="block">
           <i class="fas fa-truck" style="    width: 60px;
    height: 70px;"></i>
            <h3 class="block__heading heading--4">Delivery </h3><br>
            <p class="block__content">Delivery is available anywhere in Egypt 💯</p>
</div>        </div>
        </div>
    </div>
<!-- F O O T E R-->
<footer class="page-footer font-small unique-color-light" style="
    padding-top: 10px;"id="about">

  <!-- Footer Links -->
  <div class="container text-center text-md-left mt-1">

    <!-- Grid row -->
    <div class="row mt-2 ">

      <!-- Grid column -->
      <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4 ">

        <!-- Content -->
        <h6 class="text-uppercase font-weight-bold">Warriors 🔥</h6>
        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 150px; background-color:#ffc107; ">
        <p>A series of unique and up-to- date training, Specially designed and Implemented <br><br>
				- Small group workouts, Private classes or one-to- one training, All at very competitive prices.<br><br>
				- Life coaching and Motivation training by top Highly Qualified trainers</p>

      </div>
      <!-- Grid column -->

      
      <!-- Grid column -->
      <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">

        <!-- Links -->
        <h6 class="text-uppercase font-weight-bold">Useful links</h6>
        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 110px; background-color:#ffc107;">
        <p>
          <a href="#!" style="color:#6B7177;">Your Account</a>
        </p>
        <p>
          <a href="#!" style="color:#6B7177;">Become an Affiliate</a>
        </p>
        <p>
          <a href="#!" style="color:#6B7177;">Help</a>
        </p>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">

        <!-- Links -->
        <h6 class="text-uppercase font-weight-bold">Contact</h6>
        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 80px; background-color:#ffc107;">
        <p>
          <i class="fas fa-home mr-3"></i> Location</p>
        <p>
          <i class="fas fa-envelope mr-3"></i> Gmail</p>
        <p>
          <i class="fas fa-phone mr-3"></i> Phone</p>
        <p>
          <i class="fas fa-phone mr-3"></i> Phone</p>
				<!-- Facebook -->
          <a class="fb-ic" href="#" target="_blank">
            <i class="fab fa-facebook-f white-text mr-4"></i>
          </a>
          <!-- Google +-->
          <a class="gplus-ic" href=="#"target="_blank">
            <i class="fab fa-google-plus-g white-text mr-4"> </i>
          </a>
          <!--Instagram-->
          <a class="ins-ic" href="#" target="_blank">
            <i class="fab fa-instagram white-text"> </i>
          </a>
      </div>
      

    </div>

  </div>
       <!-- Copyright -->
  <div class="footer-copyright text-center py-2" style="background-color:#000 ;">Powered and developed by
    <i class="fas fa-code"></i><a href="https://www.facebook.com/profile.php?id=100009994175396"
    target="_blank" style="color: #ffc107;"> Fares M.Soltan</a>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->

 <!--- Script Source Files -->
 <script src="js/jquery-3.3.1.min.js"></script>
<script src="bootstrap-4.1.3-dist/js/bootstrap.min.js"></script>
<script src="https://use.fontawesome.com/releases/v5.5.0/js/all.js"></script>
 <!--- End of Script Source Files -->
 </body>
