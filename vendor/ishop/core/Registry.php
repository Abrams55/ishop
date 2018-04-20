<?php

namespace ishop;

use app\widgets\currencis\Currencis;

class Registry {

    use TSingletone;

    protected static $properties = [];
    protected static $widgets = [];

    public function setProperty($name, $value){
        self::$properties[$name] = $value;
    }

    public function getProperty($name){
        if(isset(self::$properties[$name])){
            return self::$properties[$name];
        }
        return null;
    }

    public function getProperties(){
        return self::$properties;
    }

    public function helperWidgets($name) {
        return new $name();
    }
}