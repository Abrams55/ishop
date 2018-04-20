<?php

namespace app\controllers;

use ishop\App;

class CurrencisController extends AppController
{
    public function changeAction() {
        $code = ( ! empty( $_POST['currenci'] ) ) ? htmlspecialchars($_POST['currenci']) : null;
        $html = '';

        if($code) {
            $currencis = App::$app->getProperty('currencis');
            if(array_key_exists($code, $currencis)) {
                setcookie( 'currenci', $code, time() + 60*60*60*24*7, '/' );
            }

            foreach ($currencis as $key => $currenci ) {
                $html .= '<option '.selected($key, $code).' value="'.$key.'">'.$key.'</option>';
            }
        }
        echo $html;
        die;
    }
}