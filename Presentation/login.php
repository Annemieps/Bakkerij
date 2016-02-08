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
                <a class="navbar-brand" href="indexController.php">Bobba Brett</a>

                <ul class="nav navbar-nav">
                    <li><a href="indexController.php">Home</a></li>
                    <li  class="active"> <a href="loginController.php">Login</a> </li>
                    <li> <a href="productenlijstController.php">Bestellen</a> </li>
                    <li> <a href="accountOverzichtController.php">Account overzicht</a> </li>
                </ul>

            </div>
    </nav>
    <div class="container">
        <header><h1>Bakkerij Bobba Breatt <br><small>Our bread is out of this world</small></h1></header>
        <section>
            <article>
                <h3>Login</h3>
                <form action="loginController.php?action=login" class="form-horizontal" method="post">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Email:</label>
                        <div class="col-sm-4"> 
                            <input type="text" class="form-control" name="email" placeholder="Gebruikersnaam">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="wachtwoord">Wachtwoord:</label>
                        <div class="col-sm-4"> 
                            <input type="password" class="form-control" name="wachtwoord" placeholder="wachtwoord">
                        </div>
                    </div>
                    <div class="form-group"> 
                        <div class="col-sm-offset-2 col-sm-4">
                            <input type="submit" class="btn btn-primary" value="log in">


                        </div>
                    </div>

                    <div id="newaccount"><span class="glyphicons glyphicon glyphicon-grain"></span>
                        <a href="voegKlantToe.php">Maak een nieuwe account aan</a></div>

                </form>
                <?php
                if (isset($_GET['error']) && $_GET['error'] == "wachtwoordfout") {
                    ?>
                    <div class="alert alert-danger" role="alert">
                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        <span class="sr-only">Error:</span>
                        Het ingegeven wachtwoord is niet juist. 
                    </div>
                    <?php
                } elseif (isset($_GET['error']) && $_GET['error'] == "failed") {
                    ?>
                    <div class="alert alert-danger" role="alert">
                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        <span class="sr-only">Error:</span>
                        Dit email adres is niet geregistreerd.
                    </div>
                    <?php
                }
                
                ?>
                 

            </article>
            <article>
                <form action="accountOverzichtController.php?action=logout" method="post">
                    <input type="submit" class="btn btn-danger" value="Logout"></input>
                </form>
            </article>
               
            <footer></footer>
            </body>
            </html>