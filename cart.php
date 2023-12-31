<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./pictures/favicon-logo.ico">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Kdam+Thmor+Pro:wght@400&amp;display=swap"
        data-tag="font" />
    <link rel="stylesheet" href="./stilovi/cart.css">
    <title>Cart</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://kit.fontawesome.com/a620d9a1da.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    include_once 'header.php'
    ?>
        <div class="container-wrapper">
            <div class="row">
                <div class="alert-wrapper">
                <div id="alert-message" class="alert" style="display: <?php if(isset($_SESSION['showAlert'])){echo $_SESSION['showAlert'];}else{ echo 'none'; } unset($_SESSION['showAlert']); ?>"> 
                    <strong><?php if(isset($_SESSION['message'])){echo $_SESSION['message'];} unset($_SESSION['message']); ?></strong>
                    <button type="button" class="close" id="close-btn">X</button>
                </div>
                    <div class="table-res">
                        <table class="table-border">
                            <thead>
                                <tr>
                                    <td colspan="5">
                                       <h4 style="font-size: 30px; border-bottom:2px solid white;margin-bottom:10px;">Products in your cart</h4> 
                                    </td>
                                </tr>
                                <tr style="border-bottom: 2px solid white;">
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>
                                        <button class="clear-cart"><a style="color: white; font-size:15px;" href="./includes/action.php?clear=all" onclick="return confirm('Jeste li sigurni?')">Clear Cart</a></button>
                                    </th>
                                </tr>

                            </thead>
                            <tbody>
                                <?php  //update korpe sa dodanim itemima
                                require './includes/dbh.inc.php';
                                $stmt = $conn->prepare("SELECT * FROM cart");
                                $stmt->execute();
                                $result = $stmt->get_result();
                                $grand_total = 0;
                                while ($row = $result->fetch_assoc()) :
                                ?>
                                    <tr style="margin-top: 10px;">
                                        <td><?= $row['cartId'] ?></td>
                                        <td><img src="<?= $row['gamesImage'] ?>" width="60"></td>
                                        <td><?= $row['gamesName'] ?></td>
                                        <td><?= $row['gamesPrice'] ?>KM</td>
                                        <td>
                                            <a href="./includes/action.php?remove=<?= $row['cartId'] ?>" class="remove-dugme" onclick="return confirm('Jeste li sigurni da hocete da izbrisete ovu igru?');"><i style="color: white;" class="fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                    <?php $grand_total += $row['gamesPrice']; ?>
                                <?php endwhile; ?>
                                <tr class="options-bottom" style="border: 1px solid white;">
                                    <td>
                                        <button class="cont-shop" style="text-align: center;"><a style="color: #ffffff;" href="./browse.php">Continue shopping</a></button>
                                    </td>
                                    <td colspan="2"><b>Grand total: </b></td>
                                    <td><?=number_format($grand_total) ?> KM</td>
                                    <td>
                                        <button class="cont-shop "><a style="color: #ffffff;" href="./place-order.php">Place order</a></button>
                                        
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <?php
    include_once 'footer.php'
    ?>
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
                        window.scrollTo(0, 0);
                        load_cart_item_number();
                    }
                });
            });
            load_cart_item_number();

            function load_cart_item_number() { //automatsko brojanje broja igara u korpi
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