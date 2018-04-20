<?php

namespace app\widgets\menu;


use ishop\Cache;
use RedBeanPHP\R;

class Menu
{
    protected $data;
    protected $tree;
    protected $tpl;
    protected $menuHtml;
    protected $cache = 3600;
    protected $cacheKey = 'ishop_menu';
    protected $container = 'ul';
    protected $table = 'category';
    protected $attr;
    protected $prepenh;

    public function __construct($options)
    {
        $this->tpl = __DIR__ . '/menu_tpl/menu_tpl.php';
        $this->setOption($options);

        $this->run();
    }

    public function setOption($options = []) {
        foreach ($options as $k => $v) {
            if (property_exists($this, $k)) {
                $this->$k = $v;
            }
        }
    }

    protected function run() {

    }

    public function select() {
        if(!$cats = Cache::get($this->cacheKey)) {
            $cats = R::getAssoc("SELECT * FROM {$this->table}");
            Cache::set($this->cacheKey, $cats);
        }
        return $cats;
    }
}