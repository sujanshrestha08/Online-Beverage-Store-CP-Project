<?php
if(session_id() == '' || !isset($_SESSION)){session_start();}

if(!isset($_SESSION["username"])) {
  header("location:index.php");
}

if($_SESSION["type"]!="admin") {
  header("location:index.php");
}

include 'config.php';
?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Online Beverage Store</title>
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
            echo '<li class="active"><a href="register.php">Register</a></li>';
          }
          ?>
        </ul>
      </section>
    </nav>

<h3><center>Admin Page!</center></h3>

<div class="dropdown">
  <button class="dropbtn">Beverage Items</button>
  <div class="dropdown-content">
    <a href="admin.php">Add Items</a>
    <a href="pdetail.php">Update/Delete Items</a>
    
  </div>
</div>

<div class="dropdown" margin-left="20px">
  <button class="dropbtn">User Accounts</button>
  <div class="dropdown-content">
    <a href="addadmin.php">Add Admin</a>
    <a href="viewadmin.php">Update Own details</a>
    <a href="cdetail.php">View and Delete Users</a>
  </div>
</div>

    <form method="POST" action="admininsert.php" style="margin-top:30px;">
      <div class="row">
        <div class="small-8">

          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline" required autofocus="autofocus">First Name</label>
            </div>
            <div class="small-8 columns">
              <input type="text" id="right-label"  name="fname">
            </div>
          </div>
          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline" required autofocus="autofocus">Last Name</label>
            </div>
            <div class="small-8 columns">
              <input type="text" id="right-label"  name="lname">
            </div>
          </div>
          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline" required autofocus="autofocus">Address</label>
            </div>
            <div class="small-8 columns">
              <input type="text" id="right-label"  name="address">
            </div>
          </div>
          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline" required autofocus="autofocus">City</label>
            </div>
            <div class="small-8 columns">
              <input type="text" id="right-label"  name="city">
            </div>
          </div>
          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline" required autofocus="autofocus">Phone No.</label>
            </div>
            <div class="small-8 columns">
              <input type="number" id="right-label"  name="pin">
            </div>
          </div>
          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline" required autofocus="autofocus">E-Mail</label>
            </div>
            <div class="small-8 columns">
              <input type="email" id="right-label"  name="email">
            </div>
          </div>
          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline" required autofocus="autofocus">Password</label>
            </div>
            <div class="small-8 columns">
              <input type="password" id="right-label" name="pwd">
            </div>
          </div>
      
              <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline" required autofocus="autofocus">User Type</label>
            </div>
              <div class="small-8 columns">
              <select type="text" id="right-label" name="usert">
                  <option>admin</option>
                  <option>user</option>
              </select>
            </div>
          </div>

          <div class="row">
            <div class="small-4 columns">
            </div>
            <div class="small-8 columns">
              <input type="submit" id="right-label" value="Register" style="background: #0078A0; border: none; color: #fff; font-family: 'Helvetica Neue', sans-serif; font-size: 1em; padding: 10px;">
              <input type="reset" id="right-label" value="Reset" style="background: #0078A0; border: none; color: #fff; font-family: 'Helvetica Neue', sans-serif; font-size: 1em; padding: 10px;">
            </div>
          </div>
        </div>
      </div>
    </form>


    <div class="row" style="margin-top:10px;">
      <div class="small-12">

        

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
