<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href="about.css">
    <script src="profile.js"></script>
    <title>Beez-Shop</title>
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
require 'conn.php';


$row = null; // Initialize $row to avoid warnings


if (!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "SELECT * FROM users WHERE id = $id");


    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    }
}
?>
    <div id="profile" onclick="off()">
    <?php if ($row): ?>
        <p class="profile-name"><?php echo htmlspecialchars($row['username']); ?></p>
        <a href="logout.php">Logout</a>
    <?php else: ?>
        <p class="profile-name">Guest</p>
        <a href="Logout.php">Logout</a>
    <?php endif; ?>
</div>
    <h1 class="heading">About us</h1>
    <div class="about-us">
        <p>In our site, we believe in combining the natural goodness of honey with wholesome ingredients to create beverages and snacks that not only taste amazing but also support a healthy lifestyle. Whether you're in the mood for a refreshing honey-infused juice, a warm cup of honey tea, or a slice of freshly baked honey bread, we've got something to satisfy every craving.</p>
    </div>


    </div>
    <h2 class="heading">Tean Profile</h2>
    <div class="team-profile"></div>
    <div class="row">
   
        <div class="column">
            <div class="card">
                <img src="image/Ellyza.jfif" alt="Ellyza Galindo" style="width: 160px;">
                <h3>Ellyza Galindo</h3>
                <p>Programmer</p>
            </div>
        </div>
       
        <div class="column">
            <div class="card">
                <img src="image/Jeric.jfif" alt="Jeric Mendoza" style="width: 160px;">
                <h3>Jeric Mendoza</h3>
                <p>Programmer</p>
            </div>
        </div>


        <div class="column">
            <div class="card">
                <img src="image/sarahmel.jfif" alt="Sarahmel Ocado" style="width: 160px;">
                <h3>Sarahmel Ocado</h3>
                <p>Web Designer</p>
            </div>
        </div>
       
        <div class="column">
            <div class="card">
                <img src="image/rennalien.jfif"alt="" style="width: 160px;">
                <h3>Rennalien Oliva</h3>
                <p>Web Manager</p>
            </div>
        </div>
       
        <div class="column">
            <div class="card">
                <img src="image/McEphraem.jfif" alt="Mc Ephraem SAn Jose" style="width: 160px;">
                <h3>Mc Ephraem San Jose</h3>
                <p>Web Designer</p>
            </div>
        </div>


        <div class="column">
            <div class="card">
                <img src="image/Norielyn.jfif" alt="Norielyn Talavera" style="width: 160px;">
                <h3>Norielyn Talavera</h3>
                <p>Web Designer</p>
            </div>
        </div>
    </div>
</body>
</html>
