<?php

require_once(BASE_PATH . 'controllers/admin/backend.php');
require_once(BASE_PATH . 'models/ingredient_model.php');

class Ingredient extends Backend {

    function __construct() {

        parent::__construct();

        $this->model = new IngredientModel();
    }
}