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
                                          <div class="row">
              <div class="col-md-12 col-xs-12">
                <div class="card">
                  <div class="card-body">
                    <div class="row grid-margin">
                    <div class="row">
                      <div class="col-xs-11">
                        <div class="table-responsive">
                          <table id="order-listing" class="table" cellspacing="0" width="100%">
                            <thead>
                              <tr class="bg-primary text-white">
                                        <th>Id</th>
                                        <th>User Name</th>
                                        <th>User Email</th>
                                        <th>User Phone</th>
                                        <th>Remove</th>
                              </tr>
                            </thead>
                            <tbody>
                                  <!-- show products in table -->
                                   <?php
                                    $query = "SELECT * FROM users";
                                    $query_users_show = mysqli_query($connect,$query);
                                    while($tabel_users =mysqli_fetch_assoc($query_users_show)){
                                      $user_id = $tabel_users['id'];  
                                      $user_name = $tabel_users['user_name'];
                                      $user_email = $tabel_users['user_email'];
                                      $user_phone = $tabel_users['user_phone'];
                                        echo "<tr>";
                                        echo "<td>$user_id</td>";
                                        echo "<td>$user_name</td>";
                                        echo "<td>$user_email</td>";
                                        echo "<td>0$user_phone</td>";
                                        echo "<td><a href='showusers.php?delete=$user_id'>Delete</a></td>";
                                        echo "</tr>";
                                    }
                                    
                                    ?>
                                    <!-- Delete products query  -->
                                    <?php 
                                    if(isset($_GET['delete'])){
                                        $user_id = $_GET['delete'];
                                        $query ="DELETE FROM users WHERE id = {$user_id}";
                                        $query_delete = mysqli_query($connect,$query);
                                        header("Location: Showusers.php");
                                    }
                                    
                                    
                                    ?> 
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php include("include/footer.php") ?>
