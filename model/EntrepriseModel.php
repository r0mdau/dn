<?php
    class EntrepriseModel
    {
        public static function add($entreprise){
            self::$lastId = Db::queryGetId(   'INSERT INTO entreprise (nom)
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
            $var = Db::querySingle('SELECT id FROM entreprise WHERE nom=\''.$entreprise.'\'');
            return isset($var->id);
        }
        
        private static $lastId;
    }