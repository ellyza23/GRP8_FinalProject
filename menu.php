<?php

@include 'conn.php';


if(isset($_POST['add'])){


   $product_name = $_POST['product_name'];

   $product_price = $_POST['product_price'];


   // Assuming that you want to check by product_name and user_id

   // and the cart table includes the user_id column.

   $user_id = $_SESSION['id']; // assuming user id is stored in session


   // Check if the product is already in the cart for the current user

   $select_cart = mysqli_query($conn, "SELECT * FROM cart WHERE product_name = '$product_name' AND user_id = '$user_id'");


   if(mysqli_num_rows($select_cart) > 0){

      $message[] = 'Product already added to cart';

   } else {

      // Insert the product into the cart table

      $insert_product = mysqli_query($conn, "INSERT INTO cart (user_id, product_name, price, quantity) VALUES ('$user_id', '$product_name', '$product_price', 1)");

      $message[] = 'Product added to cart successfully';

   }


}


?>


<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

    <link rel="stylesheet" href="styles.css">

    <link rel="stylesheet" href="header.css">

    <link rel="stylesheet" href="menu.css">

    <link rel="stylesheet" href="profile.css">

    <script src="profile.js"></script>

    <title>Menu</title>

</head>

<body style="background-image: url('image/bees_920355-35.avif'); background-size: cover; background-repeat: no-repeat; background-position: center; background-attachment: fixed; color: white;">

<ul class="nav">

        <li class="logo"><img src="image/Beezzz-shop.png"></li>

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


    <div class="container-fluid">

        <div class="container">   

            <div class="product-list">

                <div class="product">

                    <form method="post">

                        <img src="img/Almond cookies.jfif" style="width: 150px;">

                        <input type="hidden" name="product_name" value="Almond cookies">

                        <input type="hidden" name="product_price" value="1.3">

                        <h3>Almond Cookies</h3>

                        <h4>$3<button type="submit" class="btn-add" name="add"><span class="material-symbols-outlined">

                            shopping_cart

                            </span></button></h4>

                    </form>

                </div>


                <div class="product">

                    <form action="" method="post">

                        <img src="img/Oatmeal cookies.jfif" style="width: 150px">

                        <input type="hidden" name="product_name" value="Oatmeal cookies">

                        <input type="hidden" name="product_price" value="1.3">

                        <h3>Oatmeal cookies</h3>

                        <h4>$2<button type="submit" class="btn-add" name="add"><span class="material-symbols-outlined">

                            shopping_cart

                            </span></button></h4>

                    </form>

                </div>


                <div class="product">

                    <form action="" method="post">

                        <img src="img/Snickers doodle (2).jfif" style="width: 150px">

                        <input type="hidden" name="product_name" value="sniker doodles cookies">

                        <input type="hidden" name="product_price" value="1.1">

                        <h3>snicker doodles cookies</h3>

                        <h4>$2.5<button type="submit" class="btn-add" name="add"><span class="material-symbols-outlined">

                            shopping_cart

                            </span></button></h4>

                    </form>

                </div>


                <div class="product">

                    <form action="" method="post">

                        <img src="img/Cinnamon bread.jfif"  style="width: 150px">

                    <input type="hidden" name="product_name" value="Cinnamon Bread">

                    <input type="hidden" name="product_price" value="2.1">

                    <h3>Cinnamon Bread</h3>

                    <h4>$3<button type="submit" class="btn-add" name="add"><span class="material-symbols-outlined">

                        shopping_cart

                        </span></button></h4>

                    </form>

                </div>

                <div class="product">

                    <form action="" method="post">

                        <img src="img/Citrus Honey Focaccia Bread.jfif" style="width: 150px">

                    <input type="hidden" name="product_name" value=" Focaccia Bread">

                    <input type="hidden" name="product_price" value="2.4">

                    <h3>Focaccia Bread</h3>

                    <h4>$2.7<button type="submit" class="btn-add" name="add"><span class="material-symbols-outlined">

                        shopping_cart

                        </span></button></h4>

                    </form>

                </div>

                <div class="product">

                    <form action="" method="post">

                        <img src="img/Honey Oat Bread.jfif" style="width: 150px">

                    <input type="hidden" name="product_name" value="Honey Oat Bread ">

                    <input type="hidden" name="product_price" value="2.1">

                    <h3>Honey Oat Bread</h3>

                    <h4>$3.4<button type="submit" class="btn-add" name="add"><span class="material-symbols-outlined">

                        shopping_cart

                        </span></button></h4>

                    </form>

                </div>

                <div class="product">

                    <form action="" method="post">

                        <img src="img/Blue Berry Cheesecake.jfif" style="width: 150px">

                    <input type="hidden" name="product_name" value="Blue Berry Cheesecake">

                    <input type="hidden" name="product_price" value="2.5">

                    <h3>Blue Berry Cheesecake</h3>

                    <h4>$3.5<button type="submit" class="btn-add" name="add"><span class="material-symbols-outlined">

                        shopping_cart

                        </span></button></h4>

                    </form>

                </div>

                <div class="product">

                    <form action="" method="post">

                    <img src="img/Red Velvet.jfif" style="width: 150px">

                    <input type="hidden" name="product_name" value="Red Velvet">

                    <input type="hidden" name="product_price" value="3">

                    <h3>Red Velvet</h3>

                    <h4>$2.2<button type="submit" class="btn-add" name="add"><span class="material-symbols-outlined">

                        shopping_cart

                        </span></button></h4>

                    </form>

                </div>

                <div class="product">

                    <form action="" method="post">

                    <img src="img/black honey.jfif" style="width: 150px">

                        <input type="hidden" name="product_name" value="black Honey">

                        <input type="hidden" name="product_price" value="2.1">

                        <h3>Black honey </h3>

                        <h4>$2<button type="submit" class="btn-add" name="add"><span class="material-symbols-outlined">

                        shopping_cart

                        </span></button></h4>

                    </form>

                </div>

                <div class="product">

                    <form action="" method="post">

                    <img src="img/honey latte.jfif" style="width: 150px">

                        <input type="hidden" name="product_name" value="Honey Latte">

                        <input type="hidden" name="product_price" value="2.1">

                        <h3>Honey Latte</h3>

                        <h4>$2<button type="submit" class="btn-add" name="add"><span class="material-symbols-outlined">

                        shopping_cart

                        </span></button></h4>

                    </form>

                </div>

                <div class="product">

                    <form action="" method="post">

                    <img src="img/honey latte cinnamon.jfif." style="width: 150px">

                        <input type="hidden" name="product_name" value="Honey Cinnamon Coffee">

                        <input type="hidden" name="product_price" value="2.2">

                        <h3>Honey Cinnamon Coffee</h3>

                        <h4>$2<button type="submit" class="btn-add" name="add"><span class="material-symbols-outlined">

                        shopping_cart

                        </span></button></h4>

                    </form>

                </div>

                <div class="product">

                    <form action="" method="post">

                    <img src="img/honey almond latte.jfif" style="width: 150px">

                        <input type="hidden" name="product_name" value="Honey Almond Latte">

                        <input type="hidden" name="product_price" value="2.2">

                        <h3>Honey Almond Latte</h3>

                        <h4>$2<button type="submit" class="btn-add" name="add"><span class="material-symbols-outlined">

                        shopping_cart

                        </span></button></h4>

                    </form>

                </div>

                <div class="product">

                    <form action="" method="post">

                    <img src="img/Classic honey tea.jfif" style="width: 150px">

                        <input type="hidden" name="product_name" value="Classic Honey Tea">

                        <input type="hidden" name="product_price" value="1.8">

                        <h3>Classic Honey Tea</h3>

                        <h4>$2<button type="submit" class="btn-add" name="add"><span class="material-symbols-outlined">

                        shopping_cart

                        </span></button></h4>

                    </form>

                </div>

                <div class="product">

                    <form action="" method="post">

                    <img src="img/honey lemon.jfif" style="width: 150px">

                        <input type="hidden" name="product_name" value="Honey Lemon Tea">

                        <input type="hidden" name="product_price" value="1.9">

                        <h3>Honey Lemon Tea</h3>

                        <h4>$2<button type="submit" class="btn-add" name="add"><span class="material-symbols-outlined">

                        shopping_cart

                        </span></button></h4>

                    </form>

                </div>

                <div class="product">

                    <form action="" method="post">

                    <img src="img/Cucumber honey lemon.jfif" style="width: 150px">

                        <input type="hidden" name="product_name" value="Cucumber Honey Lemon">

                        <input type="hidden" name="product_price" value="2">

                        <h3>Cucumber Honey Lemon</h3>

                        <h4>$2<button type="submit" class="btn-add" name="add"><span class="material-symbols-outlined">

                        shopping_cart

                        </span></button></h4>

                    </form>

                </div>

                <div class="product">

                    <form action="" method="post">

                    <img src="img/Smoothy with honey.jfif" style="width: 150px">

                        <input type="hidden" name="product_name" value="Smoothie w/honey">

                        <input type="hidden" name="product_price" value="2">

                        <h3>Smoothie w/honey</h3>

                        <h4>$2<button type="submit" class="btn-add" name="add"><span class="material-symbols-outlined">

                        shopping_cart

                        </span></button></h4>

                    </form>

                </div>

                <div class="product">

                    <form action="" method="post">

                    <img src="img/Ice honey coffee.jfif" style="width: 150px">

                        <input type="hidden" name="product_name" value="Ice honey Coffee">

                        <input type="hidden" name="product_price" value="1.9">

                        <h3>Ice honey Coffee</h3>

                        <h4>$2<button type="submit" class="btn-add" name="add"><span class="material-symbols-outlined">

                        shopping_cart

                        </span></button></h4>

                    </form>

                </div>

            </div>

            <!-- View Cart Button -->

<div class="view-cart-btn" style="text-align: center; margin-top: 20px;">

    <a href="cart.php" class="btn-view-cart"

       style="background-color: #28a745; color: white; padding: 22px 24px; font-size: 26px; border-radius: 8px; text-decoration: none; display: inline-block; transition: background-color 0.3s ease, transform 0.3s ease;">

        Go to Cart

    </a>

</div>

        </div>

    </div>

</body>

</html>
