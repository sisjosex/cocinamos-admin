<?php

require_once(BASE_PATH . 'controllers/admin/backend.php');
require_once(BASE_PATH . 'models/calculadora_nutrientes_model.php');

class Calculadora_nutrientes extends Backend {

    function __construct() {

        parent::__construct();

        $this->model = new Calculadora_nutrientes_Model();
    }
}