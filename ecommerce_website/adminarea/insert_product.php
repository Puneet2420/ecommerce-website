  <!-- nabar -->
    <!-- first child  -->
        <!-- navbar -->
        <div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
  <div class="container-fluid">
    <img class="logo" src="../images/logo.pnggg" alt="">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../display_all.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../contact.php">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping"></i><sup>1</sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="adminlogin.php">Total Price:100/-</a>
        </li>
         
      </ul>
      <form class="d-flex" action="search_product.php" method="get">
        <input class="form-control me-2" type="search" name="search_data" placeholder="search for items" aria-label="Search">
        <!-- <button class="btn btn-outline-light" type="submit">Search</button> -->
        <input type="submit" value="Search" class="btn btn-outline-light " name="search_data_product">
      </form>
    </div>
  </div>
</nav>
    </div>


    



<!-- connect files  -->
<?php
include('../includes/connect.php');

if(isset($_POST['insert_product'])){
    $product_title=$_POST['product_title'];
    $description=$_POST['description'];
    $keywords=$_POST['keywords'];
    $product_category=$_POST['product_category'];
    $product_brands=$_POST['product_brands'];
    $product_price=$_POST['product_price'];
    $product_status='true';

    // accessing images 
    $product_image1=$_FILES['product_image1']['name'];
    $product_image2=$_FILES['product_image2']['name'];
    $product_image3=$_FILES['product_image3']['name'];

    // accessing image temp name
    $temp_image1=$_FILES['product_image1']['tmp_name'];
    $temp_image2=$_FILES['product_image2']['tmp_name'];
    $temp_image3=$_FILES['product_image3']['tmp_name'];

    // checking empty condition
    if($product_title=='' or $description=='' or $keywords=='' or $product_category=='' or $product_brands=='' or $product_price=='' or $product_image1=='' or $product_image2=='' or $product_image3==''){
        echo "<script>alert('Please fill all the available fields')</script>";
        exit();
    }
    else{
        move_uploaded_file($temp_image1,"./product_images/$product_image1");
        move_uploaded_file($temp_image2,"./product_images/$product_image2");
        move_uploaded_file($temp_image3,"./product_images/$product_image3");
    }

    // insert query 
    $insert_products="insert into `products`(product_title,product_description,product_keyword,category_id,brand_id,product_image1,product_image2,product_image3,product_price,date,status) values('$product_title','$description','$keywords','$product_category','$product_brands','$product_image1','$product_image2','$product_image3','$product_price',NOW(),'$product_status')";

    $result=mysqli_query($conn,$insert_products);
    if($result){
        echo"<script>alert('Successfully inserted product')</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products</title>
       <!-- css link bootstrap-->
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- font link  awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4 mb-2.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css link external-->
    <link rel="stylesheet" href="styles.css">
</head>
<body class="bg-light">
    <div class="container mt-3">
        <h1 class="text-center">Insert Products</h1>

        <!-- form -->
        <form action="" method="post" enctype="multipart/form-data">
            <!-- title  -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label">Product Title</label>
                <input type="text" name="product_title" id="product_title" class="form-control" placeholder="enter product title" autocomplete="off" required="required">
            </div>

            <!-- description  -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="description" class="form-label">Description</label>
                <input type="text" name="description" id="description" class="form-control" placeholder="enter description" autocomplete="off" required="required">
            </div>
            <!-- keywords  -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="keywords" class="form-label">Keywords</label>
                <input type="text" name="keywords" id="keywords" class="form-control" placeholder="enter keywords" autocomplete="off" required="required">
            </div>

            <!-- categories  -->
            <div class="form-outline mb-4 w-50 m-auto">
                 <select name="product_category" id="" class="form-select">
                    <option value="">Select a Category</option>
                    <?php
                    $select_query="select * from `categories`";
                    $result_query=mysqli_query($conn,$select_query);
                    while($row=mysqli_fetch_assoc( $result_query)){
                        $category_title=$row['category_title'];
                        $category_id=$row['category_id'];
                        echo "<option value='$category_id'>$category_title</option>";
                    }
                    ?>
                 </select>
            </div>
            <!-- Brands  -->
            <div class="form-outline mb-4 w-50 m-auto">
                 <select name="product_brands" id="" class="form-select">
                    <option value="">Select a Brands</option>
                    <?php
                    $select_query="select * from `brands`";
                    $result_query=mysqli_query($conn,$select_query);
                    while($row=mysqli_fetch_assoc( $result_query)){
                        $brand_title=$row['brand_title'];
                        $brand_id=$row['brand_id'];
                        echo "<option value='$brand_id'>$brand_title</option>";
                    }
                    ?>
                 </select>
            </div>
            <!-- images1 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image1" class="form-label">Product_images1</label>
                <input type="file" name="product_image1" id="product_image1" class="form-control" required="required">
            </div>
            <!-- images2 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image2" class="form-label">Product_images2</label>
                <input type="file" name="product_image2" id="product_image2" class="form-control" required="required">
            </div>
            <!-- images3 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image3" class="form-label">Product_images1</label>
                <input type="file" name="product_image3" id="product_image3" class="form-control" required="required">
            </div>
            <!-- price of product  -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-label">Product price</label>
                <input type="text" name="product_price" id="product_price" class="form-control" placeholder="enter product_price" autocomplete="off" required="required">
            </div>
            <!-- price  -->
            <div class="form-outline mb-4 w-50 m-auto">
                 <input type="submit" name="insert_product" class="btn btn-info mb-3 px-3" value="Insert Products">
            </div>
        </form>
    </div>
</body>
</html>