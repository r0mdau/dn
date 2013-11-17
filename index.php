<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta charset="utf-8">
        <title>Adhésion Destinées Numériques</title>
        <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-md-4 col-md-offset-4">
                    <h2 class="align-center">Formulaire d'adhésion</h2><br>
                    <form class="form-horizontal" role="form" method="post" action="post.php">
                        <div class="form-group">
                            <label for="inputPrenom" class="col-sm-3 control-label">Prénom</label>
                            <div class="col-sm-9">
                                <input type="text" name="prenom" class="form-control" id="inputPrenom" placeholder="Prénom">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputNom" class="col-sm-3 control-label">Nom</label>
                            <div class="col-sm-9">
                                <input type="text" name="nom" class="form-control" id="inputNom" placeholder="Nom">
                            </div>
                        </div>                        
                        <div class="form-group">
                            <label for="inputEntreprise" class="col-sm-3 control-label">Entreprise</label>
                            <div class="col-sm-9">
                                <input type="text" name="entreprise" class="form-control" id="inputEntreprise" placeholder="Entreprise">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-info">Adhérer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>  
    </body>
</html>