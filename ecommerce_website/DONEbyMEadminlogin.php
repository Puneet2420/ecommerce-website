
<!-- connecting to database -->
<?php
session_start();
$conn=mysqli_connect('localhost','root','','mystore');
if(!$conn){
    echo"connection is successfull";
}

if(isset($_POST['submit'])) {
    $username = $_POST['adminid'];
    $password = $_POST['pass'];
    $query = "SELECT * FROM admindetails WHERE admin_id = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 0) {
        $_SESSION['logged_in'] = 1;
        header("location: adminarea/index.php");
    } else {
        echo "<script>alert('Wrong Admin Details')</script>";
    }
}
?>



<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 10%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>
<body>

<h2>Administration login</h2>

<form action="" method="post">
  <div class="imgcontainer">
    <img src="./images/adminlogin.png" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label for="uname"><b>Admin_Id</b></label>
    <input type="text" placeholder="Enter admin id" name="adminid" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="pass" required>
        
    <button type="submit" name="submit">Login</button>
    
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn">Cancel</button>
    <span class="psw">Forgot <a href="#">password?</a></span>
  </div>
</form>

</body>
</html>
