<?php
// including connect file 
include('./includes/connect.php');

//getting products
function getproducts(){
  global $conn;
  if(!isset($_GET['category'])){
    if(!isset($_GET['brand'])){
    $select_query="select * from `products`order by rand() limit 0,9";
      $result_query=mysqli_query($conn,$select_query);
      while($row=mysqli_fetch_assoc($result_query)){
        $product_id=$row['product_id'];
        $product_title=$row['product_title'];
        $product_description=$row['product_description'];
        $product_image1=$row['product_image1'];
        $product_price=$row['product_price'];
        $category_id=$row['category_id'];
        $brand_id=$row['brand_id'];
        // echo"product_title";
        echo"
        <div class='col-md-4 mb-2'>
              <div class='card' style='width: 18rem;'>
          <img src='./adminarea/product_images/$product_image1' class='card-img-top' alt='$product_title'>
          <div class='card-body'>
            <h5 class='card-title'>$product_title</h5>
            <p class='card-text'>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
            <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>view more</a>
          </div>
          </div>
        </div>";
      }
    }
  }
}

// displaying brands
function getbrands(){
  global $conn;
  $select_brands="select * from `brands`";
      $result_brands=mysqli_query($conn,$select_brands);
      while( $row_data=mysqli_fetch_assoc($result_brands)){
        $brand_title=$row_data['brand_title'];
        $brand_id=$row_data['brand_id'];
        echo"      <li class='nav-item'>
        <a href='index.php?brand=$brand_id' class='nav-link text-light'>$brand_title</a>
        </li>";
      }
}


// displaying categories
function getcategories(){
  global $conn;
  $select_categories="select * from `categories`";
  $result_categories=mysqli_query($conn,$select_categories);
   
  while( $row_data=mysqli_fetch_assoc($result_categories)){
    $categories_id=$row_data['category_id'];
    $categories_title=$row_data['category_title'];
    echo"      <li class='nav-item'>
    <a href='index.php?category=$categories_id' class='nav-link text-light'>$categories_title</a>
    </li>";
  }
}

// getting unique categories
function get_unique_categories(){
  global $conn;
  if(isset($_GET['category'])){
    $category_id=$_GET['category'];
    $select_query="select * from `products`where category_id=$category_id";
      $result_query=mysqli_query($conn,$select_query);
      $num_row_of_rows=mysqli_num_rows($result_query);
      if($num_row_of_rows==0){
        echo"<h2 class='text-center text-danger'>No stock is available !</h2>";
      }
      while($row=mysqli_fetch_assoc($result_query)){
        $product_id=$row['product_id'];
        $product_title=$row['product_title'];
        $product_description=$row['product_description'];
        $product_image1=$row['product_image1'];
        $product_price=$row['product_price'];
        $category_id=$row['category_id'];
        $brand_id=$row['brand_id'];
        echo"
        <div class='col-md-4 mb-2 mb-2'>
              <div class='card' style='width: 18rem;'>
          <img src='./adminarea/product_images/$product_image1' class='card-img-top' alt='$product_title'>
          <div class='card-body'>
            <h5 class='card-title'>$product_title</h5>
            <p class='card-text'>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
            <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>view more</a>
          </div>
          </div>
        </div>";
      }
    }
  }
// getting unique brands
function get_unique_brands(){
  global $conn;
  if(isset($_GET['brand'])){
    $brand_id=$_GET['brand'];
    $select_query="select * from `products`where category_id=$brand_id";
      $result_query=mysqli_query($conn,$select_query);
      $num_row_of_rows=mysqli_num_rows($result_query);
      if($num_row_of_rows==0){
        echo"<h2 class='text-center text-danger'>This Brand is not available for service!</h2>";
      }
      while($row=mysqli_fetch_assoc($result_query)){
        $product_id=$row['product_id'];
        $product_title=$row['product_title'];
        $product_description=$row['product_description'];
        $product_image1=$row['product_image1'];
        $product_price=$row['product_price'];
        $category_id=$row['category_id'];
        $brand_id=$row['brand_id'];
        echo"
        <div class='col-md-4 mb-2 mb-2'>
              <div class='card' style='width: 18rem;'>
          <img src='./adminarea/product_images/$product_image1' class='card-img-top' alt='$product_title'>
          <div class='card-body'>
            <h5 class='card-title'>$product_title</h5>
            <p class='card-text'>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
            <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>view more</a>
          </div>
          </div>
        </div>";
      }
    }
  }

  //searching proucts
  function search_product(){
    global $conn;
    if(isset($_GET['search_data_product'])){
      $search_data_value=$_GET['search_data'];
    $search_query="select * from `products` where product_keyword like'%$search_data_value%'";
      $result_query=mysqli_query($conn,$search_query);
      $num_row_of_rows=mysqli_num_rows($result_query);
      if($num_row_of_rows==0){
        echo"<h2 class='text-center text-danger'>No product is available !</h2>";
      }
      while($row=mysqli_fetch_assoc($result_query)){
        $product_id=$row['product_id'];
        $product_title=$row['product_title'];
        $product_description=$row['product_description'];
        $product_image1=$row['product_image1'];
        $product_price=$row['product_price'];
        $category_id=$row['category_id'];
        $brand_id=$row['brand_id'];
        // echo"product_title";
        echo"
        <div class='col-md-4 mb-2 mb-2'>
              <div class='card' style='width: 18rem;'>
          <img src='./adminarea/product_images/$product_image1' class='card-img-top' alt='$product_title'>
          <div class='card-body'>
            <h5 class='card-title'>$product_title</h5>
            <p class='card-text'>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
            <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>view more</a>
          </div>
          </div>
        </div>";
      }
    }
  }


  // getting all products 
  function get_all_products(){
    global $conn;
    $select_query="select * from `products`order by rand()";
      $result_query=mysqli_query($conn,$select_query);
      while($row=mysqli_fetch_assoc($result_query)){
        $product_id=$row['product_id'];
        $product_title=$row['product_title'];
        $product_description=$row['product_description'];
        $product_image1=$row['product_image1'];
        $product_price=$row['product_price'];
        $category_id=$row['category_id'];
        $brand_id=$row['brand_id'];
        // echo"product_title";
        echo"
        <div class='col-md-4 mb-2 mb-2'>
              <div class='card' style='width: 18rem;'>
          <img src='./adminarea/product_images/$product_image1' class='card-img-top' alt='$product_title'>
          <div class='card-body'>
            <h5 class='card-title'>$product_title</h5>
            <p class='card-text'>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
            <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>view more</a>
          </div>
          </div>
        </div>";
      }
  }


  // view details function 
  function view_details(){
    global $conn;
    if(isset($_GET['product_id'])){
      $product_id=$_GET['product_id'];
      $select_query="select * from `products` where product_id=$product_id";
        $result_query=mysqli_query($conn,$select_query);
        while($row=mysqli_fetch_assoc($result_query)){
          $product_id=$row['product_id'];
          $product_title=$row['product_title'];
          $product_description=$row['product_description'];
          $product_image1=$row['product_image1'];
          $product_image2=$row['product_image2'];
          $product_image3=$row['product_image3'];
          $product_price=$row['product_price'];
          $category_id=$row['category_id'];
          $brand_id=$row['brand_id'];
          echo"
          <div class='col-md-4'>
                <div class='card' style='width: 18rem;'>
            <img src='./adminarea/product_images/$product_image1' class='card-img-top' alt='$product_title'>
            <div class='card-body'>
              <h5 class='card-title'>$product_title</h5>
              <p class='card-text'>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
              <a href='index.php' class='btn btn-secondary'>Go Home</a>
            </div>
            </div>
          </div>
          
          <div class='col-md-8'>
        <!-- related images  -->
        <div class='row'>
            <div class='col-md-12'>
                <h4 class='text-center text-info'>Related products</h4>
            </div>
            <div class='col-md-6'>
          <img src='./adminarea/product_images/$product_image2' class='card-img-top' alt='$product_title'>
                
            </div>
            <div class='col-md-6'>
          <img src='./adminarea/product_images/$product_image3' class='card-img-top' alt='$product_title'>
            </div>
        </div>
    </div>";
        }
      }
  }

  // cart function 
  function cart(){
    if(isset($_GET['add_to_cart'])){
      global $conn;
      $get_ip_add=getIPAddress();
      $get_product_id=$_GET['add_to_cart'];
      $select_query="select * from `cart_details` where ip_address='$get_ip_add' and product_id=$get_product_id";
      $result_query=mysqli_query($conn,$select_query);
      $num_row_of_rows=mysqli_num_rows($result_query);
      if($num_row_of_rows>0){
        echo"<script>alert('This item is already present inside the cart')</script>";
        echo"<script>window.open('index.php','_self')</script>";
      }
      else{
      $insert_query="insert into `cart_details` (product_id,ip_address,quantity) values ($get_product_id,'$get_ip_add',0)";
      $result_query=mysqli_query($conn,$insert_query);
      echo"<script>alert('Item added to the cart successfully')</script>";
      echo"<script>window.open('index.php','_self')</script>";
      }
    }
  }


function cart_item(){
  // if(isset($_GET['add_to_cart'])){
    global $conn;
    $get_ip_add=getIPAddress();
    $select_query="select * from `cart_details` where ip_address='$get_ip_add'";
    $result_query=mysqli_query($conn,$select_query);
    $count_cart_items=mysqli_num_rows($result_query);
  // }
    // else{
    // global $conn;
    // $get_ip_add=getIPAddress();
    // $select_query="select * from `cart_details` where ip_address='$get_ip_add'";
    // $result_query=mysqli_query($conn,$select_query);
    // $count_cart_items=mysqli_num_rows($result_query);
    // }
    echo $count_cart_items;
  }



  // get the ip address
    function getIPAddress() {  
       if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                  $ip = $_SERVER['HTTP_CLIENT_IP'];  
          }  
      elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                  $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
       }  
      else{  
               $ip = $_SERVER['REMOTE_ADDR'];  
       }  
       return $ip;  
  }  
 
?>