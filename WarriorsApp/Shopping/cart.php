<?php 
session_start();
include('php/connection.php');

if(isset($_POST['remove'])){
    if($_GET['action']=='remove'){
      foreach($_SESSION['cart'] as $key=>$value){
        if($value['product_id'] == $_GET['id']){
          unset($_SESSION['cart'][$key]);
          echo "<script>alert('Product has been Removed...!')</script>";
          echo "<script>window.location = 'cart.php'</script>";
        }
      }

    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="Style-shop.css">
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-md navbar-dark bg-dark ">
   <a class="navbar-brand warning" href="../home" style="color:#ffc107;">Warriors Store</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
     <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
     <ul class="navbar-nav ml-auto">

      <li class="nav-item ">
       <a class="nav-link" href="Shopping.php">Store</a>
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
       <a class="nav-link" href="cart.php"><img src="img/carts.png" width="30px";> Cart 
       
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
<div class="container-fluid">
    <div class="row px-5">
        <div class="col-md-7" >
            <div class="shopping-cart">

                <?php
                $total = 0;
              if (isset($_SESSION['cart'] )){
               if(count($_SESSION['cart'])!==0){ 
                  $product_id=array_column($_SESSION['cart'],'product_id');
                $result = "SELECT * FROM products";
                $run =mysqli_query($connect,$result);
                while($row=mysqli_fetch_assoc($run)){
                    
                                      $product_name = $row['name_of_products'];
                                      $product_price = $row['price'];
                                      $product_sale = $row['sale'];
                                      $product_photo = $row['photo'];
                                      $product_discr = $row['description_product'];
                                      $id_pr=$row['id'];
                  foreach($product_id as $id){
                    if($row['id']==$id){
                      echo "
    
                      <form action=\"cart.php?action=remove&id=$id_pr\" method=\"post\" class=\"cart-items\">
                                      <div class=\"border rounded\">
                                          <div class=\"row bg-white\">
                                              <div class=\"col-md-3 pl-0\">
                                                  <img src='$product_photo' alt=\"Image1\" class=\"img-fluid\">
                                              </div>
                                              <div class=\"col-md-6\">
                                                  <h5 class=\"pt-2\">$product_name</h5>
                                                  <small class=\"text-secondary\">$product_discr</small>
                                                  <h5 class=\"pt-2\">$$product_sale</h5>
                                                  <button type=\"submit\" class=\"btn btn-warning\">Save for Later</button>
                                                  <button type=\"submit\" class=\"btn btn-danger mx-2\" name=\"remove\">Remove</button>
                                              </div>
                                              <div class=\"col-md-3 py-5\">
                                                  <div>
                                                      <button type=\"button\" class=\"btn bg-light border rounded-circle\"><i class=\"fas fa-minus\"></i></button>
                                                      <input type=\"text\" value=\"1\" class=\"form-control w-25 d-inline\">
                                                      <button type=\"button\" class=\"btn bg-light border rounded-circle\"><i class=\"fas fa-plus\"></i></button>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </form>
                      ";
                      $total = $total + (int)$product_sale;
                    }
                  }


                }
                }else{
                  echo "<h5 class='welcome '>Cart is Empty ^_^</h5>";
                  echo "<img class='' src='img/empty.png' width=150px;>";
                }
              }else{
                  echo "<h5 class='welcome '>Cart is Empty ^_^</h5>";
                  echo "<img class='' src='img/empty.png' width=150px;>";
                }


                ?>

            </div>
        </div>
        <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">

            <div class="pt-4">
                <h6>PRICE DETAILS</h6>

                <hr>
                <div class="row price-details">
                    <div class="col-md-6">
                        <?php
                         if (isset($_SESSION['cart'])){
                          $count  = count($_SESSION['cart']);
                          echo "<h6>Price ($count items)</h6>";
                          }else{
                          echo "<h6>Price (0 items)</h6>";
                         }  
                        ?>
                        <h6>Delivery Charges</h6>
                        <hr>
                        <h6>Amount Payable</h6>
                    </div>
                    <div class="col-md-6">
                        <h6>$<?php echo $total; ?></h6>
                        <h6 class="text-success">FREE</h6>
                        <hr>
                        <h6>$<?php
                            echo $total;
                            ?></h6>
                    </div>
                </div>
            </div>
            <div id="paypal-payment-button"></div>

            
        </div>
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


<script src="https://www.paypal.com/sdk/js?client-id=AQg2_vV8OGhJdzElP1FnDH7PLDm6CdVEzhNg6x67-fRE445FVQym0754udWNjhNANxg65gync8kt-nQt&disable-funding=credit,card"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="index.js"></script>
</body>
</html>