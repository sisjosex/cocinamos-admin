<?php

require_once(BASE_PATH . 'controllers/admin/backend.php');
require_once(BASE_PATH . 'models/food_step_media_model.php');

class Food_step_media extends Backend {

    function __construct() {

        parent::__construct();

        $this->model = new FoodStepMediaModel();
    }
}