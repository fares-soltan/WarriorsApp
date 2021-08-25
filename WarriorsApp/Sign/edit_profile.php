<?php
session_start();

include('../connection.php');
$print = false;
 if(isset($_SESSION['user_email'])){
     $user_email=$_SESSION['user_email'];
     $data ="SELECT * FROM users WHERE user_email='$user_email'";
     $query_data=mysqli_query($connect,$data);
     $row = mysqli_fetch_array($query_data);
     $user_name=$row['user_name'];
     $user_password=$row['user_password'];
     $user_phone=$row['user_phone'];
 }else{
     header("location: index.php");
 }
 if(isset($_POST['edit'])){
    $user_email=$_SESSION['user_email'];
    $user_name=$_POST['user_name'];
    $user_password=$_POST['user_password'];
    $user_phone=$_POST['user_phone'];
    $update="UPDATE users SET user_name='{$user_name}', user_password='{$user_password}', user_phone='{$user_phone}' WHERE user_email='{$user_email}'";
    $update_query=mysqli_query($connect,$update);
    $print = "Account modified";
 }
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="shortcut icon" href="images/Logo-tilte.png" type="image/x-icone">
		<title>Registration</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

		<!-- STYLE CSS -->
        <link rel="stylesheet" href="../Shopping/bootstrap-4.1.3-dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/fixed.css">
		<link rel="stylesheet" href="css/style.css">
        
	</head>

	<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
   <a class="navbar-brand warning" href="../home" style="color:#ffc107;">Warriors Store</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
     <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
     <ul class="navbar-nav ml-auto">

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
          <a class="dropdown-item" href="edit_profile.php">Edit profile</a>
          <a class="dropdown-item" href="../sign/logout.php">Logout</a>
        </div>
     </li>
     <li class="nav-item ">
       <a class="nav-link" href="../Shopping/Shopping.php">Store</a>
      </li>
     </ul>
    </div>
  </nav>

		<div class="wrapper" style="background-image: url('images/bg-registration-form-1.jpg');">
			<div class="inner">
				<div class="image-holder">
					<img src="images/registration-form-1.png" alt="">
				</div>
				<form action="" method="post">
					<h3>Edit Profile</h3>
					<h4><?php echo $print; ?></h4>
					<div class="form-wrapper">
						<input type="text" placeholder="Username" class="form-control" name="user_name" value="<?php echo $user_name; ?>">
						<i class="zmdi zmdi-account"></i>
					</div>
					<div class="form-wrapper">
						<input type="text" placeholder="Email" class="form-control" name="user_email" value="<?php echo $user_email; ?>" disabled>
						<i class="zmdi zmdi-email"></i>
					</div>
					<div class="form-wrapper">
						<input type="text" placeholder="Password" class="form-control" name="user_password"value="<?php echo $user_password; ?>">
						<i class="zmdi zmdi-lock"></i>
					</div>
					<div class="form-wrapper">
					<input type="tel" placeholder="Phone Num" class="form-control" name="user_phone"value="<?php echo $user_phone; ?>">
						<i class="zmdi zmdi-phone" style="font-size: 17px"></i>
					</div>
					<button name="edit">Edit
						<i class="zmdi zmdi-arrow-right"></i>
					</button>
				</form>
			</div>
		</div>
		
	</body>
     <!--- Script Source Files -->
 <script src="../Shopping/js/jquery-3.3.1.min.js"></script>
<script src="../Shopping/bootstrap-4.1.3-dist/js/bootstrap.min.js"></script>
<script src="https://use.fontawesome.com/releases/v5.5.0/js/all.js"></script>
 <!--- End of Script Source Files -->
</html>