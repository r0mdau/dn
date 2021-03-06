<?php
    function loadDir($dir){        
        if ($dh = opendir($dir)) {
            while (($file = readdir($dh)) !== false) {
                if(strpos($file, '.php') !== false){
                    require_once($dir.$file);
                }else if(is_dir($dir.$file) AND $file != '..' AND $file != '.'){
                    loadDir($dir.$file.'/');
                }
            }
            closedir($dh);
        }
    }

    function autoload(){
        require_once(__DIR__.'/settings.php');
        loadDir(__DIR__.'/model/');
        loadDir(__DIR__.'/controller/');
    }
    spl_autoload_register('autoload');