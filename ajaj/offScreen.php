<?php
    require_once('../autoload.php');
    if(isset($_POST['id']) AND !empty($_POST['id'])){
        $id = (int) $_POST['id'];
        AdherentModel::offScreen($id);
    }