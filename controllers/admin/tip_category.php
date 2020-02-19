<?php

require_once(BASE_PATH . 'controllers/admin/backend.php');

require_once(BASE_PATH . 'models/tip_category_model.php');

class Tip_category extends Backend {

    function __construct() {

        parent::__construct();

        $this->model = new TipCategoryModel();
    }
}