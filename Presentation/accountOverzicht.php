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
                <li> <a href="loginController.php">Login</a> </li>
                <li> <a href="productenlijstController.php">Bestellen</a> </li>
                <li class="active"> <a href="accountOverzichtController.php">Account overzicht</a> </li>
            </ul>

        </div>
    </nav>





    <body>
        <div class="container">
            <header><h1>Bakkerij Bobba Breatt <br><small>Our bread is out of this world</small></h1></header>

            <section>
                <?php
                if (isset($_GET['action']) && $_GET['proficiat']) {
                    ?>
                    <div class="alert bg-success" role="alert">
                        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                        <span class="sr-only">Yay:</span>
                        Proficiat, uw bestelling is gelukt.  
                    </div>
                    <?php
                }
                ?>
            </section>
            <section>
                <h2>Account overzicht</h2>
                <table class="table">
                    <thead>
                        <tr class="row">
                            <th>Bestellings ID</th>
                            <th>Gebruiker</th>
                            <th>Datum bestelling</th>
                            <th>Verwijder Bestelling</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($bestellingLijst as $bestelling) {

                           
                            echo "<tr class='row'>" .
                            "<td class='col-lg-3'>" . $bestelling['bestellingenID'] . "</td>" .
                            "<td class='col-lg-3'>" . $bestelling['klantID'] . "</td>" .
                            "<td class='col-lg-3'>" . date("j-m-Y", $bestelling["dag"]) . "</td>" . "<td class='col-lg-3'>";

                            if ($bestelling["dag"] < strtotime('now')) {
                                echo "Verleden";
                            } elseif (date("j-m-Y", $bestelling["dag"]) == date("j-m-Y", strtotime('now'))) {
                                echo "Vandaag, cancelen onmogelijk";
                            } elseif ($bestelling["dag"] > strtotime('now')) {
                                echo "<a href='accountOverzichtController.php?verwijder=" . $bestelling['bestellingenID'] . "' class='btn btn-primary'>Verwijder</a></td>";
                            }

                            "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
                <form action="accountOverzichtController.php?action=logout" method="post">
                    <input type="submit" class="btn btn-danger" value="Logout"></input>
                </form>
            </section>
        </div>
        <footer>
            <section class="container">Test Annemie Roelants</section>
        </footer>
    </div>
</body>
</html>