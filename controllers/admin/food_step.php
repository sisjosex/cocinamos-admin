<?php

require_once(BASE_PATH . 'controllers/admin/backend.php');
require_once(BASE_PATH . 'models/food_step_model.php');

class Food_step extends Backend {

    function __construct() {

        parent::__construct();

        $this->model = new FoodStepModel();
    }
}