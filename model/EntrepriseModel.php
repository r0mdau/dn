<?php
    class EntrepriseModel
    {
        public static function add($entreprise){
            self::$lastId = Db::queryGetId( 'INSERT INTO entreprise (nom)
                                            VALUES (\''.$entreprise->getNom().'\')');
            if(self::$lastId != false)
                return true;
            else
                return false;
        }
        
        public static function getLastId(){
            return self::$lastId;
        }
        
        public static function exist($entreprise){
            $res = Db::querySingle('SELECT id FROM entreprise WHERE nom=\''.$entreprise.'\'');
            return isset($res->id);
        }
        
        public static function get($id){
            $res = Db::querySingle('SELECT * FROM entreprise WHERE id=\''.$id.'\'');
            if(isset($res->id)){
                return new Entreprise($res->nom);
            }else return null;
        }
        
        public static function getId($entreprise){
            $res = Db::querySingle('SELECT id FROM entreprise WHERE nom=\''.$entreprise.'\'');
            return isset($res->id) ? $res->id : null;
        }
        
        public static function getAllToTypeahead(){
            $var = '';
            $res = Db::queryObject('SELECT nom FROM entreprise');
            if(isset($res[0])){
                foreach($res as $entreprise){
                    $var .= '"'.$entreprise->nom.'",';
                }
            }            
            $var = substr($var, 0, -1);
            return $var;
        }        
        
        private static $lastId;
    }