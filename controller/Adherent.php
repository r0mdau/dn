<?php
class Adherent{
    public function __construct($id, $prenom, $nom, $idEntreprise, $etat = 1, $parution = 0){
        $this->id = $id;
        $this->prenom = $prenom;
        $this->nom = $nom;        
        $this->idEntreprise = $idEntreprise;
        $this->etat = $etat;
        $this->parution = $parution;
        $this->mail = '';
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
    
    public function getMail(){
        return $this->mail;
    }
    
    public function setMail($mail){
        $this->mail = $mail;
    }
    
    private $id;
    private $prenom;
    private $nom;
    private $mail;
    private $idEntreprise;
    private $etat;          // 1 pour nouvel inscrit
    private $parution;
}