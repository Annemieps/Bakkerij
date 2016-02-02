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
        <title>Bakkerij Bobba Bread Producten Overzicht</title>
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <a class="navbar-brand" href="#">Bobba Brett</a>

                <ul class="nav navbar-nav">
                    <li><a href="indexController.php">Home</a></li>
                    <li> <a href="loginController.php">Login</a> </li>
                    <li class="active"> <a href="productenlijstController.php">Bestellen</a> </li>
                    <li> <a href="#">Account overzicht</a> </li>
                </ul>

            </div>
        </nav>
        <div class="container">

            <header><h1>Bakkerij Bobba Breatt <br><small>Our bread is out of this world</small></h1></header>

            <section>
                <h2>Onze Producten</h2>

                <table class="table">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Product</th>
                            <th>Prijs</th>
                            <th>Hoeveelheid</th>
                        </tr>
                    </thead>

                    <?php
                    foreach ($productenLijst as $product) {
                        ?><tr class="row"><td class="col-lg-4"><?php
                                echo $product->getProductnaam() . "</td>  <td class='col-lg-4'>" . $product->getProductprijs() . "€ </td> <td class='col-lg-4'>"
                                . "<form action='productenlijstController.php?product=" . $product->getProductID() . " 'method='post'>"
                                . "<input type='number' name='hoeveelheid'></input> <input type='submit' value='submit' class='btn btn-primary'></input>"
                                        . "</form></td> <br>";
                            }
                            ?>
                </table>
                <a href="afrekenController.php" class="btn btn-primary">Afrekenen</a>
                

            </section>    
        </div>

    </body>
</html>
