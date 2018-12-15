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
    <title>Products || Online Beverage Store</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <link rel="stylesheet" href="css/w3.css">
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
          <li class='active'><a href="products.php">Products</a></li>
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





    <div class="row" style="margin-top:30px;">
      <div class="small-12" style="font-color:red; border-radius: 90px;">
        <p><h4><center> Wine</center></h4></p>
      </div>
    </div> 

    <div class="row" style="margin-top:10px;">
        <?php
          $i=0;
          $product_id = array();
          $product_quantity = array();

          $result = $connect->query('SELECT * FROM products where product_code="Wine"');
          if($result === FALSE){
            die(mysql_error());
          }

          if($result){

            while($obj = $result->fetch_object()) {

              // echo '<div class="large-4 columns">';
              // echo '<p><h3>'.$obj->product_name.'</h3></p>';
              // echo '<img src="images/products/'.$obj->product_img_name.'"/>';
              // echo '<p><strong>Product Code</strong>: '.$obj->product_code.'</p>';
              // echo '<p><strong>Description</strong>: '.$obj->product_desc.'</p>';
              // echo '<p><strong>Units Available</strong>: '.$obj->qty.'</p>';
              // echo '<p><strong>Price (Per Unit)</strong>: '.$currency.$obj->price.'</p>';



              // if($obj->qty > 0){
              //   echo '<p><a href="update-cart.php?action=add&id='.$obj->id.'"><input type="submit" value="Add To Cart" style="clear:both; background: #0078A0; border: none; color: #fff; font-size: 1em; padding: 10px;" /></a></p>';
              // }
              // else {
              //   echo 'Out Of Stock!';
              // }
              // echo '</div>';

              // $i++;

              echo '<div class="small-3 large-4 columns">';
                echo '<div class="w3-container">';
                  echo '<div class="w3-card-4" style="width:100%">';
                    echo '<h2>'. $obj->product_name .'</h2>';
                    echo '<img src="images/products/'.$obj->product_img_name.'" alt="Norway" style="width:100%;">';
                    echo '<div class="w3-container">';
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
                  echo '</div>';
                echo '</div>';
              echo '</div>';

              $i++;
            }

          }

          $_SESSION['product_id'] = $product_id;
          ?>
      </div>



<div class="row" style="margin-top:30px;">
      <div class="small-12" style="font-color:red; border-radius: 90px;">
        <p><h4><center> Whiskey</center></h4></p>
      </div>
    </div> 

    <div class="row" style="margin-top:10px;">
        <?php
          $i=0;
          $product_id = array();
          $product_quantity = array();

          $result = $connect->query('SELECT * FROM products where product_code="Whiskey"');
          if($result === FALSE){
            die(mysql_error());
          }

          if($result){

            while($obj = $result->fetch_object()) {

              // echo '<div class="large-4 columns">';
              // echo '<p><h3>'.$obj->product_name.'</h3></p>';
              // echo '<img src="images/products/'.$obj->product_img_name.'"/>';
              // echo '<p><strong>Product Code</strong>: '.$obj->product_code.'</p>';
              // echo '<p><strong>Description</strong>: '.$obj->product_desc.'</p>';
              // echo '<p><strong>Units Available</strong>: '.$obj->qty.'</p>';
              // echo '<p><strong>Price (Per Unit)</strong>: '.$currency.$obj->price.'</p>';



              // if($obj->qty > 0){
              //   echo '<p><a href="update-cart.php?action=add&id='.$obj->id.'"><input type="submit" value="Add To Cart" style="clear:both; background: #0078A0; border: none; color: #fff; font-size: 1em; padding: 10px;" /></a></p>';
              // }
              // else {
              //   echo 'Out Of Stock!';
              // }
              // echo '</div>';

              // $i++;

              echo '<div class="small-3 large-4 columns">';
                echo '<div class="w3-container">';
                  echo '<div class="w3-card-4" style="width:100%">';
                    echo '<h2>'. $obj->product_name .'</h2>';
                    echo '<img src="images/products/'.$obj->product_img_name.'" alt="Norway" style="width:100%;">';
                    echo '<div class="w3-container">';
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
                  echo '</div>';
                echo '</div>';
              echo '</div>';

              $i++;
            }

          }

          $_SESSION['product_id'] = $product_id;
          ?>
      </div>



<div class="row" style="margin-top:30px;">
      <div class="small-12" style="font-color:red; border-radius: 90px;">
        <p><h4><center> Vodka</center></h4></p>
      </div>
    </div> 

    <div class="row" style="margin-top:10px;">
        <?php
          $i=0;
          $product_id = array();
          $product_quantity = array();

          $result = $connect->query('SELECT * FROM products where product_code="Vodka"');
          if($result === FALSE){
            die(mysql_error());
          }

          if($result){

            while($obj = $result->fetch_object()) {

              // echo '<div class="large-4 columns">';
              // echo '<p><h3>'.$obj->product_name.'</h3></p>';
              // echo '<img src="images/products/'.$obj->product_img_name.'"/>';
              // echo '<p><strong>Product Code</strong>: '.$obj->product_code.'</p>';
              // echo '<p><strong>Description</strong>: '.$obj->product_desc.'</p>';
              // echo '<p><strong>Units Available</strong>: '.$obj->qty.'</p>';
              // echo '<p><strong>Price (Per Unit)</strong>: '.$currency.$obj->price.'</p>';



              // if($obj->qty > 0){
              //   echo '<p><a href="update-cart.php?action=add&id='.$obj->id.'"><input type="submit" value="Add To Cart" style="clear:both; background: #0078A0; border: none; color: #fff; font-size: 1em; padding: 10px;" /></a></p>';
              // }
              // else {
              //   echo 'Out Of Stock!';
              // }
              // echo '</div>';

              // $i++;

              echo '<div class="small-3 large-4 columns">';
                echo '<div class="w3-container">';
                  echo '<div class="w3-card-4" style="width:100%">';
                    echo '<h2>'. $obj->product_name .'</h2>';
                    echo '<img src="images/products/'.$obj->product_img_name.'" alt="Norway" style="width:100%;">';
                    echo '<div class="w3-container">';
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
                  echo '</div>';
                echo '</div>';
              echo '</div>';

              $i++;
            }

          }

          $_SESSION['product_id'] = $product_id;
          ?>
      </div>








<div class="row" style="margin-top:30px;">
      <div class="small-12" style="font-color:red; border-radius: 90px;">
        <p><h4><center> Rum</center></h4></p>
      </div>
    </div> 

    <div class="row" style="margin-top:10px;">
        <?php
          $i=0;
          $product_id = array();
          $product_quantity = array();

          $result = $connect->query('SELECT * FROM products where product_code="Rum"');
          if($result === FALSE){
            die(mysql_error());
          }

          if($result){

            while($obj = $result->fetch_object()) {

              // echo '<div class="large-4 columns">';
              // echo '<p><h3>'.$obj->product_name.'</h3></p>';
              // echo '<img src="images/products/'.$obj->product_img_name.'"/>';
              // echo '<p><strong>Product Code</strong>: '.$obj->product_code.'</p>';
              // echo '<p><strong>Description</strong>: '.$obj->product_desc.'</p>';
              // echo '<p><strong>Units Available</strong>: '.$obj->qty.'</p>';
              // echo '<p><strong>Price (Per Unit)</strong>: '.$currency.$obj->price.'</p>';



              // if($obj->qty > 0){
              //   echo '<p><a href="update-cart.php?action=add&id='.$obj->id.'"><input type="submit" value="Add To Cart" style="clear:both; background: #0078A0; border: none; color: #fff; font-size: 1em; padding: 10px;" /></a></p>';
              // }
              // else {
              //   echo 'Out Of Stock!';
              // }
              // echo '</div>';

              // $i++;

              echo '<div class="small-3 large-4 columns">';
                echo '<div class="w3-container">';
                  echo '<div class="w3-card-4" style="width:100%">';
                    echo '<h2>'. $obj->product_name .'</h2>';
                    echo '<img src="images/products/'.$obj->product_img_name.'" alt="Norway" style="width:100%;">';
                    echo '<div class="w3-container">';
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
                  echo '</div>';
                echo '</div>';
              echo '</div>';

              $i++;
            }

          }

          $_SESSION['product_id'] = $product_id;
          ?>
      </div>



<div class="row" style="margin-top:30px;">
      <div class="small-12" style="font-color:red; border-radius: 90px;">
        <p><h4><center> Beer</center></h4></p>
      </div>
    </div> 

    <div class="row" style="margin-top:10px;">
        <?php
          $i=0;
          $product_id = array();
          $product_quantity = array();

          $result = $connect->query('SELECT * FROM products where product_code="Beer"');
          if($result === FALSE){
            die(mysql_error());
          }

          if($result){

            while($obj = $result->fetch_object()) {

              // echo '<div class="large-4 columns">';
              // echo '<p><h3>'.$obj->product_name.'</h3></p>';
              // echo '<img src="images/products/'.$obj->product_img_name.'"/>';
              // echo '<p><strong>Product Code</strong>: '.$obj->product_code.'</p>';
              // echo '<p><strong>Description</strong>: '.$obj->product_desc.'</p>';
              // echo '<p><strong>Units Available</strong>: '.$obj->qty.'</p>';
              // echo '<p><strong>Price (Per Unit)</strong>: '.$currency.$obj->price.'</p>';



              // if($obj->qty > 0){
              //   echo '<p><a href="update-cart.php?action=add&id='.$obj->id.'"><input type="submit" value="Add To Cart" style="clear:both; background: #0078A0; border: none; color: #fff; font-size: 1em; padding: 10px;" /></a></p>';
              // }
              // else {
              //   echo 'Out Of Stock!';
              // }
              // echo '</div>';

              // $i++;

              echo '<div class="small-3 large-4 columns">';
                echo '<div class="w3-container">';
                  echo '<div class="w3-card-4" style="width:100%">';
                    echo '<h2>'. $obj->product_name .'</h2>';
                    echo '<img src="images/products/'.$obj->product_img_name.'" alt="Norway" style="width:100%;">';
                    echo '<div class="w3-container">';
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
                  echo '</div>';
                echo '</div>';
              echo '</div>';

              $i++;
            }

          }

          $_SESSION['product_id'] = $product_id;
          ?>
      </div>






<div class="row" style="margin-top:30px;">
      <div class="small-12" style="font-color:red; border-radius: 90px;">
        <p><h4><center> Tobacco</center></h4></p>
      </div>
    </div> 

    <div class="row" style="margin-top:10px;">
        <?php
          $i=0;
          $product_id = array();
          $product_quantity = array();

          $result = $connect->query('SELECT * FROM products where product_code="Tobacco"');
          if($result === FALSE){
            die(mysql_error());
          }

          if($result){

            while($obj = $result->fetch_object()) {

              // echo '<div class="large-4 columns">';
              // echo '<p><h3>'.$obj->product_name.'</h3></p>';
              // echo '<img src="images/products/'.$obj->product_img_name.'"/>';
              // echo '<p><strong>Product Code</strong>: '.$obj->product_code.'</p>';
              // echo '<p><strong>Description</strong>: '.$obj->product_desc.'</p>';
              // echo '<p><strong>Units Available</strong>: '.$obj->qty.'</p>';
              // echo '<p><strong>Price (Per Unit)</strong>: '.$currency.$obj->price.'</p>';



              // if($obj->qty > 0){
              //   echo '<p><a href="update-cart.php?action=add&id='.$obj->id.'"><input type="submit" value="Add To Cart" style="clear:both; background: #0078A0; border: none; color: #fff; font-size: 1em; padding: 10px;" /></a></p>';
              // }
              // else {
              //   echo 'Out Of Stock!';
              // }
              // echo '</div>';

              // $i++;

              echo '<div class="small-3 large-4 columns">';
                echo '<div class="w3-container">';
                  echo '<div class="w3-card-4" style="width:100%">';
                    echo '<h2>'. $obj->product_name .'</h2>';
                    echo '<img src="images/products/'.$obj->product_img_name.'" alt="Norway" style="width:100%;">';
                    echo '<div class="w3-container">';
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
                  echo '</div>';
                echo '</div>';
              echo '</div>';

              $i++;
            }

          }

          $_SESSION['product_id'] = $product_id;
          ?>
      </div>







<hr>
    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
    <?php include 'footer.php';?>
  </body>
</html>
