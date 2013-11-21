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
                <div class="col-xs-12 col-sm-4 col-md-8 col-md-offset-2">
                    <img src="lib/dn/img/Logo_DN3.jpg" alt="Logo destinées numériques" class="img-responsive">
                    <div class="row">
                        <div class="col-sm-4">
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
            var time = 10000;
            var nombre = 5;
            $(document).ready(function(){
                clock = $('#compteur').FlipClock(0, {
                        clockFace: 'Counter'
                });
                
                setTimer();
                actualiserCompteurEtAdherents();                
            });
            
            function setTimer(){
                $.ajax({
                    url : "ajaj/compteurNouveaux.php"                    
                }).done(function(res){
                    if(res < 5)
                        time = 10000;
                    else if(res >= 5 && res < 10)
                        time = 7000;
                    else if(res >= 10 && res < 20)
                        time = 5000;
                    else if(res >= 20 && res < 50)
                        time = 2000;
                    else if(res >= 50)
                        time = 1000;
                });
                setTimeout(setTimer, 1000);
            }
            
            function actualiserCompteurEtAdherents(){
                $.ajax({
                    url : "ajaj/listeAdherents.php"
                }).done(function(infos){
                    if(infos == "") return;
                    var adherent = JSON.parse(infos);
                    $('#liste').prepend(blocquote(adherent));                    
                    $('.a'+nombre).hide('slow', function(){
                        $(this).remove();
                        $.ajax({
                            url : "ajaj/offScreen.php",
                            type: "POST",
                            data: {
                                id : $(this).attr('alt')
                            }
                        });
                    });
                    for(var i = nombre - 1; i > 0; i--){
                        $(".a"+i).show("slow").attr("class", "a"+(i+1));
                    }
                    $('.new').show('slow').attr('class', 'a1');
                });
                
                $.ajax({
                    url : "ajaj/compteur.php"                    
                }).done(function(res){
                    clock.setValue(res);
                });
                setTimeout(actualiserCompteurEtAdherents, time);
            }
            
            function blocquote(adherent){
                var bloc = "<blockquote style=\"display:none\" class=\"new\" alt=\""+adherent.id+"\" >";
                bloc += "<p style=\"font-size:2em";
                if (adherent.nouveau == 1)
                    bloc += ";color:#39b3d7";
                bloc += "\"";
                bloc += ">"+adherent.prenom+" "+adherent.nom;
                if(adherent.nouveau == 1)
                    bloc += "&nbsp;&nbsp;&nbsp;<img src=\"lib/dn/img/ajouter-en-plus-icone-7864-128.png\" alt=\"Un adherent\" width=\"27\" height=\"27\">";
                bloc += "<span style=\"font-size:0.6em;color:grey\">&nbsp;&nbsp;&nbsp;---&nbsp;&nbsp;&nbsp;"+adherent.entreprise+"</span>";
                bloc += "</p>";                
                bloc += "</blockquote>";
                return bloc;
            }
        </script>
    </body>
</html>