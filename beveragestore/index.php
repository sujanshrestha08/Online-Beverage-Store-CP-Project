<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}
include 'config.php';
?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Online Beverage store</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
  </head>
  <body>


    <nav class="top-bar" data-topbar role="navigation">
     
      <ul class="title-area">
        <li class="name">
          <h1><a href="index.php">Online beverage store</a></h1>
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
    <div id = "searchbar">
   
      <img src="images/d.png" alt="A glass of whisky" height="60" width="80">
      <form method='POST'  name="form" enctype="multipart/form-data">
          <input type="text" name="search" placeholder="What do you want to Search?" style= "float:right; max-width: 25%">
        <button type="submit" name="btnsearch" style=" border-spacing: 50px; float: right; border-spacing: 50px; background-color: purple; border-radius: 80px; height: 5px; border-color: green;  margin-left: 800px; width: 8%;" >Search</button>
    </form>
</div>

    <img data-interchange="[images/a.jpg, (retina)], [images/a.jpg, (large)], [images/a.jpg, (mobile)], [images/a.jpg, (medium)]">
    <noscript><img src="images/a.jpg"></noscript>

<?php
          $i=0;
          $product_id = array();
          $product_quantity = array();
          $result  = array();
          if ($_SERVER['REQUEST_METHOD'] === 'POST') {
              //something posted

              if (isset($_POST['btnsearch'])) {
                   $name = $_POST["search"];
                   $result = $connect->query("SELECT * FROM products where product_name like '%".$name."%'");
              }
          }else{
            $result = $connect->query('SELECT * FROM products');
          }
          if($result === FALSE){
            var_dump("");
           // die(mysql_error());
          }

          if($result){

            while($obj = $result->fetch_object()) {

              echo '<div class="large-4 columns">';
              echo '<p><h3>'.$obj->product_name.'</h3></p>';
              echo '<img src="images/products/'.$obj->product_img_name.'"/>';
              echo '<p><strong>Product Code</strong>: '.$obj->product_code.'</p>';
              echo '<p><strong>Description</strong>: '.$obj->product_desc.'</p>';
              echo '<p><strong>Units Available</strong>: '.$obj->qty.'</p>';
              echo '<p><strong>Price (Per Unit)</strong>: '.$currency.$obj->price.'</p>';



              if($obj->qty > 0){
                echo '<p><a href="update-cart.php?action=add&id='.$obj->id.'"><input type="submit" value="Add To Cart" style="clear:both; background: #0078A0; border: none; color: #fff; font-size: 1em; padding: 10px;" /></a></p>';
              }
              else {
                echo 'Out Of Stock!';
              }
              echo '</div>';

              $i++;
            }

          }

          $_SESSION['product_id'] = $product_id;


          echo '</div>';
          echo '</div>';
          ?>
<hr>
    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
        <center><strong>&copy; Online Beverage Store
         </strong></center> 
         <?php include 'footer.php';?> 
  </body>
</html>