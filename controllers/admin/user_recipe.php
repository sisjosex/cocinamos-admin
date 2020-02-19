<?php

require_once(BASE_PATH . 'controllers/admin/backend.php');
require_once(BASE_PATH . 'models/user_recipe_model.php');

class User_recipe extends Backend {

    function __construct() {

        parent::__construct();

        $this->model = new UserRecipeModel();
    }
}