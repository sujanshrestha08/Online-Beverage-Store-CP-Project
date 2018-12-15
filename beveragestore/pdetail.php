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
        <p><h4>Account Details</h4></p>
        

        <p>Below are Beverage details in the database.</p>
      </div>
    </div>


<?php
  include "config.php";
  
  $sql = "select * from products";
  
  $result = mysqli_query($connect,$sql);
  ?>

  
  <style>
table {
    border-spacing: :6px;
}
table#t01 {
    width: 95%;
    background-color: #f1f1c1; 
    margin-left: 30px;
      }

table#t01 th {
    background-color: black;
    color: white;
      }

table#t01 tr:nth-child(even) {
    background-color: #FFF8DC;
}

table#t01 tr:nth-child(odd) {
   background-color: #F0FFF0;
}

</style>

  <table border="1" cellspacing="0" id="t01">
    <tr>
      <th>Images</th>
      <th>Product Code</th>
      <th>Product Name</th>
      <th>Description</th>
      <th>Quantity</th>
      <th>Price</th>
      <th colspan="2">Options</th>
    </tr>
  
  <?php
  if($result){
    
    while ($row = mysqli_fetch_assoc($result)) {
      ?>
        <tr>
          <td><?php echo "<img src='images/products/".$row['product_img_name']."'>";?></td>
          <td><?php echo $row['product_code']?></td>
          <td><?php echo $row['product_name']?></td> 
          <td><?php echo $row['product_desc']?></td> 
          <td><?php echo $row['qty']?></td> 
          <td><?php echo $row['price']?></td>
          
      
          <?php
                    echo "<td><a href=\"pupdate.php?id=".$row['id']."\">Update</a></td>";

                    echo "<td><a href=\"pdelete.php?id=".$row['id']."\">Delete</a></td>"; 
                
                    ?>
          
      
        </tr>
      <?php
    }
    
  }else{
    echo "no data found";
  }
  ?>
  </table>


    <div class="row" style="margin-top:30px;">
      <div class="small-12">

        <footer>
           <p style="text-align:center; font-size:0.8em;">&copy; Online Beverage Store. All Rights Reserved.</p>
        </footer>

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
