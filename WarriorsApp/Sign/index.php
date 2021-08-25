<?php 
session_start();
include("../connection.php");
$error = false;
if(isset($_POST['login'])){
$email_login =htmlentities(mysqli_real_escape_string($connect,$_POST['login_email'])); 
$password_login=htmlentities(mysqli_real_escape_string($connect,$_POST['login_password']));
    
$select_user = "select * from users where user_email='$email_login' AND user_password ='$password_login'";
$query = mysqli_query($connect,$select_user);
$check_user =mysqli_num_rows($query);
    if($check_user == 1){
		
		$_SESSION['user_email']=$email_login;
        $get_user = "select * from users where user_email='$email_login'";
         $run_user =mysqli_query($connect,$get_user);
         $row = mysqli_fetch_array($run_user);
         $user_name = $row['user_name'];
        header("location:../home/index.php");
    }else{
        $error ="Please Check email and password";
    }
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="shortcut icon" href="images/Logo-tilte.png" type="image/x-icone">
		<title>Login</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

		<link rel="stylesheet" href="css/style.css">
	</head>

	<body>

		<div class="wrapper" style="background-image: url('images/bg-registration-form-1.jpg');">
			<div class="inner">
				<div class="image-holder">
					<img src="images/registration-form-1.png" alt="">
				</div>
				<form action="" method="post">
					<h3>Login</h3>
					<?php echo $error; ?>
					<div class="form-wrapper">
						<input type="text" placeholder="Email Address" class="form-control" name="login_email">
						<i class="zmdi zmdi-email"></i>
					</div>
					<div class="form-wrapper">
						<input type="password" placeholder="Password" class="form-control" name="login_password">
						<i class="zmdi zmdi-lock"></i>
					</div>
					<button  name="login">Login
						<i class="zmdi zmdi-arrow-right"></i>
					</button>
					<br>
						<a href="register.php"  class="text-center small">Create Account</a>
				</form>
			</div>
		</div>
		
	</body>
</html>