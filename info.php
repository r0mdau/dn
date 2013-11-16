<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta charset="utf-8">
        <title>Adhésion</title>
        <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-md-4"></div>
                <div class="col-xs-6 col-md-4">
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
                <div class="col-xs-6 col-md-4"></div>
            </div>
        </div>  
    </body>
</html>