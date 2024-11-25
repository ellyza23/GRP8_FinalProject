<?php

require 'conn.php';

if(!empty($_SESSION["id"])){

  header("Location: home.php");

}

    if(isset($_POST["submit"])){

    $usernameemail = $_POST["usernameemail"];

    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$usernameemail' OR email = '$usernameemail'");

    $row = mysqli_fetch_assoc($result);

    if(mysqli_num_rows($result) > 0){

        if($password == $row['password']){

            $_SESSION["login"] = true;

            $_SESSION["id"] = $row["id"];

        header("Location: home.php");

    }

    else{

        echo

            "<script> alert('Wrong Password'); </script>";

        }

    }

    else{

        echo

            "<script> alert('User Not Registered'); </script>";

        }

    }

?>


<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="login.css"> <!-- Link to the CSS file -->

    <title>Login</title>

</head>

<body style="background-image: url('image/Beezzz.webp');">

    <form class="box-form" action="" method="post" autocomplete="off">

        <img src="img/Ac-logo.png" alt="" class="logo">

        <h3>Login</h3>

        <input type="text" name="usernameemail" id = "usernameemail" required value="" placeholder="Email"> <br>

        <input type="password" name="password" id = "password" required value="" placeholder="Password"> <br>

        <button type="submit" name="submit" class="btn">Login</button>

        <a href="signup.php" class="btn">signup</a>

    </form>

</body>

</html>
