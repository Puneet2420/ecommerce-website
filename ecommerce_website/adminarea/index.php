<?php
    session_start();
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- css link bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- font link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4 mb-2.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css link external-->
    <link rel="stylesheet" href="../styles.css">
    <style>
        .admin_image{
            width:100px;
            object-fit:contain;
        }
        .footer{
            position:absolute;
            bottom:0;
        }
    </style>
</head>
<body>
    <!-- nabar -->
    <!-- first child  -->
        <!-- navbar -->
        <div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
  <div class="container-fluid">
    <img class="logo" src="../images/logo.png" alt="">
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

        <!-- second child  -->
        <div class="bg-light">
            <h3 class="text-center p-2">Manage Details</h3>
        </div>

        <!-- third child -->
        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                <div class="m-1 px-5">
                    <a href="#"><img src="../images/puneet.png" alt="" class="admin_image"></a>
                    <p class="text-light text-center">Puneet</p>
                </div>
                <div class="button text-center">
                    <button class="my-3"><a href="insert_product.php" class="nav-link text-light bg-info my-1">Insert Product</a></button>
                    <!-- <button class="my-3"><a href="" class="nav-link text-light bg-info my-1">View Product</a></button> -->
                    <button class="my-3"><a href="index.php?insert_categories" class="nav-link text-light bg-info my-1">
                    Insert Categories</a></button>
                    <!-- <button class="my-3"><a href="" class="nav-link text-light bg-info my-1">View Categories</a></button> -->
                    <button class="my-3"><a href="index.php?insert_brands" class="nav-link text-light bg-info my-1">
                    Insert Brands</a></button>
                    <!-- <button class="my-3"><a href="" class="nav-link text-light bg-info my-1">View Brands</a></button> -->
                    <!-- <button class="my-3"><a href="" class="nav-link text-light bg-info my-1">All orders</a></button> -->
                    <!-- <button class="my-3"><a href="" class="nav-link text-light bg-info my-1">All payments</a></button> -->
                    <!-- <button class="my-3"><a href="" class="nav-link text-light bg-info my-1">List Users</a></button> -->
                    <button class="my-3"><a href="index.php?logout" class="nav-link text-light bg-info my-1">Logout</a></button>

                </div>
            </div>
        </div>
    </div>

    <!-- fourth child  -->
    <div class="container my-5">
        <?php
        if(isset($_GET['insert_categories'])){
            include('insert_categories.php');
        }
        if(isset($_GET['insert_brands'])){
            include('insert_brands.php');
        }
        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == 0) {
            header("location: /em/adminlogin.php");
        }
        ?>
    </div>


    <div class="bg-info p-3 text-center footer">
  <p>All rights reserved-Designed by Puneet</p>
</div>



    <!-- bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>