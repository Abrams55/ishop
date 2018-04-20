<?php

namespace app\controllers;


use ishop\base\Controller;
use RedBeanPHP\R;

class MainController extends AppController {
    public function indexAction(){
        $this->setMeta('111', '222', '333');
        $brands = R::find('brand', 'LIMIT 3');
        $hit_product = R::find('product', "status = '1' AND hit = '1' LIMIT 8");
        $this->setData(compact('brands', 'hit_product'));
        $this->getView();
    }

}