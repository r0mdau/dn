<?php
    class AdherentModel
    {
        public static function add($adherent){
            return Db::query('INSERT INTO adherent (prenom, nom, id_entreprise)
                      VALUES (\''.$adherent->getNom().'\', \''.$adherent->getPrenom().'\', \''.$adherent->getIdEntreprise().'\')');
        }
        
        public static function nombreTotal(){
            $res = Db::querySingle('SELECT COUNT(*) nb FROM adherent');
            return isset($res->nb) ? $res->nb : 0;
        }
    }