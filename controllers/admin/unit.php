<?php

require_once(BASE_PATH . 'controllers/admin/backend.php');
require_once(BASE_PATH . 'models/unit_model.php');

class Unit extends Backend {

    function __construct() {

        parent::__construct();

        $this->model = new UnitModel();
    }
}