<?php
    class Secu
    {
        private static function parcourirTableauSecu($tableau, $fonction){
            foreach($tableau as $val=>$key){
                if(is_array($val))
                    self::parcourirTableauSecu($val, $fonction);
                else
                    $tableau[$val]=$fonction($key);
            }
            return $tableau;
        }
        
        public static function secuEntreeBDD($tab){
            self::$db=Db::connect();
            $tab=self::secuMySql($tab);
            self::$db=Db::disconnect();
            return $tab;
        }
        
        public static function secuMySql($tableau){
            if(is_array($tableau))
                $tableau=self::parcourirTableauSecu($tableau, 'mysql_real_escape_string');
            else
                $tableau=mysqli_real_escape_string($tableau);
            return $tableau;
        }
        
        public static function regexMail($mail){
            return preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $mail);
        }
        
        private static $db;
    }
?>
