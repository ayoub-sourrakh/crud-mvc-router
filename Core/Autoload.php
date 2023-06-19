<?php 

class Autoload
{
    public static function inclusionAutomatique($className)
    {
        require_once ROOT_PATH . '/' . str_replace('\\', '/', $className . '.php');

    }
}
spl_autoload_register(array('Autoload', 'inclusionAutomatique'));