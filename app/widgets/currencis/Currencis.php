<?php

namespace app\widgets\currencis;


use ishop\App;
use RedBeanPHP\R;

class Currencis
{
    protected $tpl;
    protected $currencis;
    protected $currenci;
    protected $widget;

    public function __construct()
    {
        $this->tpl = __DIR__ . '/currencis_tpl/currencis.php';
        $this->run();
        echo $this->widget;
    }

    protected function run() {
        $currencis = App::$app->getProperty('currencis');
        $currenci = App::$app->getProperty('currenci');
        $this->getHtml($currencis, $currenci);
    }

    protected function getHtml($currencis, $currenci) {
        ob_start();
        require_once $this->tpl;
        $this->widget = ob_get_clean();
    }

    public static function getCurrencis(){
        return R::getAssoc("SELECT code, title, symbol_left, symbol_right, value, base FROM currency ORDER BY base DESC");
    }

    public static function getCurrenci($currencis){
        if( isset( $_COOKIE['currenci'] ) && array_key_exists( $_COOKIE['currenci'], $currencis ) ) {
            $key = $_COOKIE['currenci'];
        } else {
            $key = key( $currencis );
        }
        $currencis[$key]['code'] = $key;
        return $currencis[$key];
    }
}
