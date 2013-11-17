<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta charset="utf-8">
        <title>Destinées Numériques</title>
        <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-md-4"></div>
                <div class="col-xs-6 col-md-4">
                    <h2 class="align-center">Ils ont adhéré</h2><br>
                    <div id="liste" class="well">
                        
                    </div>
                    <div id="compteur">
                        
                    </div>
                </div>
                <div class="col-xs-6 col-md-4"></div>
            </div>
        </div>
        <script src="lib/jquery/js/jquery-1.10.2.min.js"></script>
        <script>
            $(document).ready(function(){
                $('#compteur').html(3);
            });
        </script>
    </body>
</html>