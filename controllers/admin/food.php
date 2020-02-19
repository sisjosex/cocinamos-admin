<?php

require_once(BASE_PATH . 'controllers/admin/backend.php');
require_once(BASE_PATH . 'models/food_model.php');

class Food extends Backend {

    function __construct() {

        parent::__construct();

        $this->model = new FoodModel();
    }
}