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
        
        private static $lastId;
    }