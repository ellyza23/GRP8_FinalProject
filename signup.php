<?php

require 'conn.php';

if(!empty($_SESSION["id"])){

  header("Location: index.php");

}

if(isset($_POST["submit"])){

  $username = $_POST["username"];

  $email = $_POST["email"];

  $password = $_POST["password"];

  $confirmpassword = $_POST["confirmpassword"];

  $duplicate = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' OR email = '$email'");

  if(mysqli_num_rows($duplicate) > 0){

    echo

    "<script> alert('Username or Email Has Already Taken'); </script>";

  }

  else{

    if($password == $confirmpassword){

      $query = "INSERT INTO users VALUES('','$username','$email','$password')";

      mysqli_query($conn, $query);

      echo

      "<script> alert('Registration Successful'); </script>";

    }

    else{

      echo

      "<script> alert('Password Does Not Match'); </script>";

    }

  }

}

?>

<!DOCTYPE html>

<html lang="en">

<head>

  <meta charset="UTF-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="login.css">

  <title>Signup</title>

</head>

<body style="background-image: url('image/Beezzz.webp');">

  <form class="box-form reg" action="" method="post" autocomplete="off">

    <img src="img/Ac-logo.png" alt="" class="logo">

    <h3>Signup</h3>

    <input type="text" name="username" id = "username" placeholder="Name"> <br>

    <input type="email" name="email" id = "email" placeholder="Email"> <br>

    <input type="password" name="password" id = "password"  placeholder="Password"> <br>

    <input type="password" name="confirmpassword" id = "confirmpassword"  placeholder="Confirm Password"> <br>

    <button type="submit" name="submit" class="btn">Signup</button>

    <a href="login.php" class="btn">login</a>

  </form>

</body>

</html>
