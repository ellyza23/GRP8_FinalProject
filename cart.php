<?php

@include 'conn.php';


if(isset($_POST['update_update_btn'])){

   $update_value = $_POST['update_quantity'];

   $update_id = $_POST['update_quantity_id'];

   $update_quantity_query = mysqli_query($conn, "UPDATE `cart` SET quantity = '$update_value' WHERE id = '$update_id'");

   if($update_quantity_query){

      header('location:cart.php');

   };

};


if(isset($_GET['remove'])){

   $remove_id = $_GET['remove'];

   mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$remove_id'");

   header('location:cart.php');

};


if(isset($_GET['delete_all'])){

   mysqli_query($conn, "DELETE FROM `cart`");

   header('location:cart.php');

}

?>


<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

    <link rel="stylesheet" href="header.css">

    <link rel="stylesheet" href="cart.css">

    <link rel="stylesheet" href="profile.css">

    <script src="profile.js"></script>

    <title>Beez-shop</title>

</head>

<body style="background-image: url('image/bees_920355-35.avif'); background-size: cover; background-repeat: no-repeat; background-position: center; background-attachment: fixed; color: white;">

<ul class="nav">

        <li class="logo"><img src="image/Beezzz-shop.png" alt="logo"></li>

        <li><a onclick="on()"><span class="material-symbols-outlined"> face </span></a></li>

        <li><a href="about.php"><span class="material-symbols-outlined"> info </span></a></li> 

        <li><a href="cart.php"><span class="material-symbols-outlined"> shopping_cart </span></a></li>

        <li><a href="menu.php"><span class="material-symbols-outlined"> menu_book </span></a></li>

        <li><a href="home.php"><span class="material-symbols-outlined"> home </span></a></li>

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


<section class="shopping-cart">

   

    <h1 class="heading">Order</h1>

 

    <table>

 

       <thead>

          <th>Product Name</th>

          <th>Price</th>

          <th>Quantity</th>

          <th>Action</th>

       </thead>

 

       <tbody>

 

          <?php

          $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$id'");

          if(mysqli_num_rows($select_cart) > 0){

             while($fetch_cart = mysqli_fetch_assoc($select_cart)){

          ?>

 

          <tr>

            <td><?php echo $fetch_cart['product_name']; ?></td>

            <td>$<?php echo number_format($fetch_cart['price'], 2); ?>/-</td>

            <td>

                <form action="" method="POST">

                    <input type="number" name="update_quantity" value="<?php echo $fetch_cart['quantity']; ?>" min="1" />

                    <input type="hidden" name="update_quantity_id" value="<?php echo $fetch_cart['id']; ?>" />

                    <button type="submit" name="update_update_btn">Update</button>

                </form>

            </td>

            <td>

                <a href="cart.php?remove=<?php echo $fetch_cart['id']; ?>" class="btn-delete">Delete</a>

            </td>

          </tr>

          <?php

             };

          };

          ?>

         

          <tr class="table-bottom">

            <td><a href="menu.php" class="option-btn" style="margin-top: 0;">Continue shopping</a></td>

          </tr>


       </tbody>

 

    </table>

 

    <div class="checkout-btn">

       <a href="checkout.php" class="btn">Proceed to checkout</a>

    </div>

 

 </section>

    </div>

</body>

</html>
