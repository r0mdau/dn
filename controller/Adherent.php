<?php
class Adherent{
    public function __construct($id, $prenom, $nom, $idEntreprise, $etat = 1, $parution = 0){
        $this->id = $id;
        $this->prenom = $prenom;
        $this->nom = $nom;        
        $this->idEntreprise = $idEntreprise;
        $this->etat = $etat;
        $this->parution = $parution;
    }
    
    public function getId(){
        return $this->id;
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
    
    public function getEtat(){
        return $this->etat;
    }
    
    public function setEtat($etat){
        $this->etat = $etat;
    }
    
    public function getParution(){
        return $this->parution;
    }
    
    public function setParution($nombre){
        $this->parution = $nombre;
    }
    
    private $id;
    private $prenom;
    private $nom;    
    private $idEntreprise;
    private $etat;          // 1 pour nouvel inscrit
    private $parution;
}