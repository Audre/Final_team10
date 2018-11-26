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
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>


<header>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1">
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
                    <li class="dropdown">
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
                    <li><a href="cameras.php">Cameras</a></li>
                    <li class="active"><a href="cart.php">Cart</a></li>
                </ul>

            </div>
        </div>
    </nav>
</header>
<main>
    <?php


//    if (!empty($_GET["action"])) {
//        switch ($_GET["action"]) {
//            case "add":
//                if (!empty($_POST["quant"])) {
//                    $query = "SELECT * FROM products WHERE productID=" . $_GET["id"];
//                    print_r($_GET["id"]);
//                    $stmt = $conn->prepare($query);
//                    $num = $stmt->execute();
//                    if ($num) {
//                        $productByCode = $stmt->fetch();
//                        $itemArray = array($productByCode["productID"] => array('name' => $productByCode["name"], 'productID' => $productByCode["productID"], 'quantity' => $_POST["quant"], 'price' => $productByCode["price"], 'image' => $productByCode["thumbnail"]));
//                        print_r(array_values($itemArray));
//                        if (!empty($_SESSION["cart"])) {
//                            if (in_array($productByCode["productID"], array_keys($_SESSION["cart"]))) {
//                                foreach ($_SESSION["cart"] as $k => $v) {
//                                    if ($productByCode["productID"] == $k) {
//                                        if (empty($_SESSION["cart"][$k]["quantity"])) {
//                                            $_SESSION["cart"][$k]["quantity"] = 0;
//                                        }
//                                        $_SESSION["cart"][$k]["quantity"] += $_POST["quant"];
//                                    }
//                                }
//                            } else {
//                                $_SESSION["cart"] = array_merge($_SESSION["cart"], $itemArray);
//                            }
//                        } else {
//                            $_SESSION["cart"] = $itemArray;
//                        }
//                    }
//
//                }
//                break;
//            case "remove":
//                if (!empty($_SESSION["cart_item"])) {
//                    foreach ($_SESSION["cart_item"] as $k => $v) {
//                        if ($_GET["code"] == $k)
//                            unset($_SESSION["cart_item"][$k]);
//                        if (empty($_SESSION["cart_item"]))
//                            unset($_SESSION["cart_item"]);
//                    }
//                }
//                break;
//            case "empty":
//                unset($_SESSION["cart_item"]);
//                break;
//        }
//    }

    echo "<div id=\"shopping-cart\">";
    echo "<div class=\"txt-heading\">Shopping Cart</div>";

    echo "<a id=\"btnEmpty\" href=\"index.php?action=empty\">Empty Cart</a>";
    if (isset($_SESSION["cart"])) {
        $total_quantity = 0;
        $total_price = 0;
        ?>
        <table class="tbl-cart" cellpadding="10" cellspacing="1">
            <tbody>
            <tr>
                <th style="text-align:center;">Name</th>
                <th style="text-align:left;">Product ID</th>
                <th style="text-align:center;" width="5%">Quantity</th>
                <th style="text-align:center;" width="10%">Unit Price</th>
                <th style="text-align:center;" width="10%">Price</th>
                <th style="text-align:center;" width="5%">Remove</th>
            </tr>
            <?php
            foreach ($_SESSION["cart"] as $item) {
                $item_price = $item["quantity"] * $item["price"];
                ?>
                <tr>
                    <td><img src="images/products/<?php echo $item["image"]; ?>" class="cart-item-image"/><?php echo $item["name"]; ?>
                    </td>
                    <td><?php echo $item["productID"]; ?></td>
                    <td style="text-align:center;"><?php echo $item["quantity"]; ?></td>
                    <td style="text-align:center;"><?php echo "$ " . $item["price"]; ?></td>
                    <td style="text-align:center;"><?php echo "$ " . number_format($item_price, 2); ?></td>
                    <td style="text-align:center;"><a href="index.php?action=remove&code=<?php echo $item["productID"]; ?>"
                                                      class="btnRemoveAction"><img src="icon-delete.png"
                                                                                   alt="Remove Item"/></a></td>
                </tr>
                <?php
                $total_quantity += $item["quantity"];
                $total_price += ($item["price"] * $item["quantity"]);
            }
            ?>

            <tr>
                <td colspan="2" align="right">Total:</td>
                <td align="right"><?php echo $total_quantity; ?></td>
                <td align="right" colspan="2"><strong><?php echo "$ " . number_format($total_price, 2); ?></strong></td>
                <td></td>
            </tr>
            </tbody>
        </table>
        <?php
    } else {
        echo "<div class=\"no-records\">Your Cart is Empty</div>";
    }


    //    foreach ($_SESSION["cart"] as $product=>$val) {
    //        echo $product[$val]. "<br/>";
    //    }

    ?>

</main>
</body>
</html>