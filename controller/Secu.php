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
        
        private static $db;
    }
?>
