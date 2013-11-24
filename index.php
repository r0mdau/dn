<?php
session_start();
require_once('autoload.php');
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta charset="utf-8">
        <title>Destinées Numériques</title>
        <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="lib/dn/css/dn.css">
        <link rel="stylesheet" href="lib/twitter/css/typeahead.js-bootstrap.css">            
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-8 col-md-offset-2">
                    <img src="lib/dn/img/Logo_DN3.jpg" alt="Logo destinées numériques" class="img-responsive">
                    <h2 class="align-center col-sm-offset-3">Demain, on lance le pôle</h2><br>
                    <form class="form-horizontal" role="form" method="post" action="post.php">
                        <div class="form-group">
                            <label for="inputPrenom" class="col-sm-3 control-label">Prénom</label>
                            <div class="col-sm-6">
                                <input type="text" name="prenom" class="form-control" maxlength="50" id="inputPrenom" placeholder="Prénom" value="<?=(isset($_SESSION['prenom']) ? $_SESSION['prenom'] : '')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputNom" class="col-sm-3 control-label">Nom</label>
                            <div class="col-sm-6">
                                <input type="text" name="nom" class="form-control" maxlength="50" id="inputNom" placeholder="Nom" value="<?=(isset($_SESSION['nom']) ? $_SESSION['nom'] : '')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputMail" class="col-sm-3 control-label">E-mail</label>
                            <div class="col-sm-6">
                                <input type="text" name="mail" class="form-control" maxlength="50" id="inputMail" placeholder="E-mail" value="<?=(isset($_SESSION['mail']) ? $_SESSION['mail'] : '')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEntreprise" class="col-sm-3 control-label">Entreprise</label>
                            <div class="col-sm-6">
                                <input type="text" name="entreprise" class="form-control" maxlength="50" id="inputEntreprise" placeholder="Entreprise" value="<?=(isset($_SESSION['entreprise']) ? $_SESSION['entreprise'] : '')?>">
                            </div>
                        </div>                        
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-info">Je signe</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="lib/jquery/js/jquery-1.10.2.min.js"></script>
        <script src="lib/twitter/js/typeahead.min.js"></script>
        <?php
            if(isset($_SESSION['nom'])){
                echo '<script src="lib/dn/js/errorsInForm.js"></script>';
            }
        ?>
        <script>            
            $(document).ready(function(){                
                $('input#inputEntreprise').typeahead({                                   
                    name: 'entreprises',                                                             
                    local: [
                        <?=EntrepriseModel::getAllToTypeahead();?>
                    ]                                                                           
                });
                $('.tt-hint').hide();
                $('.twitter-typeahead').attr('style', 'width:100%');
            });            
        </script>
    </body>
</html>
