<?php

require_once(BASE_PATH . 'controllers/admin/backend.php');
require_once(BASE_PATH . 'models/user_app_model.php');

class User_app extends Backend {

    function __construct() {

        parent::__construct();

        $this->model = new UserAppModel();
    }

    function retrieve_password() {

        $result = $this->model->retrieve_password();

        if($result) {

            $this->layout->json(array('status' => 'success', 'message' => lang('Password data sent to your email')));

        } else {

            $this->layout->json(array('status' => 'error', 'message' => lang('Email address not found')));
        }
    }
}