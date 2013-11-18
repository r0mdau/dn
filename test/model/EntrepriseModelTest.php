<?php

require_once('autoload.php');

class EntrepriseModelTest extends PHPUnit_Framework_TestCase {
    public function setUp(){
        $this->entreprise = new Entreprise('IBM');        
    }
    
    public function tearDown(){
        Db::query('TRUNCATE table adherent');
        Db::query('DELETE FROM entreprise');
        Db::query('ALTER TABLE  entreprise AUTO_INCREMENT =1');
    }
    
    public function testJePeuxAjouterUneEntreprise() {
        $this->assertTrue(EntrepriseModel::add($this->entreprise));
    }
    
    public function testJePeuxSavoirSiUneEntrepriseExiste(){
        EntrepriseModel::add($this->entreprise);
        $this->assertTrue(!EntrepriseModel::exist('EPSI'));
        $this->assertTrue(EntrepriseModel::exist('IBM'));
        
        $this->entreprise = new Entreprise('EPSI');
        EntrepriseModel::add($this->entreprise);
        $this->assertTrue(EntrepriseModel::exist('EPSI'));
    }
    
    public function testJePeuxRecupereLIdDUneEntreprise(){
        EntrepriseModel::add($this->entreprise);
        $this->assertEquals(1, EntrepriseModel::getId('IBM'));
        
        $this->entreprise = new Entreprise('EPSI');
        EntrepriseModel::add($this->entreprise);
        $this->assertEquals(2, EntrepriseModel::getId('EPSI'));
    }
    
    public function testJePeuxRécupérerLeNomDUneEntreprise(){
        EntrepriseModel::add($this->entreprise);
        $entreprise = EntrepriseModel::get(EntrepriseModel::getId($this->entreprise->getNom()));
        $this->assertTrue($entreprise instanceof Entreprise);
        $this->assertEquals('IBM', $entreprise->getNom());
    }
    
    private $adherent;
}
