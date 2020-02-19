<?php

require_once(BASE_PATH . 'system/controller.php');

class Home extends Controller
{


    function __construct()
    {

        parent::__construct();
    }
    /*
    function email_verify()
    {
        $this->view->add('email/user-account_verify', array());
        $this->view->render();
    }

    function email_forgot()
    {
        $this->view->add('email/user-forgotpass', array());
        $this->view->render();
    }

    function email_admin()
    {
        $this->view->add('email/admin-account_verify_copy', array());
        $this->view->render();
    }*/
}