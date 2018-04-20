<?php

namespace ishop;


class Cache
{
    public static function get($name) {
        $file = CACHE . '/.' . md5( $name ) . 'txt';
        if (file_exists($file)){
            $data = unserialize(file_get_contents($file));
            if ( time() <= $data['time'] ) {
                return $data;
            }
            unlink($file);
        }
        return false;
    }

    public static function set($name, $data, $time = 3600) {
        if ($time) {
            $data_c['data'] = $data;
            $data_c['time'] = time() + $time;

            $fiel = CACHE . '/.' . md5( $name ) . 'txt';
            if (file_put_contents($fiel, serialize($data_c)) ){
                return true;
            }
        }
        return false;
    }

    public static function delete($name) {
        $file = CACHE . '/.' . md5( $name ) . 'txt';
        if (file_exists($file)) {
            unlink($file);
            return true;
        }
        return false;
    }
}