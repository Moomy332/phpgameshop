<?php
session_start();
require 'dbh.inc.php';

if (isset($_POST['pid'])) {
    $pid = $_POST['pid'];
    $pname = $_POST['pname'];
    $pprice = $_POST['pprice'];
    $pimage = $_POST['pimage'];
    $pcode = $_POST['pcode'];

    $stmt = $conn->prepare("SELECT gamesCode FROM cart WHERE gamesCode=?");
    $stmt->bind_param("s", $pcode);
    $stmt->execute();
    $res = $stmt->get_result();

    $code = null;
    if ($res && $res->num_rows > 0) {
        $r = $res->fetch_assoc();
        $code = $r['gamesCode'];
    }

    if (!$code) {
        $query = $conn->prepare("INSERT INTO cart(gamesName,gamesPrice,gamesImage,total_price,gamesCode) VALUES (?,?,?,?,?)");
        $query->bind_param("sssss", $pname, $pprice, $pimage, $pprice, $pcode);
        $query->execute();

        echo '<div id="alert-message" class="alert"> 
            <strong>Igra je dodana u korpu!</strong>
            <button type="button" class="close" id="close-btn">X</button>
            </div>';
    } else {
        echo '<div id="alert-message" class="alert"> 
            <strong>Igra je već u korpi!</strong>
            <button type="button" class="close" id="close-btn">X</button>
            </div>';
    }
}

// if(isset($_GET['cartItem']) && isset($_GET['cartItem'])=='cart_item'){  //funkcija za racunanje stvari u korpi
// Not sure if this works the same as the line above
if (isset($_GET['cartItem']) && $_GET['cartItem'] == 'cart_item') {
    $stmt = $conn->prepare('SELECT * FROM cart');
    $stmt->execute();
    $stmt->store_result();
    $rows = $stmt->num_rows;

    echo $rows;
}
?>