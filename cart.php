<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./pictures/favicon-logo.ico">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Kdam+Thmor+Pro:wght@400&amp;display=swap" data-tag="font" />
    <link rel="stylesheet" href="./stilovi/login.css">
    <title>Cart</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://kit.fontawesome.com/a620d9a1da.js" crossorigin="anonymous"></script>
    <style>
        #bg {
            background-color: #050844;
            background-image: none;
        }
    </style>
</head>

<body>
    <?php
    include_once 'header.php'
    ?>
    <div id="bg">
        <div class="row">
            
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