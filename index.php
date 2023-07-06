<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="./pictures/favicon-logo.ico">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="./stilovi/index.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Kdam+Thmor+Pro:wght@400&amp;display=swap" data-tag="font" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://kit.fontawesome.com/a620d9a1da.js" crossorigin="anonymous"></script>
  <title>Home</title>
</head>

<body>
  <?php
  include_once 'header.php'
  ?>
  <style>
    #home-boja {
      color: rgb(209, 0, 0);
    }
    #home-boja:hover {
      color: #931621;
    }
  </style>
  <div id="bg">
    <div class="w3-content w3-section" style="max-width:1450px">
      <img class="mySlides w3-animate-left" src="./pictures/posteri/ac-unity.jpg" style="width: 100%;">
      <img class="mySlides w3-animate-left" src="./pictures/posteri/ac-valhala.jpg" style="width: 100%;">
      <img class="mySlides w3-animate-left" src="./pictures/posteri/cod-bo3.jpg" style="width: 100%;">
      <img class="mySlides w3-animate-left" src="./pictures/posteri/ff7.jpg" style="width: 100%;">
      <img class="mySlides w3-animate-left" src="./pictures/posteri/fifa.jpg" style="width: 100%;">
      <img class="mySlides w3-animate-left" src="./pictures/posteri/gow.jpg" style="width: 100%;">
      <img class="mySlides w3-animate-left" src="./pictures/posteri/metro.jpg" style="width: 100%;">
      <img class="mySlides w3-animate-left" src="./pictures/posteri/metroid.jpg" style="width: 100%;">
    </div>
    <div id="best-selling">
      <h1>Best selling</h1>
      <div id="browse-wrapper">
        <?php
        include './includes/dbh.inc.php';
        $stmt= $conn->prepare("SELECT * FROM games WHERE gamesId IN(9,13,6,2)"); 
        $stmt->execute();
        $result=$stmt->get_result();
        while($row=$result->fetch_assoc()):
        ?>
        <div class="kockice-wrapper" >
            <div class="kockice" >
              <img src="<?=$row['gamesImage']?>" height="280" width="210" > 
              <div class="ime-wrapper">
              <h5 style="color: #495867; text-align:center"><?=$row['gamesName']?></h5>
              <h5 style="color: #495867; text-align:center"><?=number_format($row['gamesPrice']) ?> KM</h5>
              </div>
              <div id="donji-addtocart">
                <form class="form-submit">
                  <input type="hidden" class="pid" value="<?= $row['gamesId']?>">
                  <input type="hidden" class="pname" value="<?= $row['gamesName']?>">
                  <input type="hidden" class="pprice" value="<?= $row['gamesPrice']?>">
                  <input type="hidden" class="pimage" value="<?= $row['gamesImage']?>">
                  <input type="hidden" class="pcode" value="<?= $row['gamesCode']?>">
                  <button class='browseadd-but'>Add to cart</button>
                </form>
                
              </div>
            </div>
        </div>
        <?php 
        endwhile;
        ?>
      </div>
    </div>

    <div id="free-games">

      <div id="free-wrapper">
        <h1>Free Games</h1>
        <img id="thumb1" src="./pictures/home/free-1.jpg">
        <img id="thumb2" src="./pictures/home/free-2.jpg">
      </div>
    </div>
    <div id="browse-games">
      <a href="./browse.php"><img src="./pictures/home/browse-games.jpg" style="width: 100%;"></a>
    </div>
  </div>
  <?php
  include_once 'footer.php'
  ?>
  <script>
    var myIndex = 0;
    carousel();

    function carousel() {
      var i;
      var x = document.getElementsByClassName("mySlides");
      for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
      }
      myIndex++;
      if (myIndex > x.length) {
        myIndex = 1
      }
      x[myIndex - 1].style.display = "block";
      setTimeout(carousel, 5000);
    }
  </script>
  <script type="text/javascript">
    $(document).ready(function() {
      $(".browseadd-but").click(function(e) {
        e.preventDefault(); //pauzira refreshovanje stranice kad se klikne add to cart
        var $form = $(this).closest(".form-submit"); //trazi formu, a ispod uzima vrijednosti trazenih klasa  
        var pid = $form.find(".pid").val();
        var pname = $form.find(".pname").val();
        var pprice = $form.find(".pprice").val();
        var pimage = $form.find(".pimage").val();
        var pcode = $form.find(".pcode").val();

        $.ajax({ //salje bazi podatke
          url: './includes/action.php',
          method: 'post',
          data: {
            pid: pid,
            pname: pname,
            pprice: pprice,
            pimage: pimage,
            pcode: pcode
          },
          success: function(response) {
            $("#messageAdd").html(response);
            load_cart_item_number();
          }
        });
      });
      load_cart_item_number();

      function load_cart_item_number() {
        $.ajax({
          url: './includes/action.php',
          method: 'get',
          data: {
            cartItem: "cart_item"
          },
          success: function(response) {
            $("#cart-item").html(response);
          }
        })
      }
    });
  </script>
</body>

</html>