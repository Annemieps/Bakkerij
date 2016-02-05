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
                <li><a href="indexController.php">Home</a></li>
                <li  class="active"> <a href="loginController.php">Login</a> </li>
                <li> <a href="productenlijstController.php">Bestellen</a> </li>
                <li> <a href="#">Account overzicht</a> </li>
            </ul>

        </div>
    </nav>

    <div class="container">
        <header><h1>Bakkerij Bobba Breatt <br><small>Our bread is out of this world</small></h1></header>

        <section>
            <h2>Maak een account aan.</h2>
            <small>Een ultra geheim wachtwoord zal voor u gegenereerd worden</small><br><br>

            <?php
            if (isset($_GET['action']) && $_GET['action'] == "gelukt") {
                ?>
                <div class="alert bg-success" role="alert">
                    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                    <span class="sr-only">Yay:</span>
                    Proficiat, u bent geregistreerd! 
                </div>
                <?php
            }
            ?>

            <form class="form-horizontal" role="form" method="post" action="voegKlantToe.php?action=toevoegen">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="email">Email:</label>
                    <div class="col-sm-6">
                        <input type="email" class="form-control" name="email" placeholder="Enter email" required> <?php
                        if (isset($_GET['error']) && $_GET['error'] == "emailBestaatAl") {
                            ?>
                            <div class="alert alert-danger" role="alert">
                                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                <span class="sr-only">Error:</span>
                                Dit email adres is al in gebruik. 
                            </div>
                            <?php
                        }
                        ?>
                        <?php
                        if (isset($_GET['error']) && $_GET['error'] == "email") {
                            ?>
                            <div class="alert alert-danger" role="alert">
                                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                <span class="sr-only">Error:</span>
                                Geen geldig email adres. 
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="voornaam">Voornaam:</label>
                    <div class="col-sm-6"> 
                        <input type="text" class="form-control" name="voornaam" placeholder="Voornaam" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="familienaam">Familienaam:</label>
                    <div class="col-sm-6"> 
                        <input type="text" class="form-control" name="familienaam" placeholder="Familienaam" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="adres">Adres:</label>
                    <div class="col-sm-6"> 
                        <input type="text" class="form-control" name="adres" placeholder="Adress" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="postcode">Postcode:</label>
                    <div class="col-sm-6"> 
                        <input type="text" class="form-control" name="postcode" placeholder="Postcode" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="gemeente">Gemeente:</label>
                    <div class="col-sm-6"> 
                        <input type="text" class="form-control" name="gemeente" placeholder="gemeente" required>
                    </div>
                </div>
                <div class="form-group"> 
                    <div class="col-sm-offset-2 col-sm-6">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>

        </section>

    </div>
    <footer></footer>
</body>

</html>
