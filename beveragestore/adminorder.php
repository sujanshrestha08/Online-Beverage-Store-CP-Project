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

<h3><center>Customer Order Page!</center></h3>


    <div class="row" style="margin-top:30px;">
      <div class="small-12">
        <p><h4>Order Details</h4></p>

        <p>Below are user order details.</p>
      </div>
    </div>



<?php
  include "config.php";
  
  $sql = "select * from orders";
  
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
      <th>Product Code</th>
      <th>Product Name</th>
      <th>Description</th>
      <th>Price</th>
      <th>Units</th>
      <th>Total</th>
      <th>Date</th>
      <th>Users Email</th>
      <th>Options</th>
    </tr>
  
  <?php
  if($result){
    
    while ($row = mysqli_fetch_assoc($result)) {
      ?>
        <tr>
          <td><?php echo $row['product_code']?></td>
          <td><?php echo $row['product_name']?></td> 
          <td><?php echo $row['product_desc']?></td> 
          <td><?php echo $row['price']?></td>
          <td><?php echo $row['units']?></td> 
          <td><?php echo $row['total']?></td>
          <td><?php echo $row['date']?></td> 
          <td><?php echo $row['email']?></td>  
      
          <?php
                    echo "<td><a href=\"odelete.php?id=".$row['id']."\">Delete</a></td>"; 
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
