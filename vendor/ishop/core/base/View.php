<?php

namespace ishop\base;


class View {
    use TPropertis;

    public function __construct($route, $view, $leyout, $meta) {
        $this->route = $route;
        $this->controller = $route['controller'];
        $this->prefix = $route['prefix'];
        $this->view = $view;
        $this->meta = $meta;
        if($leyout === false){
            $this->leyout = false;
        } else {
            $this->leyout = $leyout ?: LAYOUT;
        }
    }

    protected function getMeta() {
        $keywords = (!empty($this->meta['keyword'])) ? $this->meta['keyword'] : '';
        $desc = (!empty($this->meta['desc'])) ? $this->meta['desc'] : '';
        $title = (!empty($this->meta['title'])) ? $this->meta['title'] : '';

        $meta = '';
        $meta .= "<meta name='keywords' content='{$keywords}' />\n";
        $meta .= "<meta name='description' content='{$desc}' />\n";
        $meta .= "<title>{$title}</title>";
        return $meta;
    }

    public function render($data) {
        extract($data);
        $view_template = APP . "/views/{$this->prefix}{$this->controller}/{$this->view}.php";

        if( file_exists($view_template) ) {
            ob_start();
            require_once $view_template;
            $content = ob_get_clean();
        } else {
            throw new \Exception( "Немоє такого виду", 404 );
        }

        $meta = $this->getMeta();

        if($this->leyout !== false) {
            $leyout_template = APP . "/views{$this->prefix}/leyouts/{$this->leyout}.php";
            if (file_exists($leyout_template)) {
                require_once $leyout_template;
            }
        }
    }
}