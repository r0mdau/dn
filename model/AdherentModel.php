<?php
    class AdherentModel
    {
        public static function add($adherent){
            return Db::query('INSERT INTO adherent (nom, prenom, id_entreprise)
                      VALUES (\''.$adherent->getNom().'\', \''.$adherent->getPrenom().'\', \''.$adherent->getIdEntreprise().'\')');
        }
        
        public static function get($id = 0){
            $res = Db::querySingle('SELECT * FROM adherent WHERE id='.$id);
            return isset($res->id) ? new Adherent($res->id, $res->prenom, $res->nom, $res->id_entreprise, $res->etat, $res->date) : '';
        }
        
        public static function nombreTotal(){
            $res = Db::querySingle('SELECT COUNT(*) nb FROM adherent');
            return isset($res->nb) ? $res->nb : 0;
        }
        
        public static function changeEtat($id, $etat){
            return Db::query('UPDATE adherent SET etat='.$etat.' WHERE id='.$id);
        }
    }