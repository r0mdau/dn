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
            var time = 7000;
            var nombre = 7;
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
                    $(".a"+nombre).hide("slow");
                    for(i = nombre - 1; i > 0; i--){
                        $(".a"+i).show("slow").attr("class", $(".a"+i).attr('class')+" a"+(i+1));
                    }
                    $('.new').show('slow').attr('class', $('.new').attr('class')+' a1');
                });
                
                $.ajax({
                    url : "ajaj/compteur.php"                    
                }).done(function(res){
                    clock.setValue(res);
                });
                setTimeout(actualiserCompteurEtAdherents, time);
            }
            
            function blocquote(adherent){
                var bloc = "<blockquote style=\"display:none\" class=\"new\" >";
                bloc += "<p";
                if (adherent.nouveau == 1)
                    bloc += " style=\"color:#39b3d7\" ";
                bloc += ">"+adherent.prenom+" "+adherent.nom;
                if(adherent.nouveau == 1)
                    bloc += "&nbsp;&nbsp;&nbsp;<img src=\"lib/dn/img/ajouter-en-plus-icone-7864-128.png\" alt=\"Un adherent\" width=\"27\" height=\"27\">";
                bloc += "</p>";
                bloc += "<small>"+adherent.entreprise+"</small>";
                bloc += "</blockquote><hr>";
                return bloc;
            }
        </script>
    </body>
</html>