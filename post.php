<?php
    require_once('autoload.php');
        
    if(formulaireComplet($_POST)){
        $_POST = Secu::secuMySql($_POST);
        
        if(!EntrepriseModel::exist($_POST['entreprise'])){
            EntrepriseModel::add($_POST['entreprise']);
            $entreprise_id = EntrepriseModel::getLastId();
        }else{
            $entreprise_id = EntrepriseModel::getId($_POST['entreprise']);
        }
        
        $adherent = new Adherent($_POST['prenom'], $_POST['nom'], $entreprise_id);
        if(AdherentModel::add($adherent)){
            header('Location:merci');
        }else{
            header('Location:erreur');
        }
        exit;
    }
    
    function formulaireComplet($array){
        return  isset($array['prenom']) AND isset($array['nom']) AND isset($array['entreprise']) AND
                !empty($array['prenom']) AND !empty($array['nom']) AND !empty($array['entreprise']);
    }