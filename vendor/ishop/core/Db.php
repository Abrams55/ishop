<?php

namespace ishop;

use RedBeanPHP\R;

class Db
{
    use TSingletone;

    public function __construct()
    {
        $db_config = require_once CONF . '/config_db.php';
        class_alias('\RedBeanPHP\R','\R');
        R::setup($db_config['dsn'], $db_config['user'], $db_config['pass']);

        if(!R::testConnection()){
            throw new \Exception('НЕ вдалося підєднатись до DB', 500);
        }
        R::freeze(true);

        if (DEBUG) {
            R::debug(true, 1);
        }
    }
}