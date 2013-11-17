<?php

require_once('controller/Adherent.php');

class AdherentTest extends PHPUnit_Framework_TestCase {
    public function setUp(){
        $this->adherent = new Adherent(1, 'Philippe', 'Dupont', 15);
    }
    
    public function testJePeuxRecupererLIdDUnAdherent() {
        $this->assertEquals(1, $this->adherent->getId());
        
        $this->adherent = new Adherent(2, 'Georges', 'Lucas', 1);
        $this->assertEquals(2, $this->adherent->getId());
    }
    
    public function testJePeuxRecupererLePrenomDUnAdherent() {
        $this->assertEquals('Philippe', $this->adherent->getPrenom());
        
        $this->adherent = new Adherent(2, 'Georges', 'Lucas', 1);
        $this->assertEquals('Georges', $this->adherent->getPrenom());
    }
    
    public function testJePeuxRecupererLeNomDUnAdherent() {
        $this->assertEquals('Dupont', $this->adherent->getNom());
        
        $this->adherent = new Adherent(2, 'Georges', 'Lucas', 1);
        $this->assertEquals('Lucas', $this->adherent->getNom());
    }
    
    public function testJePeuxRecupererLIdEntrepriseDUnAdherent() {
        $this->assertEquals(15, $this->adherent->getIdEntreprise());
        
        $this->adherent = new Adherent(2, 'Georges', 'Lucas', 1);
        $this->assertEquals(1, $this->adherent->getIdEntreprise());
    }
    
    public function testJePeuxRecupererLesInfosDUnAdherent() {
        $this->assertEquals(1, $this->adherent->getEtat());
        
        $this->adherent->setEtat(0);
        $this->assertEquals(0, $this->adherent->getEtat());
    }    
    
    public function testJePeuxRécupérerLEtatDunAdherent(){
        $this->assertEquals(1, $this->adherent->getEtat());
        
        $this->adherent = new Adherent(1, 'Philippe', 'Dupont', 15, 0);
        $this->assertEquals(0, $this->adherent->getEtat());
    }
    
    public function testJePeuxChangerLEtatDunAdherent(){
        $this->assertEquals(1, $this->adherent->getEtat());
        
        $this->adherent->setEtat(0);
        $this->assertEquals(0, $this->adherent->getEtat());
    }
    
    private $adherent;
}