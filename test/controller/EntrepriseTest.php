<?php

require_once('controller/Entreprise.php');

class EntrepriseTest extends PHPUnit_Framework_TestCase {
    public function setUp(){
        $this->entreprise = new Entreprise('IBM');
    }
    
    public function testJePeuxRecupererLeNomDeLEntreprise() {        
        $this->assertEquals('IBM', $this->entreprise->getNom());
        
        $this->entreprise = new Entreprise('EPSI');
        $this->assertEquals('EPSI', $this->entreprise->getNom());
    }
    
    private $entreprise;
}