<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./stilovi/signup.css">
  <link rel="icon" href="./pictures/favicon-logo.ico">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Kdam+Thmor+Pro:wght@400&amp;display=swap"data-tag="font" />
  <script src="https://kit.fontawesome.com/a620d9a1da.js" crossorigin="anonymous"></script>
  <title>Register</title>
</head>

<body>
<?php
  include_once 'header.php'
  ?>

  <div id="bg">
      

      
      <div id="login-window">
        
        <div id="sign-register">
          <a id="desni-sign" href="./login.php"><div >Sign in</div></a>
          <a id="lijevi-sign" href="./signup.php"><div>Register</div></a>
        </div>
        <div id="input-blok">
          <form id="formapon" action="./includes/signup.inc.php" method="post">
            <input type="text" name="uid" placeholder="Username" class="inputi">
            <input type="text" name="email" placeholder="Email" class="inputi">
            <input type="password" name="pwd" placeholder="Password" class="inputi">
            <input type="password" name="pwdrepeat" placeholder="Repeat password" class="inputi">
            <button type="submit" name="submit" id="login-dugme">Register</button>
          </form>
          
        </div>
      </div>
      <?php
  if(isset($_GET["error"])){
    if($_GET["error"]=="emptyinput"){
      echo "<p>Popunite sva polja!</p>";
    }
    else if($_GET["error"]=="invaliduid"){
      echo " <p>Upisite ispravan username!</p>";
  }
  else if($_GET["error"]=="invalidemail"){
    echo " <p>Upisite ispravan email!</p>";
  }
  else if($_GET["error"]=="passwordsdontmatch"){
    echo " <p>Sifre se ne podudaraju!</p>"; 
  }
  else if($_GET["error"]=="usernametaken"){
      echo " <p>Izaberite drugi username!</p>";
  }
  else if($_GET["error"]=="none"){
  echo " <p>Registrovali ste se!</p>";
  }
}
  ?>
</div>
  

  <?php
  include_once 'footer.php'
  ?>

</body>
</html>

