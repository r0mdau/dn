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
        
        public static function getPremierNouveau(){
            $res = Db::querySingle('SELECT * FROM adherent WHERE etat=1 ORDER BY date LIMIT 1');
            if(isset($res->id)){
                self::changeEtat($res->id, 0);
                return new Adherent($res->id, $res->prenom, $res->nom, $res->id_entreprise, $res->etat, $res->date);
            }else return null;
        }
        
        public static function getPremierNouveauEnJson(){
            $res = Db::queryArray('SELECT * FROM adherent WHERE etat=1 ORDER BY date LIMIT 1');
            if(isset($res[0]['id'])){
                self::changeEtat($res[0]['id'], 0);
                $res[0]['entreprise'] = EntrepriseModel::get($res[0]['id_entreprise'])->getNom();
                return json_encode($res[0]);
            }else return null;            
        }
        
        public static function nombreTotal(){
            $res = Db::querySingle('SELECT COUNT(*) nb FROM adherent');
            return isset($res->nb) ? $res->nb : 0;
        }
        
        public static function nombreTotalNouveaux(){
            $res = Db::querySingle('SELECT COUNT(*) nb FROM adherent WHERE etat=1');
            return isset($res->nb) ? $res->nb : 0;
        }
        
        public static function changeEtat($id, $etat){
            return Db::query('UPDATE adherent SET etat='.$etat.' WHERE id='.$id);
        }
    }