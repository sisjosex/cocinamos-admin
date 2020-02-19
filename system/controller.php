<?php

require_once(BASE_PATH . '/system/view.php');

class Controller {

    var $model;
    var $view;
    var $settings = array(
        'urls' => array(
            'add' => 'add',
            'edit' => 'edit',
            'save' => 'save'
        )
    );
    var $lang = 'es';

    function __construct() {

        $this->view = new View();
	
	if(isset( $_GET['lang'] ) ) {
            $this->lang = $_GET['lang'];
        }
    }

    function setFlash($key, $value) {
        setcookie( $key, $value, (time() + 3600 * 1), '/' );
    }
}
