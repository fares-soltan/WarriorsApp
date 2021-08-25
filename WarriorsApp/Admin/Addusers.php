<?php include("include/header.php") ?>
   <div id="wrapper">

<!-- Navigation -->
<?php include("include/nav-bar.php") ?>
<!-- /.navbar-->
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-xs-12">
                        <h1 class="page-header">
                            Welcome to Admin.
                        </h1>
                     <div class="col-md-6 col-xs-12">
                                                  <!-- Insert Users to database -->
                        <?php
                        $succses= false;
                        $error = false;
                          if(isset($_POST['add_users'])){
                            $User_Name = $_POST['user_name'];
                            $User_Email = $_POST['user_email'];
                            $User_Password = $_POST['user_password'];
                            $User_Phone = $_POST['user_phone'];

                            $check_name= "select * from users where user_name='$User_Name'";
                            $run_name = mysqli_query($connect,$check_name);
                            $check_name_for_signup =mysqli_num_rows($run_name);

                            $check_email= "select * from users where user_email='$User_Email'";
                            $run_email = mysqli_query($connect,$check_email);
                            $check_email_for_signup =mysqli_num_rows($run_email);

                            $check_phone= "select * from users where user_phone='$User_Phone'";
                            $run_phone = mysqli_query($connect,$check_phone);
                            $check_phone_for_signup =mysqli_num_rows($run_phone);
                            if(strlen($User_Name)< 4){
                                $error = "Enter your Name Greater than 4 Characters";
                          }elseif (strlen($User_Password)<8){
                             $error = "Enter your Password Greater than 8 numbers"; 
                          }elseif ($check_name_for_signup ==1){
                               $error = "Username Already exists";
                          }elseif($check_email_for_signup ==1){
                              $error = "Email Already exists";
                          }elseif($check_phone_for_signup ==1){
                             $error = "Phone Already exists";
                          }else{
                            $qeury ="INSERT INTO users (user_name, user_email, user_password, user_phone) VALUES ('$User_Name', '$User_Email', '$User_Password', '$User_Phone')";
                            $insert_users=mysqli_query($connect , $qeury);

                            $succses = "<img class='succses' src='images/succses.png' width=40px; >";
                     
                         }
                          }

                         ?>
                         <?php echo "<h4>$error</h4>"; ?>
                         <form action="Addusers.php" method="post" enctype="multipart/form-data">
                             <div class="form-group">
                                <label for="cat-title">User Name</label>
                                 <input type="text" class="form-control" name ="user_name" required>
                             </div>
                             <div class="form-group">
                                <label for="cat-title">User Email</label>
                                 <input type="text" class="form-control" name ="user_email" required>
                             </div>
                             <div class="form-group">
                                <label for="cat-title">User Password</label>
                                 <input type="text" class="form-control" name ="user_password" required>
                             </div>
                             <div class="form-group">
                                <label for="cat-title">User Phone</label>
                                 <input type="text" class="form-control" name ="user_phone" required>
                             </div>
                             <div class="form-group">
                                 <input type="submit" class="btn btn-primary" name ="add_users">
                                 <?php echo $succses; ?>
                             </div>
                         </form>
                     </div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php include("include/footer.php") ?>
