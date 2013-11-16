<?php

require_once('controller/Adherent.php');

class AdherentTest extends PHPUnit_Framework_TestCase {
    public function setUp(){
        $this->adherent = new Adherent('Philippe', 'Dupont', 15);
    }
    
    public function testJePeuxRecupererLesInfosDUnAdherent() {        
        $this->assertEquals('Philippe', $this->adherent->getNom());
        $this->assertEquals('Dupont', $this->adherent->getPrenom());
        $this->assertEquals(15, $this->adherent->getIdEntreprise());
    }
    
    private $adherent;
}