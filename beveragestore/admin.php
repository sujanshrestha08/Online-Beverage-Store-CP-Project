<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

if(!isset($_SESSION["username"])) {
  header("location:index.php");
}

if($_SESSION["type"]!="admin") {
  header("location:index.php");
}
include 'config.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //something posted

    if (isset($_POST['btnAddItem'])) {
      $name = $_POST["name"];
      $type = $_POST["type"];
      $desc = $_POST["desc"];
      $qty = $_POST["quantity"];
      $price = $_POST["price"];

    // $pic = "null";
    //   if(move_uploaded_file($_FILES['picture']['tmp_name'],'images/products/'.$_FILES['picture']['name'])){
    //       $tmp='images/products/'.$_FILES['picture']['name'];
    //     $pic=$_FILES['picture']['name'];    //picture ko name hai tya sql insert ma halna xa bhane
    //       $new = 'images/'.$_FILES['picture']['name']; 
    //       if(copy($tmp,$new)){
    //           echo 'images/'.$_FILES['picture']['name'];
    //       }
    //   }

    $filename = $_FILES['picture']['name'];
    $imageFileType = pathinfo($filename, PATHINFO_EXTENSION);
    $target_dir = "images/products/";
    $newFileName =  round(microtime(true)) . '-' . $name . '.' . $imageFileType;
        $target_file = $target_dir . round(microtime(true)) . '-' . $name . '.' . $imageFileType;
        $uploadOk = 1;

        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["picture"]["tmp_name"]);
        if($check !== false) { $uploadOk = 1; } 
        else {
          $message = "File is not an image.";
          $uploadOk = 0;
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
            $message = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        if ($uploadOk == 1) {
          move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file);

          $sql = "INSERT INTO products(product_name, product_code, product_desc, product_img_name, qty, price)VALUES('$name', '$type', '$desc', '$newFileName', $qty, '$price')";

          $result = $connect->query($sql);
          if($result){
            $message = "Product Added"; 
          }else{
            $message = "Please Provide Correct Information";
          }
        }

      header("location:admin.php?message=".$message);  
    }
}
?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin || Online Beverage Store</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
  


<style>
.dropbtn {
    background-color: #4CAF50;
    color: white;
    /*padding: 16px;*/
    font-size: 16px;
    border: none;
    cursor: pointer;
    margin-left: 280px;
}

.dropdown {

    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
    margin-left: 280px;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
    display: block;
}

.dropdown:hover .dropbtn {
    background-color: #3e8e41;
}
</style>
  </head>

  <body>

    <nav class="top-bar" data-topbar role="navigation">
      <ul class="title-area">
        <li class="name">
          <h1><a href="index.php">Online Beverage Store</a></h1>
        </li>
        <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
      </ul>

      <section class="top-bar-section">
      
      <!-- Right Nav Section -->

        <ul class="right">
          <li><a href="index.php">Home</a></li>
          <li><a href="products.php">Products</a></li>
          <li><a href="cart.php">View Cart</a></li>
          <li><a href="orders.php">My Orders</a></li>
          
          <?php

          if(isset($_SESSION['username'])){
            echo '<li><a href="account.php">My Account</a></li>';
            echo '<li><a href="logout.php">Log Out</a></li>';
          }
          else{
            echo '<li><a href="login.php">Log In</a></li>';
            echo '<li><a href="register.php">Register</a></li>';
          }
          ?>
        </ul>
      </section>
    </nav>

        <h3><center>Admin Page!</center
        ></h3>
        <p><center><?php echo '<h3>Hi ' .$_SESSION['fname'] .'</h3>'; ?></center></p>
        

<div class="dropdown">
  <button class="dropbtn">Beverage Items</button>
  <div class="dropdown-content">
    <a href="admin.php">Add Items</a>
    <a href="pdetail.php">Update/Delete Items</a>
    
  </div>
</div>

<div class="dropdown" margin-left="15px">
  <button class="dropbtn">User Accounts</button>
  <div class="dropdown-content">
    <a href="addadmin.php">Add Admin</a>
    <a href="viewadmin.php">Update Own details</a>
    <a href="cdetail.php">View and Delete Users</a>
  </div>
</div>

<div class="row" style="margin-top:30px;">
      <div class="small-12">
            
            <?php
            if (isset($_GET['message'])) {
              echo $_GET['message'];
            }
            ?>

        <p><h4>Add Beverage Items </h4></p>

        <p>Fill the details of the beverage below to be Added.</p>
      </div>
    </div>   
    <hr>
      <div>
          <form method='POST'  name="form" enctype="multipart/form-data">
            <fieldset style="background-color: #FFE4B5;
            margin-left: 200px;
            margin-right: 200px;
            /*margin-left: 300px;
            padding: 5px 10px 10px 20px*/
            ">
              <legend id="fomhead1">Add Item</legend>
              
              <p class="l">
              <label>Product Name</label>
              <input type="text" name="name" placeholder="Enter Name" required autofocus="autofocus" /></p>
              
              <p class="l">
              <label>Product Type</label>
              <select name="type" required autofocus="autofocus">
                  <option>Beer</option>
                  <option>Rum</option>
                  <option>Tobacco</option>
                  <option>Vodka</option>
                  <option>Whiskey</option>
                  <option>Wine</option>
              </select>

              <p class="l">
              <label>Product Desc</label>
              <input type="text" name="desc" placeholder="Enter Desc" required></p>
              
              <p class="l">     
              <label>Product Quantity</label>
              <input type="text" name="quantity" placeholder="Enter Quantity" required /></p>

              <p class="l">     
              <label>Product Price</label>
              <input type="float" name="price" placeholder="Enter Price" required></p>

              <p class="l">     
              <label>Images</label>
              &nbsp;Select a picture: <input type = "file" name = "picture" value = "Select a picture">
              </p>

              <button type="submit" name="btnAddItem" style=" border-color: green;  margin-left: 180px;" >Add Item</button>

              <button type="reset" style=" border-color: green;  margin-left: 100px;">Reset</button>


              
            </fieldset>
          
          </form>

      </div>

      </div>
    </div>


    

      </div>
    </div>
    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
    <?php include 'footer.php';?>
  </body>
</html>