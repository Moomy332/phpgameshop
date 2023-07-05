<?php
session_start();
?>

<div id="header">
    <div id="logo">
      <a href="./index.php"><img src="pictures/logo.png" alt=""></a>
    </div>
    <div id="nav-bar">
      <h1><a class="nav-content" id="home-boja" href="./index.php">Home</a></h1>
      <h1><a class="nav-content" id="community-boja" href="./community.php">Community</a></h1>
      <h1><a class="nav-content" id="browse-boja" href="./browse.php">Browse</a></h1>
    </div>
    <?php
      if(isset($_SESSION["useruid"])){
        echo "<button id='login-but'><a href='./cart.php'><i class='fas fa-shopping-cart'></i> <span id='cart-item'>1</span></a></button>";
        echo "<button id='register-but'><a href='./includes/logout.inc.php'>Logout</a></button>";
      }
      else{
          echo "<button id='login-but'><a href='./login.php'>Login</a></button>";
          echo "<button id='register-but'><a href='./signup.php'>Register</a></button>";
      }
    ?>
    
</div>