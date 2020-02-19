<?php

require_once(BASE_PATH . 'system/module.php');
require_once(BASE_PATH . 'system/auth.php');

require_once(BASE_PATH . 'models/food_step_media_model.php');

class FoodStepModel extends Module
{
    function __construct()
    {
        parent::__construct('food_step', 'id');

        $this->phisical_table = DB_PREFIX . 'food_step';

        $this->field_custom_name_dropdown = "CONCAT(food_step.name)";

        $this->addField(
            array(
                "key" => "id",
                "name" => lang("ID"),
                "type" => "hidden"
            )
        );

        $this->addField(
            array(
                "key" => "food_id",
                "name" => lang("USER ID"),
                "type" => "hidden"
            )
        );

        $this->addField(
            array(
                "key" => "name",
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
                    array('name' => 'placeholder', 'value' => lang('Nombre') ),
                    array('name' => 'class', 'value' => 'full-width' )
                )
            )
        );

        $this->addField(
            array(
                "key" => "description",
                "name" => lang("Descripción"),
                "type" => "textarea",
                'validation' => array(
                    'rules' => array(
                        'required' => true
                    ),
                    'messages' => array(
                        'required' => lang('Descripción es requerida')
                    )
                ),
                'attr' => array(
                    array('name' => 'placeholder', 'value' => lang('Descripción') ),
                    array('name' => 'class', 'value' => 'full-width' )
                )
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
                )
            )
        );

        $this->addField(
            array(
                "key" => "media",
                "type" => "inline",
                "model" => new FoodStepMediaModel(),
                'tab' => lang('Media')
            )
        );

        $this->pagination = array(
            'start' => 0,
            'per_page' => 10
        );

        $this->filters = array(
            $this->phisical_table . '.status!=' => 'deleted'
        );

        $this->addGroup('form', array('id', 'food_id', 'name', 'description', 'media'));
        $this->addGroup('grid', array('id', 'name', 'description', 'media'));
    }
}