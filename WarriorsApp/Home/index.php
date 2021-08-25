<?php
include('../connection.php');
session_start();
ob_start();
if(!isset($_SESSION['user_email'])){
  header("location: ../sign/");
}
?>  
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utd-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Warriors</title>
    <link rel="shortcut icon" href="img/Logo-tilte.png" type="image/x-icone">
	<link rel="stylesheet" href="bootstrap-4.1.3-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="css/fixed.css">
</head>

<body data-spy="scroll" data-target="#navbarResponsive">
	<!--N A V B A R-->
  <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand warning" href="index.php" style="color:#ffc107;">Warriors Store</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
     <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
     <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
       <a class="nav-link" href="#home">Home</a>
      </li>
      <li class="nav-item">
       <a class="nav-link" href="#team">Team</a>
      </li>
      <li class="nav-item">
       <a class="nav-link" href="#Videos">Videos</a>
      </li>
      <li class="nav-item">
       <a class="nav-link" href="#about">About</a>
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
<li>
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
			<h1>Welcome to Warriors Club</h1>
			<h3>GYM</h3>
      <form method='post'>
			<input type="submit" class="btn btn-outline-light btn-lg" name="go" value='Go Shopping'>
      </form>
      <?php 
      if(isset($_POST['go'])){
        header("location:../Shopping/Shopping.php");
      }
      ?>
		</div>
		<!--End-Landing-->
		<!--T E A M-->
<div class="container-fluid padding">
	<div class="row welcome text-center">
		<div class="col-12">
			<h1 class="display-4">Warriors Team</h1>
			<hr style="margin-bottom:5px !important; margin-top:5px !important;" />
		</div>
	</div>
</div>
<div class="container-fluid padding" id="team">
	<div class="row padding">
		<div class="col-md-3">
			<div class="card">
				<img class="card-img-top" src="img/profile1.JFIF" height="528.77px";>
				<div class="card-body">
					<h4 class="card-title">Fares Mohamed</h4>
					<p class="card-text">I started street workout since 2015 
Me and my teammates started making a team and teach people our game 
I want to reach a high level and be able to compete with the strongest people and win alot of trophies 🏆 
I’m a calisthenics trainer and love what i do</p>
					<a href="#" target="_blank" class="btn btn-outline-secondary">See Profile</a>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="card">
				<img class="card-img-top" src="img/profile2.JFIF" height="528.77px";>
				<div class="card-body">
					<h4 class="card-title" >Fares Mohamed</h4>
					<p class="card-text" >I started street workout since 2015 
Me and my teammates started making a team and teach people our game 
I want to reach a high level and be able to compete with the strongest people and win alot of trophies 🏆 
I’m a calisthenics trainer and love what i do</p>
					<a href="#" target="_blank" class="btn btn-outline-secondary">See Profile</a>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="card">
				<img class="card-img-top" src="img/profile3.JFIF" height="528.77px";>
				<div class="card-body">
					<h4 class="card-title">Fares Mohamed</h4>
					<p class="card-text">I started street workout since 2015 
Me and my teammates started making a team and teach people our game 
I want to reach a high level and be able to compete with the strongest people and win alot of trophies 🏆 
I’m a calisthenics trainer and love what i do</p>
					<a href="#" target="_blank" class="btn btn-outline-secondary">See Profile</a>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="card">
				<img class="card-img-top" src="img/profile4.JFIF" height="528.77px";>
				<div class="card-body">
					<h4 class="card-title">‏‎Fares Mohamed</h4>
					<p class="card-text">I started street workout since 2015 
Me and my teammates started making a team and teach people our game 
I want to reach a high level and be able to compete with the strongest people and win alot of trophies 🏆 
I’m a calisthenics trainer and love what i do</p>
					<a href="#" target="_blank" class="btn btn-outline-secondary">See Profile</a>
				</div>
			</div>
		</div>
	</div>
</div>
<!--end team-->
<!--V I D E O S-->
<div class="container-fluid padding">
	<div class="row welcome text-center">
		<div class="col-12">
			<h1 class="display-4" id="Videos">Videos</h1>
			<hr style="margin-bottom:5px !important; margin-top:5px !important;" />
		</div>
	</div>
</div>
<div class="row">
            <div class="col-lg-6 wow fadeIn mb-5 text-center text-lg-left">
              <div class="white-text">
                <h1 class="h1-responsive font-weight-bold wow fadeInLeft" data-wow-delay="0.3s">Fitness Motivation</h1>
                <hr class="hr-light wow fadeInLeft" data-wow-delay="0.3s">
                <p class="wow fadeInLeft" data-wow-delay="0.3s">System of exercises with Various levels of Exertion provided for Health strengthening, development of strength and stamina, as well as for shaping an athletic constitut ..The aim of these exercises is to train muscular strength and to evolve comprehensive fitnesS</p>
                <br>
                <a class="btn btn-outline-white wow fadeInLeft" data-wow-delay="0.3s"></a>
              </div>
            </div>
            <div class="col-lg-6 col-md-12 wow fadeIn">
              <div class="embed-responsive embed-responsive-16by9 wow fadeInRight">
              <iframe width="560" height="315" src="https://www.youtube.com/embed/TR63LLUUTa4"
											frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
											allowfullscreen></iframe>
              </div>
            </div>
</div>
<!-- E N D-V I D E O S-->
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
          <a class="fb-ic" href="https://www.facebook.com/BarWarriorsTeam/" target="_blank">
            <i class="fab fa-facebook-f white-text mr-4"></i>
          </a>
          <!-- Google +-->
          <a class="gplus-ic" href=="#"target="_blank">
            <i class="fab fa-google-plus-g white-text mr-4"> </i>
          </a>
          <!--Instagram-->
          <a class="ins-ic" href="https://instagram.com/bar.warriors?igshid=1roouxhlbq5bj" target="_blank">
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
</html>