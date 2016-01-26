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
        <div class="container">
            <header><h1>Bakkerij Bobba Breatt <br><small>Our bread is out of this world</small></h1></header>
            <section>
                <article>
                    <h3>Login</h3>
                    <form action="" class="form-horizontal">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="gebruikersnaam">Gebruikersnaam:</label>
                            <div class="col-sm-4"> 
                                <input type="text" class="form-control" id="gebruikersnaam" placeholder="Gebruikersnaam">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="wachtwoord">Wachtwoord:</label>
                            <div class="col-sm-4"> 
                                <input type="password" class="form-control" id="wachtwoord" placeholder="wachtwoord">
                            </div>
                        </div>
                        <div class="form-group"> 
                            <div class="col-sm-offset-2 col-sm-4">
                                <button type="submit" class="btn btn-primary">log in</button>     


                            </div>
                        </div>
                        <a href="#">Maak een nieuwe account aan</a>

                    </form>


                </article>
                <article>
                    <h3>Hallo Jef</h3>
                    <a href="#">Bekijk al uw bestellingen</a>

                </article>
            </section>
            <section>
                <h2>Onze Producten</h2>
                <form method="post" action="">
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
                            echo $product->getProductnaam() . "</td>  <td class='col-lg-4'>" . $product->getProductprijs() . "€ </td> <td class='col-lg-4'><input type='text'></input> <br>";
                        }
                        ?>
                    </table>
                    <input type="submit" value="bestel" class="btn btn-primary">
                </form>
            </section>    
        </div>

    </body>
</html>
