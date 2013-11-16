<?php
class Entreprise{
    public function __construct($nom){
        $this->nom = $nom;
    }
    
    public function getNom(){
        return $this->nom;
    }
    
    private $nom;
}