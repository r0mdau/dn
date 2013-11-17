<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta charset="utf-8">
        <title>Destinées Numériques</title>
        <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="lib/flipclock/css/flipclock.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-md-4"></div>
                <div class="col-xs-6 col-md-4" class="text-center">
                    <h2 class="align-center">Ils ont adhéré</h2>                    
                    <br>
                    <div id="liste" class="well">
                        
                    </div>
                    <div id="compteur" class="text-center">
                        
                    </div>
                </div>
                <div class="col-xs-6 col-md-4"></div>
            </div>
        </div>
        <script src="lib/jquery/js/jquery-1.10.2.min.js"></script>        		
        <script src="lib/flipclock/js/libs/base.js"></script>
        <script src="lib/flipclock/js/flipclock.js"></script>
        <script src="lib/flipclock/js/faces/counter.js"></script>	
        <script>
            var clock;
            $(document).ready(function(){
                clock = $('#compteur').FlipClock(0, {
                        clockFace: 'Counter'
                });
                
                actualiserCompteur();
            });
            
            function actualiserCompteur(){                
                $.ajax({
                    url : "ajaj/compteur.php"                    
                }).done(function(res){
                    clock.setValue(res);
                });
                setTimeout(actualiserCompteur, 1000);
            }
        </script>
    </body>
</html>