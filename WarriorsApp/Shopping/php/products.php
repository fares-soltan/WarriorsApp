<?php
include('connection.php');
function products(){
  global $connect;
    $products="SELECT * FROM products";
    $products_query=mysqli_query($connect,$products);
    while($row =mysqli_fetch_array($products_query)){
        $id=$row['id'];
        $photo=$row['photo'];
        $name_of_products=$row['name_of_products'];
        $price=$row['price'];
        $sale=$row['sale'];
        $description=$row['description_product'];

        echo "<div class=\"col-md-3 col-sm-6 my-3 my-md-0\" >
          <form action=\"Shopping.php\" method=\"post\">
                  <div class=\"card shadow\">
                      <div>
                          <img src=\"$photo\" class=\"img-fluid card-img-top\" >
                      </div>
                      <div class=\"card-body\">
                          <h5 class=\"card-title\" style=\"font-family: cursive;\">$name_of_products</h5>
                          <h6><i class=\"fas fa-star\"></i>
                          <i class=\"fas fa-star\"></i>
                          <i class=\"fas fa-star\"></i>
                          <i class=\"fas fa-star\"></i>
                          <i class=\"far fa-star\"></i>
                          </h6>
                          <p class=\"card-text\">$description</p>
                          <h5>
                          <small><s class=\"text-secondary\">$price L.E</s></small><br>
                          <span class=\"price\">$sale L.E</span>
                          </h5>
                          <button type=\"submit\" class=\"btn btn-warning my-3\" name=\"add\">Add to Cart<i class=\"fas fa-shopping-cart\"></i></button>
                          <input type='hidden' name='product_id' value='$id'>
                      </div>
                  </div>
                  </form>
            </div>";


}
}
?>
