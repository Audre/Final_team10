<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>A & K Photography</title>
    <link rel="stylesheet" type="text/css" href="bootstrapSuperhero.css"/>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
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

                    <li><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
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
                    <li class="active"><a href="about.php">About</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>

            </div>
        </div>
    </nav>
</header>
<main>
    <div class="container">
        <div class="row">

            <div class="col-lg-10 col-lg-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading text-center"><h2>Group 10: <br/> Audre Staffen and Kierra Johnson</h2></div>
                    <div class="panel-body">
                        <h4>A & K Photography is the fictional photography company owned by Audre Staffen and
                            Kierra Johnson.</h4>

                        <p>Our website is a showcase of some of our pictures, broken up into the different
                            categories we are passionate about.</p>
                        <br/>

                        <div class="img-responsive">
                            <img src="images/romantic2.jpg" alt="romantic2" class="img-about1"
                                 >
                            <div><p><span class="text-primary">Kierra Johnson </span><br/>
                                    <span >Hello! My name is Kierra and I am a computer science major at
                                    Western Michigan University. Photography is my passion but I also enjoy
                                    moonlight strolls on the beach!</span>
                                </p></div>
                        </div>
                        <div class="img-responsive clear-float">
                            <img src="images/sophie2.jpg" alt="sophie2" class="img-about2">
                            <p><span class="text-primary">Audre Staffen</span> <br/>
                                <span>Hi, I'm Audre and I am a CS major at Western Michigan University. I am from
                                    Three Rivers, Michigan. I have an adorable dog and cat, of which there are no
                                    shortage of pictures. My passions are music, cars, and animals.
                                </span></p>
                        </div>


                    </div>
                </div>
            </div>

        </div>
    </div>
</main>
</body>
</html>