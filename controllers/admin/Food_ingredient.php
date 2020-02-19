<?php

require_once(BASE_PATH . 'controllers/admin/backend.php');
require_once(BASE_PATH . 'models/food_ingredient_model.php');

class Food_ingredient extends Backend {

    function __construct() {

        parent::__construct();

        $this->model = new FoodIngredientModel();
    }
}