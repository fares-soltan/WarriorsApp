<?php
session_start();

include('../connection.php');
$error = false;
if(isset($_POST['register'])){
	global $connect;
    $name =htmlentities(mysqli_real_escape_string($connect,$_POST['user_name']));
    $email =htmlentities(mysqli_real_escape_string($connect,$_POST['user_email']));
    $password =htmlentities(mysqli_real_escape_string($connect,$_POST['user_password']));
	$phone =htmlentities(mysqli_real_escape_string($connect,$_POST['user_phone']));
     $check_name= "select * from users where user_name='$name'";
     $run_name = mysqli_query($connect,$check_name);
     $check_name_for_signup =mysqli_num_rows($run_name);
     $check_email= "select * from users where user_email='$email'";
     $run_email = mysqli_query($connect,$check_email);
     $check_email_for_signup =mysqli_num_rows($run_email);

	 $check_phone= "select * from users where user_phone='$phone'";
	 $run_phone = mysqli_query($connect,$check_phone);
	 $check_phone_for_signup =mysqli_num_rows($run_phone);

     if(strlen($name)< 4){
           $error = "Enter your Name Greater than 4 Characters";
     }elseif (strlen($password)<8){
        $error = "Enter your Password Greater than 8 numbers"; 
     }elseif ($check_name_for_signup ==1){
          $error = "Username Already exists";
     }elseif($check_email_for_signup ==1){
         $error = "Email Already exists";
     }elseif($check_phone_for_signup ==1){
		$error = "Phone Already exists";
	 }else{
     $query = "INSERT INTO users (user_name,user_email,user_password,user_phone) VALUES('$name','$email','$password','$phone')";
     $result = mysqli_query($connect,$query);
     if($result){
         echo"Congratulations ur acc has been created";
         header("location: index.php");
     }
    }
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
		<link rel="stylesheet" href="css/style.css">
	</head>

	<body>

		<div class="wrapper" style="background-image: url('images/bg-registration-form-1.jpg');">
			<div class="inner">
				<div class="image-holder">
					<img src="images/registration-form-1.png" alt="">
				</div>
				<form action="" method="post">
					<h3>Registration Form</h3>
					<?php echo $error; ?>
					<div class="form-wrapper">
						<input type="text" placeholder="Username" class="form-control" name="user_name">
						<i class="zmdi zmdi-account"></i>
					</div>
					<div class="form-wrapper">
						<input type="text" placeholder="Email Address" class="form-control" name="user_email">
						<i class="zmdi zmdi-email"></i>
					</div>
					<div class="form-wrapper">
						<input type="password" placeholder="Password" class="form-control" name="user_password">
						<i class="zmdi zmdi-lock"></i>
					</div>
					<div class="form-wrapper">
					<input type="tel" placeholder="Phone Num" class="form-control" name="user_phone">
						<i class="zmdi zmdi-phone" style="font-size: 17px"></i>
					</div>
					<button name="register">Register
						<i class="zmdi zmdi-arrow-right"></i>
					</button>
					<br>
					<a href="index.php"  class="text-center small">Login</a>
				</form>
			</div>
		</div>
		
	</body>
</html>