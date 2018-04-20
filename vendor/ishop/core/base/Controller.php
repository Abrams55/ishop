<?php

namespace ishop\base;

abstract class Controller {
    use TPropertis;

    public function __construct($route) {
        $this->route = $route;
        $this->controller = $route['controller'];
        $this->prefix = $route['prefix'];
        $this->model = $route['controller'];
        $this->view = $route['action'];
    }

    public function getView() {
        $viewObj =  new View( $this->route, $this->view, $this->leyout, $this->meta );
        $viewObj->render($this->data);
    }

    public function setData($data) {
        $this->data = $data;
    }

    public function setMeta($title, $desc, $keyword) {
        $this->meta['title'] = $title;
        $this->meta['desc'] = $desc;
        $this->meta['keyword'] = $keyword;
    }
}