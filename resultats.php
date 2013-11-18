<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta charset="utf-8">
        <title>Destinées Numériques</title>
        <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="lib/dn/css/dn.css">
        <link rel="stylesheet" href="lib/flipclock/css/flipclock.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-offset-4">
                    <img src="lib/dn/img/Logo_DN3.jpg" alt="Logo destinées numériques" class="img-responsive">
                    <div class="row">
                        <div class="col-sm-4">
                          <h2>Adherents</h2>
                        </div>
                        <div class="col-sm-8">
                            <div id="compteur"></div>
                        </div>
                    </div>
                    <br>
                    <div id="liste" class="well">
                        
                    </div>                    
                </div>
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
                
                actualiserCompteurEtAdherents();
            });
            
            function actualiserCompteurEtAdherents(){
                $.ajax({
                    url : "ajaj/listeAdherents.php"
                }).done(function(infos){
                    var adherent = JSON.parse(infos);
                    $('#liste').prepend(blocquote(adherent));
                    $('.new').show('slow').attr('class', '');
                });
                
                $.ajax({
                    url : "ajaj/compteur.php"                    
                }).done(function(res){
                    clock.setValue(res);
                });
                setTimeout(actualiserCompteurEtAdherents, 1000);
            }
            
            function blocquote(adherent){
                var bloc = "<blockquote style=\"display:none\" class=\"new\">";
                bloc += "<p>"+adherent.prenom+" "+adherent.nom+"</p>";
                bloc += "<small>"+adherent.entreprise+"</small>";
                bloc += "</blockquote>";
                return bloc;
            }
        </script>
    </body>
</html>