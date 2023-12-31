<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./stilovi/login.css">
  <link rel="icon" href="./pictures/favicon-logo.ico">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Kdam+Thmor+Pro:wght@400&amp;display=swap" data-tag="font" />
  <script src="https://kit.fontawesome.com/a620d9a1da.js" crossorigin="anonymous"></script>
  <title>Sign in</title>
</head>

<body>
  <?php
  include_once 'header.php'
  ?>
  <div id="bg">

    <div id="login-window">

      <div id="sign-register">
        <a id="desni-sign" href="./login.php">
          <div>Sign in</div>
        </a>
        <a id="lijevi-sign" href="./signup.php">
          <div>Register</div>
        </a>
      </div>
      <div id="input-blok">
        <form id="formapon" action="./includes/login.inc.php" method="post">
          <input type="text" name="uid" placeholder="Username/Email" class="inputi">
          <input type="password" name="pwd" placeholder="Password" class="inputi">
          <button type="submit" name="submit" id="login-dugme">Login</button>
        </form>
      </div>
    </div>
    <?php
        if (isset($_GET["error"])) {
          switch ($_GET["error"]) {
            case "emptyinput":
              echo "<p>Popunite sva polja!</p>";
              break;
            case "wronglogin":
              echo "<p>Pogresni login podaci!</p>";
              break;
            default:
              echo "<p>Popunite sva polja!</p>";
          }
        }
    ?>
  </div>
  <?php
  include_once 'footer.php'
  ?>

</body>

</html>