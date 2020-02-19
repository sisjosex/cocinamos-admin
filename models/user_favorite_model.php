<?php

require_once(BASE_PATH . 'system/module.php');
require_once(BASE_PATH . 'system/auth.php');

require_once(BASE_PATH . 'models/food_model.php');

class UserFavoriteModel extends Module
{
    function __construct()
    {
        parent::__construct('user_favorite', 'id');

        $this->phisical_table = DB_PREFIX . 'user_favorite';

        $this->field_custom_name_dropdown = "CONCAT(food.name)";

        $this->addField(
            array(
                "key" => "id",
                "name" => lang("ID"),
                "type" => "hidden"
            )
        );

        $this->addField(
            array(
                "key" => "user_id",
                "name" => lang("USER ID"),
                "type" => "hidden"
            )
        );

        $this->addField(
            array(
                "key" => "food_id",
                "comparator" => "=",
                "name" => lang("Menu"),
                "type" => "dropdown",
                "model" => new FoodModel(),
                'validation' => array(
                    'rules' => array(
                        'required' => true
                    ),
                    'messages' => array(
                        'required' => lang('Menu es requerido')
                    )
                ),
                "group" => "column1",
                "filtrable" => false
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
                "group" => "column1",
                "filtrable" => false
            )
        );

        $this->addField(
            array(
                "key" => "food",
                "name" => lang("Menu"),
                "field" => "food_id"
            )
        );

        $this->pagination = array(
            'start' => 0,
            'per_page' => 10
        );

        $this->filters = array(
            $this->phisical_table . '.status!=' => 'deleted'
        );

        $this->addGroup('form', array('id', 'user_id', 'food_id'));
        $this->addGroup('grid', array('id', 'food'));
    }
}