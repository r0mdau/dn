<?php

require_once('autoload.php');

class AdherentModelTest extends PHPUnit_Framework_TestCase {
    public function setUp(){
        $this->entreprise = new Entreprise('IBM');
        $this->adherent = new Adherent(1, 'Philippe', 'Dupont', 15);
        
        EntrepriseModel::add($this->entreprise);
        $idEntreprise = EntrepriseModel::getLastId();
        $this->adherent->setIdEntreprise($idEntreprise);
        AdherentModel::add($this->adherent);
    }
    
    public function tearDown(){
        Db::query('TRUNCATE TABLE adherent');
        Db::query('DELETE FROM entreprise');
        Db::query('ALTER TABLE  entreprise AUTO_INCREMENT =1');
    }
    
    public function testJePeuxAjouterUnAdherent() {
        $this->assertTrue(AdherentModel::add($this->adherent));
    }
    
    public function testJePeuxRecupererUnAdherent(){
        $adherent = AdherentModel::get($this->adherent->getId());
        $this->assertTrue($adherent instanceof Adherent);
        $this->assertEquals('Dupont', $adherent->getNom());
    }
    
    public function testJePeuxRecupererLeNombreDAdherents(){
        $this->assertEquals(1, AdherentModel::nombreTotal());
        
        AdherentModel::add($this->adherent);
        $this->assertEquals(2, AdherentModel::nombreTotal());
    }
    
    public function testJePeuxChangerLEtatDUnAdherent(){
        $adherent = AdherentModel::get($this->adherent->getId());
        $this->assertEquals(1, $adherent->getEtat());
        
        AdherentModel::changeEtat($adherent->getId(), 0);
        $adherent = AdherentModel::get($this->adherent->getId());
        $this->assertEquals(0, $adherent->getEtat());
    }
    
    public function testJePeuxIncrementerLeNombreDeParutionDeLAdherent(){
        $adherent = AdherentModel::get($this->adherent->getId());
        $this->assertEquals(0, $adherent->getParution());
        
        AdherentModel::incrementeParution($adherent->getId());
        $adherent = AdherentModel::get($this->adherent->getId());
        $this->assertEquals(1, $adherent->getParution());
    }
    
    public function testParmisLesNouveauxAdherentsJePeuxRecupererLePremierInscrit(){
        $adherent = new Adherent(2, 'Georges', 'Lucas', $this->adherent->getIdEntreprise());
        AdherentModel::add($this->adherent);
        $premierInscrit = AdherentModel::getPremierNouveau();
        $this->assertEquals('Dupont', $premierInscrit->getNom());
    }
    
    public function testJePeuxRecupererLeNombreDeNouveauxAdherents(){
        $this->assertEquals(1, AdherentModel::nombreTotalNouveaux());
        $adherent = new Adherent(2, 'Georges', 'Lucas', $this->adherent->getIdEntreprise());
        AdherentModel::add($this->adherent);
        $this->assertEquals(2, AdherentModel::nombreTotalNouveaux());
    }
    
    private $adherent;
    private $entreprise;
}