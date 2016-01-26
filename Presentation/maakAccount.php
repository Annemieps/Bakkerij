<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/css.css" rel="stylesheet" type="text/css">
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
    <body>
        <div class="container">
            <header><h1>Bakkerij Bobba Breatt <br><small>Our bread is out of this world</small></h1></header>

            <section>
                <h2>Maak een account aan.</h2>
                <small>Een ultra geheim wachtwoord zal voor u gegenereerd worden</small><br><br>
                
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Email:</label>
                        <div class="col-sm-6">
                            <input type="email" class="form-control" id="email" placeholder="Enter email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="vn">Voornaam:</label>
                        <div class="col-sm-6"> 
                            <input type="text" class="form-control" id="vn" placeholder="Voornaam">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="fmn">Familienaam:</label>
                        <div class="col-sm-6"> 
                            <input type="text" class="form-control" id="fmn" placeholder="Familienaam">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="adres">Adres:</label>
                        <div class="col-sm-6"> 
                            <input type="text" class="form-control" id="adres" placeholder="Adress">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="postcode">Postcode:</label>
                        <div class="col-sm-6"> 
                            <input type="text" class="form-control" id="postcode" placeholder="Postcode">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="gemeente">Gemeente:</label>
                        <div class="col-sm-6"> 
                            <input type="text" class="form-control" id="gemeente" placeholder="gemeente">
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

    </body>
</html>
