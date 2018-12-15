<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();} for php 5.4 and above

if(session_id() == '' || !isset($_SESSION)){session_start();}


?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>About Us || Online Beverage Store</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
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
          <li class="active"><a href="about.php">About</a></li>
          <li><a href="products.php">Products</a></li>
          <li><a href="cart.php">View Cart</a></li>
          <li><a href="orders.php">My Orders</a></li>
          <li><a href="contact.php">Contact</a></li>
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

      <nav id = "nav1">
        <ul id = "nav2">
          <li><a href="beer.php">Beer</a></li>
          <li><a href="rum.php">Rum</a></li>
          <li><a href="vodka.php">Vodka</a></li>
          <li><a href="wine.php">Wine</a></li>
          <li><a href="whiskey.php">Whiskey</a></li>
          <li><a href="soft_drinks.php">Soft Drinks</a></li>
          <li><a href="tobacco.php">Tobacco</a></li>
        </ul>
      </nav>
      </header>


    <h1>Admin Dash Board</h1>

    <li><a href="admin.php">Admin</a></li>
    <li><a href="staff.php">Staff</a></li>
    <li><a href="customer.php">Customer</a></li>
    

        <div>
      <li><a href="Beer.php">Beer</a></li>
      <li><a href="Rum.php">Rum</a></li>
      <li><a href="Vodka.php">Vodka</a></li>
      <li><a href="Wine.php">Wine</a></li>
      <li><a href="Whiskey.php">Whiskey</a></li>
      <li><a href="Soft_drinks.php">Soft Drinks</a></li>
      <li><a href="Tobacco.php">Tobacco</a></li>
    </div>


<?php
include ("config.php");
If(isset($_POST['submit'])){
$Whiskey_name=$_POST['w1name'];
$Whiskey_volume=$_POST['w1volume'];
$Whiskey_brand=$_POST['w1brand'];
$Whiskey_category= $_POST['w1cat'];
$Whiskey_country=$_POST['w1country'];
$Whiskey_details=$_POST['w1details'];
$Whiskey_price=$_POST['w1price'];
$Whiskey_pic=$_POST['w1pic'];

  if(move_uploaded_file($_FILES['picture']['tmp_name'],'images/'.$_FILES['picture']['name'])){
    $tmp='images/'.$_FILES['picture']['name'];
  $pic=$_FILES['picture']['name'];    //picture ko name hai tya sql insert ma halna xa bhane
    $new = 'images/'.$_FILES['picture']['name']; 
    if(copy($tmp,$new)){
        echo 'images/'.$_FILES['picture']['name'];
    }
}

$sql = "INSERT INTO whiskey VALUES (null, '$Whiskey_name', '$Whiskey_volume', '$Whiskey_brand', '$Whiskey_category', '$Whiskey_country', '$Whiskey_details', '$Whiskey_price', '$Whiskey_pic')";

$result = $connect->query($sql);
if($result){
echo "Whiskey Added"; 
}else{
  echo "wrong";
}

header("Location: ../admin/admindashboard.php");

}
?>
      <div class="content">

    <form method='post' name="form" enctype="multipart/form-data">
<fieldset style="background-color: #FFE4B5;
      margin-right: 400px;
      margin-left: 300px;
      padding: 5px 10px 10px 20px
      ">
      <legend id="fomhead1">ADD Whiskey</legend>
      
      <p class="l">
      <label>Whiskey Name</label>
      <input type="text" name="w1name" placeholder="Enter Name" required autofocus="autofocus" /></p>
      
      <p class="l">
      <label>Whiskey Volume</label>
      <input type="text" name="w1volume" placeholder="Enter Volume" required></p>
      
      <p class="l">     
      <label>Whiskey Brand</label>
      <input type="text" name="w1brand" placeholder="Enter Brand" required /></p>
      
      <p class="l">
      <label>Whiskey Category</label>
      <input type="text" name="w1cat" placeholder="Enter Category" required /></p>
      
      <p class="l">
      <label>Whiskey Country</label>
      <input type="text" name="w1country" placeholder="Enter Country" required/></p>
      
      <p class="l">     
      <label>Whiskey Details</label>
      <textarea type="text" cols="30" rows="5" name="w1details" placeholder="Enter Details" required></textarea></p>

      <p class="l">     
      <label>Whiskey Price</label>
      <input type="float" name="w1price" placeholder="Enter Price" required></p>

      <p class="l">     
      <label>Images</label>
      &nbspSelect a picture: <input type = "file" name = "w1pic" value = "Select a picture">
      </p>

      <button type="submit" name="submit" style="color: red; border-color: green; hover: darkgreen; margin-left: 200px;" >Add Whiskey Item</button>

      <button type="reset" style="color: red; border-color: green; hover: darkgreen; margin-left: 8px;">Reset</button>
      </fieldset>
    
    </form>

    </div>
      </div>
       <div class="foot">
      <div class="copyright" style="text-align: center;">
          &copy; Children's Party Club
          
              <a href="https://www.facebook.com/" target="_blank" title="facebook"><img src="images/facebook.png" alt="fb"></a>
                <a href="https://twitter.com" target="_blank" title="twitter"><img src="images/twitter.png" alt="tweet"></a>
              <a href="https://plus.google.com/" target="_blank" title="google plus"><img src="images/googleplus.png" alt="goog"></a>
              <a href="https://instagram.com" target="_blank" title="instagram"><img src="images/instagram.png" alt="insta"></a>  
                <a href="https://youtube.com/" target="_blank" title="youtube"><img src="images/youtube.png" alt="youtub"></a>  
      </div>  
    </div>
  </body>
</html>

