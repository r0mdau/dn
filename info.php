<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta charset="utf-8">
        <title>Destinées Numériques</title>
        <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="lib/dn/css/dn.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-8 col-md-offset-2">
                    <img src="lib/dn/img/Logo_DN3.jpg" alt="Logo destinées numériques" class="img-responsive">
                    <?php
                        if($_SERVER['REQUEST_URI'] == '/merci')
                            echo '<h2 class="align-center">Merci de votre participation</h2><br>';
                        else if($_SERVER['REQUEST_URI'] == '/erreur')
                            echo '<h2 class="align-center">Erreur serveur</h2><br>';
                        else{
                            header('Location:accueil');
                            exit;
                        }
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>
