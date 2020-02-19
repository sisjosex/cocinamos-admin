<?php

require_once(BASE_PATH . 'controllers/admin/backend.php');
require_once(BASE_PATH . 'models/medidas_model.php');

class Medidas extends Backend {

    function __construct() {

        parent::__construct();

        $this->model = new MedidasModel();
    }
}