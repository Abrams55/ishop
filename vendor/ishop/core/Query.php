<?php

namespace ishop;


class Query
{
    protected static $queryParams = [];

    use TSingletone;

    public static function getQueryParams($name){
        if(!empty($queryParams = self::$queryParams[$name])) {
            return $queryParams;
        }
        return null;
    }

    public static function setQueryParams($name, $val){
        self::$queryParams[$name] = $val;
    }

    public static function getQueryVars() {
        return self::$queryParams;
    }
}