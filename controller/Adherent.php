<?php
class Adherent{
    public function __construct($nom, $prenom, $idEntreprise){
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->idEntreprise = $idEntreprise;
    }
    
    public function getNom(){
        return $this->nom;
    }
    
    public function getPrenom(){
        return $this->prenom;
    }
    
    public function getIdEntreprise(){
        return $this->idEntreprise;
    }
    
    public function setIdEntreprise($id){
        $this->idEntreprise = $id;
    }
    
    private $nom;
    private $prenom;
    private $idEntreprise;
}