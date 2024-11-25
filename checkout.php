<?php


@include 'conn.php';


if(isset($_POST['order_btn'])){


   $name = $_POST['name'];

   $number = $_POST['number'];

   $email = $_POST['email'];

   $method = $_POST['method'];

   $street = $_POST['street'];

   $pin_code = $_POST['pin_code'];


   $detail_query = mysqli_query($conn, "INSERT INTO `order`(name, number, email, method, street, pin_code) VALUES('$name','$number','$email','$method','$street','$pin_code')");

   header("location: home.php");

}


?>


<!DOCTYPE html>

<html lang="en">

<head>

   <meta charset="UTF-8">

   <meta http-equiv="X-UA-Compatible" content="IE=edge">

   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <title>checkout</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

   <link rel="stylesheet" href="checkout.css">

   <link rel="stylesheet" href="header.css">

   <link rel="stylesheet" href="profile.css">

   <script src="profile.js"></script>


</head>

<body style="background-image: url('image/bees_920355-35.avif'); background-size: cover; background-repeat: no-repeat; background-position: center; background-attachment: fixed; color: white;">

<ul class="nav">

      <li class="logo"><img src="image/Beezzz-shop.png" alt="logo"></li>

      <li><a  onclick="on()"><span class="material-symbols-outlined">

         face

         </span></a></li>

      <li><a href="about.php"><span class="material-symbols-outlined">

            info

            </span></a></li> 

      <li><a href="cart.php"><span class="material-symbols-outlined">

            shopping_cart

            </span></a></li>

      <li><a href="menu.php"><span class="material-symbols-outlined">

            menu_book

            </span></a></li>

      <li><a href="home.php"><span class="material-symbols-outlined">

            home

            </span></a></li>

   </ul>

   <?php

   if(!empty($_SESSION["id"])){

      $id = $_SESSION["id"];

      $result = mysqli_query($conn, "SELECT * FROM users WHERE id = $id");

      $row = mysqli_fetch_assoc($result);

   }

   ?>

   <div id="profile" onclick="off()">

      <p class="profile-name"><?php echo $row['username'] ?></p>

      <a href="logout.php">Logout</a>

   </div>

<div class="container">

<section class="checkout-form">

   <h1 class="heading">Payment</h1>

   <form action="" method="post">

      <div class="flex">

         <div class="inputBox">

            <span>Name</span>

            <input type="text" placeholder="enter your name" name="name" required>

         </div>

         <div class="inputBox">

            <span>Number</span>

            <input type="number" placeholder="enter your number" name="number" required>

         </div>

         <div class="inputBox">

            <span>Email</span>

            <input type="email" placeholder="enter your email" name="email" required>

         </div>

         <div class="inputBox">

            <span>payment method</span>

            <select name="method">

               <option value="credit cart">credit cart</option>

               <option value="paypal">paymaya</option>

               <option value="gcash">Gcash</option>

               <option value="cash on delivery">cash on delivery</option>

            </select>

         </div>

         <div class="inputBox">

            <span>address</span>

            <input type="text" placeholder="e.g. street name" name="street" required>

         </div>

         <div class="inputBox">

            <span>pin code</span>

            <input type="text" placeholder="e.g. 123456" name="pin_code" required>

         </div>

      </div>

      <input type="submit" value="order now" name="order_btn" class="btn">

   </form>

</section>

</div>

</body>

</html>
