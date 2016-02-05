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
                        <tr class="row">
                            <th>Product</th>
                            <th>Hoeveelheid</th>
                            <th>Prijs p/s</th>
                            <th>Totaal prijs</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($prijs as $product) {

                            echo "<tr class='row'>"
                            . "<td class='col-lg-3'>" . $product['productnaam'] . "</td>"
                            . "<td class='col-lg-3'>" . $product["hoeveelheid"] . "</td> "
                            . "<td class='col-lg-3'>" . $product['productprijs'] . "</td>"
                            . "<td class='col-lg-3'>" . $product["hoeveelheid"] * $product['productprijs'] . "</td>"
                            . "</tr>";

                            $tussentotaal = $product["hoeveelheid"] * $product['productprijs'];
                            $totaal = $totaal + $tussentotaal;
                        }
                        ?>


                        <tr><td colspan="3" class="text-right"><b>Totaal</b></td><td><?php echo $totaal; ?> €</td></tr>
                    </tbody>

                </table>  
                <form action="afrekenController.php?betalen=true" method="post">
                    <div class="form-group">
                        <b>Voor welke dag is uw bestelling?</b>
                        <br>
                        <select name="bestellingsdatum">
                            <!--<option value="<?php //echo date('j F Y',strtotime('now +1 day')) ?>"><?php //echo date('j') + 1 . " " . date('F') . " " . date('Y'); ?></option>-->
                            <option value="<?php echo strtotime('+1 day') ?>"><?php echo date ("j F Y",strtotime('+1 day')) ?></option>
                            <option value="<?php echo strtotime('+2 day') ?>"><?php echo date ("j F Y",strtotime('+2 day')); ?></option>
                            <option value="<?php echo strtotime('+3 day') ?>"><?php echo date ("j F Y",strtotime('+3 day')); ?></option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="bestellen" class="btn btn-primary"></input>
                    </div>

                </form>
                <?php
                if (isset($_GET["error"])){
                    if($_GET["error"]="DatumBezet"){
                        ?>
                    <div class="alert alert-danger" role="alert">
                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        <span class="sr-only">Error:</span>
                       Er is al een bestelling voor deze dag. U mag maar één bestelling per dag doen. 
                    </div>
                    <?php
                    }
                    if($_GET["error"]="DatumIncorrect"){
                      ?>
                    <div class="alert alert-danger" role="alert">
                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        <span class="sr-only">Error:</span>
                        De ingegeven datum is incorrect, dit is niet de ijstijd. 
                    </div>
                    <?php  
                    }
                    if($_GET["error"]="verboden"){
                      ?>
                    <div class="alert alert-danger" role="alert">
                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        <span class="sr-only">Error:</span>
                        U hebt geen toestemming om te bestellen.  
                    </div>
                    <?php  
                    }
                }
               
        
//                ?>
            </section>
        </div>
        <footer></footer>
    </body>
</html>