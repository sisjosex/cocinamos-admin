<?php

require_once(BASE_PATH . 'controllers/admin/backend.php');
require_once(BASE_PATH . 'models/subcategory_model.php');

class Subcategory extends Backend {

    function __construct() {

        parent::__construct();

        $this->model = new SubcategoryModel();
    }
}