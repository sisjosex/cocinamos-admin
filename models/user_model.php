<?php

require_once(BASE_PATH . 'system/module.php');
require_once(BASE_PATH . 'system/auth.php');

class UserModel extends Module
{
    var $tempPassword;

    function __construct()
    {
        parent::__construct('user', 'id');

        $this->phisical_table = DB_PREFIX . 'user';

        $this->field_custom_name_dropdown = "CONCAT(user.first_name, ' ', user.last_name)";

        $this->addField(
            array(
                "key" => "id",
                "name" => lang("ID"),
                "type" => "hidden"
            )
        );

        $this->addField(
            array(
                "key" => "role",
                "name" => lang("ROLE"),
                "value" => "admin"
            )
        );

        $this->addField(
            array(
                "key" => "first_name",
                "comparator" => "LIKE",
                "name" => lang("Nombre"),
                "type" => "text",
                'validation' => array(
                    'rules' => array(
                        'required' => true
                    ),
                    'messages' => array(
                        'required' => lang('Nombre es requerido')
                    )
                ),
                'attr' => array(
                    array('name' => 'placeholder', 'value' => lang('Nombre') )
                ),
                "group" => "column1",
                "filtrable" => true
            )
        );

        $this->addField(
            array(
                "key" => "last_name",
                "comparator" => "LIKE",
                "name" => lang("Apellido"),
                "type" => "text",
                'validation' => array(
                    'rules' => array(
                        'required' => true
                    ),
                    'messages' => array(
                        'required' => lang('Apellido es requerido')
                    )
                ),
                'attr' => array(
                    array('name' => 'placeholder', 'value' => lang('Apellido') )
                ),
                "group" => "column1",
                "filtrable" => true
            )
        );

        $this->addField(
            array(
                "key" => "email",
                "comparator" => "LIKE",
                "name" => lang("Email"),
                "type" => "email",
                'validation' => array(
                    'rules' => array(
                        'required' => true,
                        'email' => true
                    ),
                    'messages' => array(
                        'required' => lang('Email es requerido'),
                        'email' => lang('Direccion de correo inválida')
                    )
                ),
                'attr' => array(
                    array('name' => 'autocomplete', 'value' => 'off'),
                    array('name' => 'placeholder', 'value' => lang('Email'))
                ),
                "group" => "column2",
                "filtrable" => true
            )
        );

        $this->addField(
            array(
                "key" => "password",
                "name" => lang("Contraseña"),
                "type" => "password",
                'validation' => array(
                    'rules' => array(
                        'required' => false
                    ),
                    'messages' => array(
                        'required' => lang('Contraseña es requerida')
                    )
                ),
                'attr' => array(
                    array('name' => 'autocomplete', 'value' => 'off'),
                    array('name' => 'placeholder', 'value' => lang('Contraseña'))
                ),
                "group" => "column2",
            )
        );

        $this->addField(
            array(
                "key" => "phone",
                "name" => lang("Teléfono"),
                "type" => "text",
                'validation' => array(
                    'rules' => array(
                        'required' => false
                    ),
                    'messages' => array(
                        'required' => lang('Teléfono es requerido')
                    )
                ),
                'attr' => array(
                    array('name' => 'placeholder', 'value' => lang('Teléfono') )
                ),
                "group" => "column2"
            )
        );

        $this->addField(
            array(
                "key" => "address",
                "name" => lang("Dirección"),
                "type" => "textarea",
                'attr' => array(
                    array('name' => 'placeholder', 'value' => lang('Dirección') ),
                    array('name' => 'class', 'value' => 'full-width' )
                ),
                "group" => "column2"
            )
        );

        $this->addField(
            array(
                "key" => "ci",
                "name" => lang("CI"),
                "type" => "text",
                'attr' => array(
                    array('name' => 'placeholder', 'value' => lang('CI') )
                ),
                "group" => "column2",
                "filtrable" => false
            )
        );
/*
        $this->addField(
            array(
                "key" => "role",
                "name" => lang("Rol"),
                "type" => "dropdown",
                "comparator" => "=",
                "values" => array(
                    array("id" => '', 'name' => lang('Seleccione Rol') ),
                    array("id" => 'admin', 'name' => lang('Admin') )
                ),
                'validation' => array(
                    'rules' => array(
                        'required' => true
                    ),
                    'messages' => array(
                        'required' => lang('Rol es requerido')
                    )
                ),
                "group" => "column1",
                "filtrable" => true
            )
        );*/

        $this->addField(
            array(
                "key" => "photo",
                "name" => lang("Foto"),
                "type" => "upload",
                'validation' => array(
                    'rules' => array(
                        'required' => false
                    ),
                    'messages' => array(
                        'required' => lang('Foto es requerida')
                    )
                ),
                'settings' => array(
                    'url' => BASE_URL . 'admin/user/upload',
                    'path' => BASE_PATH . 'uploads' . DIRECTORY_SEPARATOR . 'users' . DIRECTORY_SEPARATOR,
                    'download' => BASE_URL . 'uploads/users/'
                ),
                'group' => 'column1'
            )
        );

        $this->addField(
            array(
                "key" => "status",
                "name" => lang("Estado"),
                "type" => "dropdown",
                "comparator" => "=",
                "values" => array(
                    array("id" => '', 'name' => lang('Seleccione Estado') ),
                    array("id" => 'active', 'name' => lang('Activo') ),
                    array("id" => 'inactive', 'name' => lang('Inactivo') )
                ),
                'validation' => array(
                    'rules' => array(
                        'required' => true
                    ),
                    'messages' => array(
                        'required' => lang('Estado es requerido')
                    )
                ),
                "group" => "column2",
                "filtrable" => true
            )
        );

        $this->pagination = array(
            'start' => 0,
            'per_page' => 10
        );

        if(Auth::$user['role'] == 'sadmin') {

            $this->filters = array(
                DB_PREFIX . 'user.status!=' => 'deleted',
                DB_PREFIX . 'user.role!=' => 'sadmin'
            );
        }

        $this->addGroup('form', array('id', 'photo', 'role', 'first_name', 'last_name', 'email', 'password', 'ci', 'phone', 'address', 'status'));
        $this->addGroup('grid', array('id', 'role', 'first_name', 'last_name', 'email', 'ci', 'phone', 'address', 'status'));
    }

    function formatField($column, $value, $type = 'add', $data=array()) {

        switch($column) {
            case 'password': {

                if( $type == 'add') {

                    if( trim($value) ) {

                        $value = md5($value);

                    } else {

                        $value = md5(generatePassword(4));
                    }
                } else if( $type == 'edit') {

                    $value = md5($value);

                } else if( $type == 'get') {

                    $value = '';
                }

                break;
            }
        }

        return $value;
    }

    function callback_after_edit($id, $data) {}
    function callback_after_add($id, $data) {

        $view = new View();

        $data['password'] = $this->tempPassword;

        $email_data = array(
            'title' => lang('Account created'),
            'date' => date('Y-m-d'),
            'admin' => $data
        );


        $content = $view->add('email/user-account_created', $email_data, TRUE);
        sendMail(lang('Your Account Details'), $data['email'], $content);

        return $data;
    }

    function retrieve_password() {

        $view = new View();

        $user = $this->model->get_where(array('email' => @$_REQUEST['email']));

        if($user && is_array($user) && count($user) == 1) {

            $user = $user[0];

            $id = $user['id'];
            unset( $user['id'] );

            $password = generatePassword(4);

            $this->model->update($id, array('password' => md5($password)));
            $user['password'] = $password;

            $email_data = array(
                'title' => lang('¿Cocinamos? - Tu nueva contraseña'),
                'date' => date('Y-m-d'),
                'user' => $user
            );

            $content = $view->add('email/user-forgotpass', $email_data, TRUE);

            sendMail(lang('Detalles de Recuperacion de Contraseña'), $user['email'], $content);
        }

        return $user;
    }

    function response_before_edit($id, $data) {

        if($this->get_where(" `email`='" . addslashes($data['email']) . "' AND `id`!='$id' AND status!='deleted'") ) {
            return array(
                'status' => 'fail',
                'message' => lang('Email account already exists'),
            );
        }
    }

    function response_before_add($data) {

        if($this->get_where(" `email`='" . addslashes($data['email']) . "' AND status!='deleted'")) {
            return array(
                'status' => 'fail',
                'message' => lang('Email account already exists'),
            );
        }
    }

    function callback_before_edit($id, $data) {

        if(isset($data['password']) && !trim($data['password'])) {
            unset($data['password']);
        }

        return $data;
    }
    function callback_before_add($data) {

        $this->tempPassword = isset($data['password']) && trim($data['password']) ? $data['password'] : generatePassword(4);
        $data['password'] = $this->tempPassword;

        return $data;
    }
}