<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./stilovi/browse.css">
  <link rel="icon" href="./pictures/favicon-logo.ico">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Kdam+Thmor+Pro:wght@400&amp;display=swap"data-tag="font" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://kit.fontawesome.com/a620d9a1da.js" crossorigin="anonymous"></script>
  <title>Browse games</title>
</head>

<body>
<?php
  include_once 'header.php'
  ?>
  <style>
    #browse-boja {
      color: rgb(51, 255, 0);
    }
    #browse-boja:hover{
    color: rgb(21, 128, 0);
    }
    
    #footer{
        position: relative;
    }
  </style>
  <div id="bg" >
    <div id="messageAdd"></div>
      <div id="browse-wrapper">
        <?php
        include './includes/dbh.inc.php';
        $stmt= $conn->prepare("SELECT * FROM games");
        $stmt->execute();
        $result=$stmt->get_result();
        while($row=$result->fetch_assoc()):
        ?>
        <div class="kockice-wrapper" >
            <div class="kockice" >
              <img src="<?=$row['gamesImage']?>" height="280"> 
              <div style="padding: 5px; font-size: 25px;">
              <h5 style="color: red; text-align:center"><?=$row['gamesName']?></h5>
              <h5 style="color: black; text-align:center"><?=number_format($row['gamesPrice']) ?> KM</h5>
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

  <?php
include_once 'footer.php'
?>

<script type="text/javascript">
$(document).ready(function(){
  $(".browseadd-but").click(function(e){
    e.preventDefault(); //pauzira refreshovanje stranice kad se klikne add to cart
    var $form = $(this).closest(".form-submit");  //trazi formu, a ispod uzima vrijednosti trazenih klasa  
    var pid = $form.find(".pid").val();
    var pname = $form.find(".pname").val();
    var pprice = $form.find(".pprice").val();
    var pimage = $form.find(".pimage").val();
    var pcode = $form.find(".pcode").val();

    $.ajax({    //salje bazi podatke
      url: './includes/action.php',
      method:'post',
      data: {pid:pid,
            pname:pname,
            pprice:pprice,
            pimage:pimage,
            pcode:pcode},
      success:function(response){
        $("#messageAdd").html(response);
      }
    });

  });
});
</script>
</body>

</html>