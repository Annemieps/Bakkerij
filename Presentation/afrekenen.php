<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="presentation/css/bootstrap.min.css" rel="stylesheet">
        <link href="presentation/css/css.css" rel="stylesheet" type="text/css">
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <title>Bakkerij Bobba Bread</title>
    </head>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Bobba Brett</a>

            <ul class="nav navbar-nav">
                <li class="active"><a href="indexController.php">Home</a></li>
                <li> <a href="loginController.php">Login</a> </li>
                <li> <a href="productenlijstController.php">Bestellen</a> </li>
                <li> <a href="#">Account overzicht</a> </li>
            </ul>

        </div>
    </nav>





    <body>
        <div class="container">
            <header><h1>Bakkerij Bobba Breatt <br><small>Our bread is out of this world</small></h1></header>

            <section>
                <h2>Uw bestelling</h2>

                <table class="table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Hoeveelheid</th>
                            <th>Prijs p/s</th>
                            <th>Totaal prijs</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        
                    foreach ($_SESSION["winkelmandje"] as $product) {
                        ?><tr class="row"><td class="col-lg-3"><?php
                                echo $product["productID"] . "</td>  "
                                        . "<td class='col-lg-3'>" . $product["hoeveelheid"] . "</td> "
                                        . "<td class='col-lg-3'>" . "" . 
                                "<td>6.5€</td>"
                                        . "</form></tr> <br>";
                            }
                            ?>
                                
<!--                        <tr><td>éclair</td><td>5</td><td>1.3€</td><td>6.5€</td></tr>
                        <tr><td>éclair</td><td>5</td><td>1.3€</td><td>6.5€</td></tr>
                        <tr><td>éclair</td><td>5</td><td>1.3€</td><td>6.5€</td></tr>
                        <tr><td>éclair</td><td>5</td><td>1.3€</td><td>6.5€</td></tr>-->
                        <tr><td colspan="3" class="text-right"><b>Totaal</b></td><td>26€</td></tr>
                    </tbody>

                </table>  
                <form action="" method="post">
                    <div class="form-group">
                        <b>Voor welke dag is uw bestelling?</b>
                        <br>
                        <select>
                            <option>Morgen 2/2/2016</option>
                            <option>Woensdag 3/2/2016</option>
                            <option>Donderdag 4/2/2016</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="bestellen" class="btn btn-primary"></input>
                    </div>

                </form>
            </section>
        </div>
    </body>
</html>