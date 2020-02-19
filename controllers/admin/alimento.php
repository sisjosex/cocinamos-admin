<?php

require_once(BASE_PATH . 'controllers/admin/backend.php');
require_once(BASE_PATH . 'models/alimento_model.php');

class Alimento extends Backend {

    function __construct() {

        parent::__construct();

        $this->model = new AlimentoModel();
    }
}