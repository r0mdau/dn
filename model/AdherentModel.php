<?php
    class AdherentModel
    {
        public static function add($adherent){
            return Db::query('INSERT INTO adherent (nom, prenom, id_entreprise, mail)
                      VALUES (\''.$adherent->getNom().'\', \''.$adherent->getPrenom().'\', \''.$adherent->getIdEntreprise().'\', \''.$adherent->getMail().'\')');
        }
        
        public static function get($id = 0){
            $res = Db::querySingle('SELECT * FROM adherent WHERE id='.$id);
            return isset($res->id) ? new Adherent($res->id, $res->prenom, $res->nom, $res->id_entreprise, $res->etat, $res->parution) : '';
        }
        
        public static function getPremierNouveau(){
            $res = Db::querySingle('SELECT * FROM adherent WHERE etat=1 ORDER BY date LIMIT 1');
            if(isset($res->id)){
                self::changeEtat($res->id, 0);
                return new Adherent($res->id, $res->prenom, $res->nom, $res->id_entreprise, $res->etat, $res->date);
            }else return '';
        }
        
        public static function getEnJson($res){
            self::changeEtat($res[0]['id'], 0);
            self::incrementeParution($res[0]['id']);
            self::onScreen($res[0]['id']);
            $res[0]['entreprise'] = EntrepriseModel::get($res[0]['id_entreprise'])->getNom();            
            return $res[0];
        }
        
        public static function getPremierNouveauEnJson(){
            $res = Db::queryArray('SELECT * FROM adherent WHERE etat=1 ORDER BY date LIMIT 1');
            if(isset($res[0]['id'])){
                $res[0]['nouveau'] = 1;
                return json_encode(self::getEnJson($res));
            }else return '';            
        }
        
        public static function getPremierNouveauEnJsonMoinsParu(){
            $res = Db::queryArray('SELECT * FROM adherent WHERE etat=0 AND on_screen = 0 ORDER BY parution, date LIMIT 1');
            if(isset($res[0]['id'])){
                return json_encode(self::getEnJson($res));
            }else return '';            
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
        
        public static function incrementeParution($id){
            return Db::query('UPDATE adherent SET parution=parution+1 WHERE id='.$id);
        }
        
        public static function onScreen($id){
            return Db::query('UPDATE adherent SET on_screen=1 WHERE id='.$id);
        }
        
        public static function offScreen($id){
            return Db::query('UPDATE adherent SET on_screen=0 WHERE id='.$id);
        }
    }