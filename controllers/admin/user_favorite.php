<?php

require_once(BASE_PATH . 'controllers/admin/backend.php');
require_once(BASE_PATH . 'models/user_favorite_model.php');

class User_favorite extends Backend {

    function __construct() {

        parent::__construct();

        $this->model = new UserFavoriteModel();
    }
}