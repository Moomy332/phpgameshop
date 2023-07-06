<?php
session_start();
require 'dbh.inc.php';

if(isset($_POST['pid'])){  //ova metoda 'trazi' ako je bilo koji pid poslan od ajax requesta 
    $pid=$_POST['pid'];
    $pname=$_POST['pname'];
    $pprice=$_POST['pprice'];
    $pimage=$_POST['pimage'];
    $pcode=$_POST['pcode'];

    $stmt=$conn->prepare("SELECT gamesCode FROM cart WHERE gamesCode=?"); //provjeravamo je li item koji se dodaje u korpu VEC u korpi
    $stmt->bind_param("s",$pcode);
    $stmt->execute();
    $res=$stmt->get_result();
    
    if ($res && $res->num_rows > 0) { 
        $r = $res->fetch_assoc();
        $code = $r['gamesCode'];
    } else {
        $code = null;
    }

    if(!$code){
        $query=$conn->prepare("INSERT INTO cart(gamesName,gamesPrice,gamesImage,total_price,gamesCode) VALUES (?,?,?,?,?)");
        $query->bind_param("sssss",$pname,$pprice,$pimage,$pprice,$pcode); //s za string, i za integer
        $query->execute();

        echo '<div id="alert-message" class="alert"> 
            <strong>Igra je dodana u korpu!</strong>
            <button type="button" class="close" id="close-btn">X</button>
            </div>';
    }
    else{
        echo '<div id="alert-message" class="alert"> 
            <strong>Igra je vec u korpi!</strong>
            <button type="button" class="close" id="close-btn">X</button>
            </div>';
    }
}

if(isset($_GET['cartItem']) && isset($_GET['cartItem'])=='cart_item'){  //funkcija za racunanje stvari u korpi
    $stmt=$conn->prepare('SELECT * FROM cart');
    $stmt->execute();
    $stmt->store_result();
    $rows=$stmt->num_rows;
    echo $rows;
}

if(isset($_GET['remove'])){ //brisanje jedne po jedne igre u korpu na klik kante
    $id= $_GET['remove'];

    $stmt=$conn->prepare("DELETE FROM cart WHERE cartId=?");
    $stmt-> bind_param("i",$id);
    $stmt->execute();

    $_SESSION['showAlert'] ='block';
    $_SESSION['message']='Igra izbrisana iz korpe!';
    header('location:../cart.php');
}

?>
<script> 
$(document).ready(function() { 
  $("#close-btn").click(function() { 
    $('#alert-message').hide(); 
  }); 
}); 
</script> 

