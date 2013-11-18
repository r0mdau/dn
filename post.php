<?php
    session_start();
    require_once('autoload.php');
        
    if(formulaireComplet($_POST)){
        $_SESSION = array();
        $_POST = Secu::secuMySql($_POST);        
        $entreprise = new Entreprise($_POST['entreprise']);
        
        if(!EntrepriseModel::exist($_POST['entreprise'])){            
            EntrepriseModel::add($entreprise);
            $entreprise_id = EntrepriseModel::getLastId();
        }else{
            $entreprise_id = EntrepriseModel::getId($_POST['entreprise']);
        }
        
        $adherent = new Adherent(0, $_POST['prenom'], $_POST['nom'], $entreprise_id);
        if(AdherentModel::add($adherent)){
            header('Location:merci');
        }else{
            header('Location:erreur');
        }
    }else{
        if(isset($_POST['prenom']) OR !empty($_POST['prenom']))
            $_SESSION['prenom'] = $_POST['prenom'];
        if(isset($_POST['nom']) OR !empty($_POST['nom']))
            $_SESSION['nom'] = $_POST['nom'];
        if(isset($_POST['entreprise']) OR !empty($_POST['entreprise']))
            $_SESSION['entreprise'] = $_POST['entreprise'];
        header('Location:accueil');
    }
    exit;
    
    function formulaireComplet($array){
        return  isset($array['prenom']) AND isset($array['nom']) AND isset($array['entreprise']) AND
                !empty($array['prenom']) AND !empty($array['nom']) AND !empty($array['entreprise']);
    }
