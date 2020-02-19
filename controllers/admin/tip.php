<?php

require_once(BASE_PATH . 'controllers/admin/backend.php');
require_once(BASE_PATH . 'models/tip_model.php');

class Tip extends Backend {

    function __construct() {

        parent::__construct();

        $this->model = new TipModel();
    }
}