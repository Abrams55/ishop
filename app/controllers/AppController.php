<?php

namespace app\controllers;


use app\models\AppModel;
use app\widgets\currencis\Currencis;
use ishop\App;
use ishop\base\Controller;

class AppController extends Controller {
    public function __construct($route)
    {
        parent::__construct($route);
        new AppModel();
        App::$app->setProperty( 'currencis', Currencis::getCurrencis() );
        App::$app->setProperty('currenci', Currencis::getCurrenci(App::$app->getProperty('currencis')));
    }
}