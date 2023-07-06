<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./stilovi/login.css">
  <link rel="icon" href="./pictures/favicon-logo.ico">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Kdam+Thmor+Pro:wght@400&amp;display=swap"data-tag="font" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://kit.fontawesome.com/a620d9a1da.js" crossorigin="anonymous"></script>
  <title>Community</title>
  <style>
    #bg{
        background-color:#495867 ;
        background-image: none;
        color: white;
        font-family: Kdam Thmor Pro;
        text-align: left;
        display: flex;
        justify-content: left;
        align-items: start ;
        padding: 35px;
        height: 1000px;
    }
    
    #tekst h4{
        padding-top: 15px;
        line-height: 2;
    }
    #footer{
        position: relative;
        bottom: 0;
    }
  </style>
</head>

<body>
<?php
  include_once 'header.php'
  ?>
<style>
    #community-boja {
      color: rgb(209, 0, 0);
    
}
#community-boja:hover{
  color: #931621;
}
  </style>
  <div id="bg">
    <div id="tekst">
        <h1>Game Shop-Community</h1>
        <h4>We want Game shop to be a safe and fun place for you to play games or hang with your friends. We need your help to keep it that way.</h4>

        <h4>The Game shop Terms of Service and other agreements contain rules that apply to your use of Game shop's services, so some of these rules may look familiar. But Game shop offers so many ways to interact with others through its games, services, and environments that more explanation of our community standards is helpful.</h4>
            
        <h4>Our Community Rules apply to all users of Game shop's games, services, and environments. These standards are a guide on how you should interact when inside the Epic Games ecosystem. We included some specific examples below, but just because something isn’t specifically called out below doesn’t mean it’s OK.</h4>
            
        <h4>Following the rules is not super hard. If you violate these rules, however, it can result in action against your account all the way up to a permanent ban.</h4>
        <hr style="margin:20px 0 20px 0 ;">
        <h1>Community rules</h1>
        <h3 style="padding-top: 10px;">Personal Information</h3>
        <h4>You’re never allowed to share other people’s personal information other than display names, and we strongly encourage you not to share yours. Sharing or threatening to share someone’s alternate account names, real-world location, real name, etc. is not allowed.</h4>
        <h3 style="padding-top: 10px;">Intolerance and discrimination</h3>  
        <h4>Game shop does not tolerate any form of hate or discrimination. The Game shop ecosystem welcomes diversity in race, ethnicity, color, religion, gender identity, sexual orientation, ability, national origin, and other groups. Don’t demean, marginalize, use hateful language against, or belittle other users or groups.</h4> 
        <h3 style="padding-top: 10px;">Bullying and harrasment</h3>  
        <h4>Respect other people - when chatting, playing or creating. Interacting with others in a way that is predatory, threatening, intimidating, lewd, demeaning, derogatory, invasive of privacy, or abusive is against the rules. Trying to make someone else feel worse so you feel better doesn’t work - It is much easier, and more fun, to enjoy the experience together!</h4>
        <h3 style="padding-top: 10px;">Dangerous and illegal activities</h3>  
        <h4>Don’t participate in or encourage illegal or dangerous activities within the community, including gambling, illegal drug use, phishing, human trafficking, prostitution, doxing, swatting, or sharing content that glorifies or incites violence. Threats of harm to yourself or others are taken seriously—don’t make them, especially as a joke.</h4>
        <h3 style="padding-top: 10px;">Scams and deceptive practices</h3>  
        <h4>Do not take advantage of fellow players. Scams or deceptive practices are prohibited, including seeking account information, and buying or selling accounts or personal information.</h4>
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
        load_cart_item_number();
      }
    });
  });
  load_cart_item_number();

  function load_cart_item_number(){
    $.ajax({
      url: './includes/action.php',
      method:'get',
      data:{cartItem:"cart_item"},
      success:function(response){
        $("#cart-item").html(response);
      }
    })
  }
});
</script>
</body>

</html>