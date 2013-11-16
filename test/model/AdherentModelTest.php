<?php

require_once('autoload.php');

class AdherentModelTest extends PHPUnit_Framework_TestCase {
    public function setUp(){
        $this->entreprise = new Entreprise('IBM');
        $this->adherent = new Adherent('Philippe', 'Dupont', 15);
    }
    
    public function tearDown(){
        Db::query('TRUNCATE TABLE adherent');
        Db::query('DELETE FROM entreprise');
        Db::query('ALTER TABLE  entreprise AUTO_INCREMENT =1');
    }
    
    public function testJePeuxAjouterUnAdherent() {
        EntrepriseModel::add($this->entreprise);
        $idEntreprise = EntrepriseModel::getLastId();
        $this->adherent->setIdEntreprise($idEntreprise);
        $this->assertTrue(AdherentModel::add($this->adherent));
    }
    
    private $adherent;
    private $entreprise;
}