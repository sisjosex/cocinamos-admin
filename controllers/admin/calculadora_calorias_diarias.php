<?php

require_once(BASE_PATH . 'controllers/admin/backend.php');
require_once(BASE_PATH . 'models/calculadora_calorias_diarias_model.php');

class Calculadora_calorias_diarias extends Backend {

    function __construct() {

        parent::__construct();

        $this->model = new Calculadora_calorias_diarias_Model();
    }
}