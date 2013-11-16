<?php

require_once('autoload.php');

class EntrepriseModelTest extends PHPUnit_Framework_TestCase {
    public function setUp(){
        $this->entreprise = new Entreprise('IBM');
    }
    
    public function tearDown(){
        Db::query('TRUNCATE table adherent');
        Db::query('DELETE FROM entreprise');
    }
    
    public function testJePeuxAjouterUneEntreprise() {
        $this->assertTrue(EntrepriseModel::add($this->entreprise));
    }
    
    private $adherent;
}