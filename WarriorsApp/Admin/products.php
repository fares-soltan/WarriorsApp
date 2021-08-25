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
                       <!-- Insert products to database -->
                        <?php
                          if(isset($_POST['add_product'])){
                            $Product_Name = $_POST['Product_Name'];
                            $Product_Description = $_POST['Product_Description'];
                            $Product_Price = $_POST['Product_Price'];
                            $Product_Sale = $_POST['Product_Sale'];
                            $image_post = $_FILES['image']['name'];
                            $image_temp=$_FILES['image']['tmp_name'];
                            move_uploaded_file($image_temp,"../Shopping/img/$image_post");
                            $qeury ="INSERT INTO products (name_of_products, description_product, price, sale, photo) VALUES ('$Product_Name', '$Product_Description', '$Product_Price', '$Product_Sale', 'img/$image_post')";
                            $insert_product=mysqli_query($connect , $qeury);
                          }

                         ?>
                         <form action="products.php" method="post" enctype="multipart/form-data">
                             <div class="form-group">
                                <label for="cat-title">Product Name</label>
                                 <input type="text" class="form-control" name ="Product_Name">
                             </div>
                             <div class="form-group">
                                <label for="cat-title">Product Description</label>
                                 <input type="text" class="form-control" name ="Product_Description">
                             </div>
                             <div class="form-group">
                                <label for="cat-title">Product Price</label>
                                 <input type="text" class="form-control" name ="Product_Price">
                             </div>
                             <div class="form-group">
                                <label for="cat-title">Product Sale</label>
                                 <input type="text" class="form-control" name ="Product_Sale">
                             </div>
                             <div class="form-group">
                                <label for="post-image">Product Image</label>
                                 <input type="file" name ="image" accept=".jpg, .jpeg, .png">
                             </div>
                             <div class="form-group">
                                 <input type="submit" class="btn btn-primary" name ="add_product">
                             </div>
                             
                         </form>
                     </div>
                     <div class="row">
              <div class="col-md-6 col-xs-12">
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
                                        <th>Product Name</th>
                                        <th>Product Description</th>
                                        <th>Product Price</th>
                                        <th>Product Sale</th>
                                        <th>Photo</th>
                              </tr>
                            </thead>
                            <tbody>
                                  <!-- show products in table -->
                                   <?php
                                    $query = "SELECT * FROM products";
                                    $query_pro_show = mysqli_query($connect,$query);
                                    while($tabel_product =mysqli_fetch_assoc($query_pro_show)){
                                      $product_id = $tabel_product['id'];  
                                      $product_name = $tabel_product['name_of_products'];
                                      $product_price = $tabel_product['price'];
                                      $product_sale = $tabel_product['sale'];
                                      $product_photo = $tabel_product['photo'];
                                      $product_discr = $tabel_product['description_product'];
                                        echo "<tr>";
                                        echo "<td>$product_id</td>";
                                        echo "<td>$product_name</td>";
                                        echo "<td>$product_discr</td>";
                                        echo "<td>$product_price</td>";
                                        echo "<td>$product_sale</td>";
                                        echo "<td><img src='../Shopping/$product_photo' style=width:50px;></td>";
                                        echo "<td><a href='products.php?delete=$product_id'>Delete</a></td>";
                                        echo "</tr>";
                                    }
                                    
                                    ?>
                                    <!-- Delete products query  -->
                                    <?php 
                                    if(isset($_GET['delete'])){
                                        $product_id = $_GET['delete'];
                                        $query ="DELETE FROM products WHERE id = {$product_id}";
                                        $query_delete = mysqli_query($connect,$query);
                                        header("Location: products.php");
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
