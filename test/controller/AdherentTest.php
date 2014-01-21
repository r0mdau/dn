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
    
    public function testJePeuxRecupererLEtatDunAdherent(){
        $this->assertEquals(1, $this->adherent->getEtat());
        
        $this->adherent = new Adherent(1, 'Philippe', 'Dupont', 15, 0);
        $this->assertEquals(0, $this->adherent->getEtat());
    }
    
    public function testJePeuxRecupererLaParutionDunAdherent(){
        $this->assertEquals(0, $this->adherent->getParution());
        
        $this->adherent = new Adherent(1, 'Philippe', 'Dupont', 15, 0, 89);
        $this->assertEquals(89, $this->adherent->getParution());
    }
    
    public function testJePeuxChangerLEtatDunAdherent(){
        $this->assertEquals(1, $this->adherent->getEtat());
        
        $this->adherent->setEtat(0);
        $this->assertEquals(0, $this->adherent->getEtat());
    }
    
    public function testJePeuxChangerLaParutionDunAdherent(){
        $this->assertEquals(0, $this->adherent->getParution());
        
        $this->adherent->setParution(89);
        $this->assertEquals(89, $this->adherent->getParution());
    }
    
    public function testJePeuxChangerLeMailDunAdherent(){
        $this->assertEquals('', $this->adherent->getMail());
        
        $this->adherent->setMail('romain.dauby@epsi.fr');
        $this->assertEquals('romain.dauby@epsi.fr', $this->adherent->getMail());
    }
    
    private $adherent;
}
