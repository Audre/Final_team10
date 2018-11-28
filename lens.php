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
     <style>
        #Product:hover #menu{
            display: block;
            position: absolute;
        }
        #Catalog:hover #menu1{
            display: block;
            position: absolute;
        }
    </style>
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
                    <li><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
                    <li id="Catalog">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="catalog.php">Catalog
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu" id="menu1">
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
                    <li id="Product">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="cameras.php">Products
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu" id="menu">
                            <li><a href="cameras.php">Cameras & Accessories</a></li>
                            <li class="active"><a href="lens.php">Lens</a></li>
                            <li><a href="filters.php">Filters</a></li>
                            <li><a href="tripod.php">Tripods</a></li>
                            <li><a href="memorycard.php">Memory Cards</a></li>
                        </ul>
                    </li>
                    <li><a href="cart.php">Cart</a></li>
                    <?php
                    if (isset($_SESSION["logged_in"])) {
                        echo "<li><a href='logout.php'>Logout</a></li>";
                    } else {
                        echo "<li><a href=\"login.php\">Login</a></li>";
                        echo "<li class=\"active\"><a href=\"register.php\">Register</a></li>";
                    }
                    ?>
                </ul>
        </div>
        </div>
    </nav>
</header>
<main>
    <?php
   $query = "SELECT * FROM products WHERE category='lens' ";
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
                echo "<span><h3>\xf0\x9f\x8d\x8d" . $price . "</h3>";
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
                echo "<button class='btn btn-primary' name='submit' type='submit'><i class='fa fa-shopping-cart'></i> Add to Cart</button></span>";
                echo "</form>";
                echo "</div>";
                echo "</div>";
                $row = $stmt->fetch();
            }
    }
    ?>
        </div>
    </div>

    <?php
    if (!empty($_GET["action"])) {
        switch ($_GET["action"]) {
            case "add":
                if (!empty($_POST["quant"])) {
                    $query = "SELECT * FROM products WHERE productID=" . $_GET["id"];
                    $stmt = $conn->prepare($query);
                    $num = $stmt->execute();
                    if ($num) {
                        $quantity = $_POST["quant"];
                        $id = $_GET["id"];
                        $productByCode = $stmt->fetch();
                        $itemArray = array($productByCode["productID"] => array('quantity' => $quantity, 'image' => $productByCode["thumbnail"], 'price' => $productByCode["price"], 'productID' => $id, 'name' => $productByCode['name']));
                        if (!empty($_SESSION["cart"])) {
                            echo "Before: ";
                            print_r($itemArray);
                            if (array_key_exists($id, $_SESSION["cart"])) {
                                echo "here1";
                                $output = $_SESSION["cart"][$id];
                                echo "<br/> output:";
                                print_r($output);
                                foreach ($_SESSION["cart"] as $key => $value) {
                                    echo "here2";
                                    echo "<br/> id: key: <br/>";
                                    print_r($key);
                                    if ($id == $key) {
                                        echo "here3";
                                        if (empty($_SESSION["cart"][$key]["quantity"])) {
                                            $_SESSION["cart"][$key]["quantity"] = 0;
                                            echo "here4";
                                            print_r($_SESSION["cart"][$key]);
                                        }
                                        $_SESSION["cart"][$key]["quantity"] += $quantity;
                                        echo "herealso";
                                        print_r($_SESSION["cart"][$key]);
                                    }
                                }
                            } else {
                                $_SESSION["cart"] = $_SESSION["cart"] + $itemArray;
                                echo "/////////////////////////////////////////////////////";
                            }
                        } else {
                            $_SESSION["cart"] = $itemArray;
                            echo "*******************************************";
                        }
                    }
                }
                echo "Cart: <br/>";
                print_r($_SESSION["cart"]);
                break;
        }
    }
    unset($_GET['id']);
    ?>


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