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
        
        <p><h4>Beverage Details</h4></p>

        <p>Below are beverage details in the database. If you wish to change anything, then just enter new data in text box and click on update.</p>
      </div>
    </div>

   
<?php 
  	$id = $_GET['id'];  
   	$select="select * from products where id='$id'";
   	$result= $connect->query($select);
    $data = $result->fetch_assoc();


  if(isset($_POST['btnUpdateItem']))
  {
  $name=$_POST['name'];
  $type=$_POST['type'];
  $desc=$_POST['desc'];
  $qty= $_POST['quantity'];
  $price=$_POST['price'];

  $update = "UPDATE products SET product_name='$name', product_code='$type', product_desc='$desc', qty='$qty', price='$price' WHERE id=$id";
  // echo $update;
  $connect->query($update);

  header("location:pdetail.php");
  }
?>


    <hr>
      <div>
          <form method='POST'  name="form" enctype="multipart/form-data">
            <fieldset style="background-color: #FFE4B5;
            margin-left: 200px;
            margin-right: 200px;
            /*margin-left: 300px;
            padding: 5px 10px 10px 20px*/
            ">
              <legend id="fomhead1">Update Item</legend>
              
              <p class="l">
              <label>Product Name</label>
              <input type="text" name="name" placeholder="Enter Name" required autofocus="autofocus" value="<?php echo $data['product_name']; ?>" /></p>
              
              <p class="l">
              <label>Product Type</label>
              <select name="type" required autofocus="autofocus">
              		<option>Choose One</option>
                  	<option>Beer</option>
                  	<option>Rum</option>
                  	<option>Tobacco</option>
                  	<option>Vodka</option>
                  	<option>Whiskey</option>
                  	<option>Wine</option>
              </select>

              <p class="l">
              <label>Product Desc</label>
              <input type="text" name="desc" placeholder="Enter Desc" value="<?php echo $data['product_desc']; ?>" required></p>
              
              <p class="l">     
              <label>Product Quantity</label>
              <input type="text" name="quantity" placeholder="Enter Quantity" value="<?php echo $data['qty']; ?>" required /></p>

              <p class="l">     
              <label>Product Price</label>
              <input type="float" name="price" placeholder="Enter Price" value="<?php echo $data['price']; ?>" required></p><br>

              <button type="submit" name="btnUpdateItem" style=" border-color: green;  margin-left: 180px;" >Update Item</button>

              <button type="reset" style=" border-color: green;  margin-left: 100px;">Reset</button>


              
            </fieldset>
          
          </form>
      </div>

      </div>
    </div>


    

      </div>
    </div>

 

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