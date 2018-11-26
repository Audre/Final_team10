<?php
require_once("Database.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>A & K Photography</title>
    <link rel="stylesheet" type="text/css" href="bootstrapSuperhero.css"/>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>


<header>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand">A & K Photography</a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">

                    <li><a href="index.php">Home <span class="sr-only"></span></a></li>
                    <li class ="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="catalog.php">Catalog
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="catalog.php">Catalog</a></li>
                            <li><a href="food.php">Food</a></li>
                            <li><a href="pets.php">Pets</a></li>
                            <li><a href="nature.php">Nature</a></li>
                            <li><a href="concerts.php">Concerts</a></li>
                            <li><a href="pineapples.php">Pineapple</a></li>
                            <li><a href="romantic.php">Romantic</a></li>
                        </ul>
                    </li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="gallery.php">Gallery</a></li>
                    <li><a href="products.php">Products</a></li>
                    <li class="active"><a href="cameras.php">Cameras</a></li>
                    <li><a href="cart.php">Cart</a></li>
                </ul>

            </div>
        </div>
    </nav>
</header>
<main>
    <?php
    $query = "SELECT * FROM products ";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $num = $stmt->rowCount();
    if ($num) {
    ?>
    <div class="container-fluid" style="padding-left: 5%">
        <div class="row">

            <?php
            $row = $stmt->fetch();
            $category = ucfirst($row["category"]);
            echo "<h1 class='text-center content-heading'>" . $category . "s</h1>";

            for ($i = 0; $i < $num; $i++) {
                $name = $row["name"];
                echo "<div class='col-lg-10 col-lg-offset-1 col-md-10 col-sm-10 col-xs-12 product-thumbnail '>";
                echo "<h3 class='text-center'>" . $name . "</h3> <br/>";
                echo "<div class=\"col-lg-3 col-lg-offset-1 col-md-4 col-sm-5 col-xs-12 \">";
                echo "<img class=\"product-thumbnail img-responsive\" src=\"images/products/" . $row["imagePath"] . "\"></div>";

                $description = $row["description"];
                echo "<div class=\"col-lg-5 col-md-4 col-sm-5 col-xs-12 \">";
                echo "<p style='padding-top:75px'>". $description . "</p><br/>";
                echo "<span class='fa fa-star checked'></span>";
                echo "<span class='fa fa-star unchecked'></span>";
                echo "<span class='fa fa-star unchecked'></span>";
                echo "<span class='fa fa-star unchecked'></span>";
                echo "<span class='fa fa-star unchecked'></span>";

                $storageAmount = $row["unitsInStorage"];
                $price = number_format($row["price"], 2);
                echo "<span><h3>$" . $price . "</h3>";
                echo "<p>Total Items: ". $storageAmount . "</p>";

                $productID = $row["productID"];

                echo "<form action='cameras.php?action=add&id=" . $productID . "&quant=' method='POST'>";
                echo "<span>";
                echo "<select class='selectContainer' name='quant'>";
                echo "<option value='' selected>Quantity</option>";
                for ($options = 1; $options <= 5; $options++) {
                    echo "<option name='" . $options ."' value='" . $options . "'>" . $options . "</option>";
                }
                echo "</select></span>";
                echo "<button class='add-button' name='submit' type='submit'>Add to Cart</button></span>";
                echo "</form>";
                echo "</div>";
                echo "</div>";
                $row = $stmt->fetch();
            }
    }

                if (!empty($_GET["action"])) {
                    switch ($_GET["action"]) {
                        case "add":
                            if (!empty($_POST["quant"])) {
                                $query = "SELECT * FROM products WHERE productID=" . $_GET["id"];
                                print_r($_GET["id"]);
                                $stmt = $conn->prepare($query);
                                $num = $stmt->execute();
                                if ($num) {
                                    $productByCode = $stmt->fetch();
                                    $itemArray = array($productByCode["productID"] => array('name' => $productByCode["name"], 'productID' => $productByCode["productID"], 'quantity' => $_POST["quant"], 'price' => $productByCode["price"], 'image' => $productByCode["thumbnail"]));
                                    if (!empty($_SESSION["cart"])) {
                                        if (in_array($_GET["id"], array_keys($_SESSION["cart"]))) {
                                            foreach ($_SESSION["cart"] as $k => $v) {
                                                if ($_GET["id"] == $k) {
                                                    print_r("Key: " . $k);
                                                    if (empty($_SESSION["cart"][$k]["quantity"])) {
                                                        $_SESSION["cart"][$k]["quantity"] = 0;
                                                        print_r("\n");
                                                        print_r("Quantity: " . $_SESSION["cart"][$k]["quantity"]);
                                                    }
                                                    $_SESSION["cart"][$k]["quantity"] += $_POST["quant"];
                                                    print_r("\n");
                                                    print_r("quantity: " . $_SESSION["cart"][$k]["quantity"]);
                                                }
                                            }
                                        } else {
                                            $_SESSION["cart"] = array_merge($_SESSION["cart"], $itemArray);
                                        }
                                    } else {
                                        $_SESSION["cart"] = $itemArray;
                                    }
                                }

                            }
                            break;
                        case "remove":
                            if (!empty($_SESSION["cart_item"])) {
                                foreach ($_SESSION["cart_item"] as $k => $v) {
                                    if ($_GET["code"] == $k)
                                        unset($_SESSION["cart_item"][$k]);
                                    if (empty($_SESSION["cart_item"]))
                                        unset($_SESSION["cart_item"]);
                                }
                            }
                            break;
                        case "empty":
                            unset($_SESSION["cart_item"]);
                            break;
                    }
                }
            ?>
        </div>
    </div>


</main>
<!--<script>-->
<!---->
<!--    var modal = document.getElementById("myModal");-->
<!---->
<!--    var img = $(".myImg");-->
<!--    var modalImg = $("#img01");-->
<!--    img.click(function () {-->
<!--        modal.style.display = "block";-->
<!--        var newSrc = this.src;-->
<!--        modalImg.attr("src", newSrc);-->
<!--    });-->
<!---->
<!--    var span = document.getElementsByClassName("close")[0];-->
<!---->
<!--    span.onclick = function () {-->
<!--        modal.style.display = "none";-->
<!---->
<!--    };-->
<!---->
<!--</script>-->


</body>
</html>