<?php

require_once(BASE_PATH . 'controllers/admin/backend.php');
require_once(BASE_PATH . 'models/category_model.php');

class Category extends Backend {

    function __construct() {

        parent::__construct();

        $this->model = new CategoryModel();
    }
}