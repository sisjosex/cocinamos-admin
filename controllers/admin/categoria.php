<?php

require_once(BASE_PATH . 'controllers/admin/backend.php');
require_once(BASE_PATH . 'models/categoria_model.php');

class Categoria extends Backend {

    function __construct() {

        parent::__construct();

        $this->model = new CategoriaModel();
    }
}