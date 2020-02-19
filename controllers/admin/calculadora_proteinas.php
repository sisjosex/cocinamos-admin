<?php

require_once(BASE_PATH . 'controllers/admin/backend.php');
require_once(BASE_PATH . 'models/calculadora_proteinas_model.php');

class Calculadora_proteinas extends Backend {

    function __construct() {

        parent::__construct();

        $this->model = new Calculadora_proteinas_Model();
    }
}