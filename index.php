<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="./pictures/favicon-logo.ico">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="./stilovi/index.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Kdam+Thmor+Pro:wght@400&amp;display=swap"data-tag="font" />
  <script src="https://kit.fontawesome.com/a620d9a1da.js" crossorigin="anonymous"></script>
  <title>Home</title>
</head>

<body>
<?php
  include_once 'header.php'
  ?>
  <style>
    #home-boja {
      color: rgb(51, 255, 0);
}
#home-boja:hover{
  color: rgb(21, 128, 0);
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
      <h1 >Best selling</h1>
    <div id="gallery-wrapper">
    <div class="image">
      <img src="./pictures/home/home1.jpg" width="300" height="200">
      <p>20KM</p>
      <div class="desc">Lies of P</div>
      <button class="addtocart"><a href="">Add to cart</a></button>
    </div>

    <div class="image">
      <img src="./pictures/home/home2.jpg" width="300" height="200">
      <p >49KM</p>
      <div class="desc">Lords of the Fallen</div>
      <button class="addtocart"><a href="">Add to cart</a></button>
    </div>

    <div class="image">
      <img src="./pictures/home/home3.jpg" width="300" height="200">
      <p>15KM</p>
      <div class="desc">The Crew</div>
      <button class="addtocart"><a href="">Add to cart</a></button>
    </div>

    <div class="image">
      <img src="./pictures/home/home4.jpg" width="300" height="200">
      <p>33KM</p>
      <div class="desc">F1: 2023</div>
      <button class="addtocart"><a href="">Add to cart</a></button>
    </div>
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
      if (myIndex > x.length) { myIndex = 1 }
      x[myIndex - 1].style.display = "block";
      setTimeout(carousel, 5000);
    }
  </script>
</body>

</html>