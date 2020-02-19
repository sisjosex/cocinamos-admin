<?php

require_once(BASE_PATH . 'system/module.php');
require_once(BASE_PATH . 'system/auth.php');

class FoodStepMediaModel extends Module
{
    function __construct()
    {
        parent::__construct('food_step_media', 'id');

        $this->phisical_table = DB_PREFIX . 'food_step_media';

        //$this->field_custom_name_dropdown = "CONCAT(food_step_media.image)";

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
                "name" => lang("FOOD ID"),
                "type" => "hidden"
            )
        );

        $this->addField(
            array(
                "key" => "food_step_id",
                "name" => lang("FOOD STEP ID"),
                "type" => "hidden"
            )
        );

        $this->addField(
            array(
                "key" => "image",
                "name" => lang("Imagen"),
                "type" => "upload",
                'validation' => array(
                    'rules' => array(
                        'required' => false
                    ),
                    'messages' => array(
                        'required' => lang('Imagen es requerida')
                    )
                ),
                'settings' => array(
                    'url' => BASE_URL . 'admin/' . $this->table_name . '/upload',
                    'path' => BASE_PATH . 'uploads' . DIRECTORY_SEPARATOR . $this->table_name . DIRECTORY_SEPARATOR,
                    'download' => BASE_URL . 'uploads/' . $this->table_name . '/'
                ),
                'group' => 'column1',
                'filtrable' => false
            )
        );

        $this->addField(
            array(
                "key" => "video",
                "name" => lang("Video"),
                "type" => "text",
                'validation' => array(
                    'rules' => array(
                        'required' => false
                    ),
                    'messages' => array(
                        'required' => lang('Video es requerida')
                    )
                ),
                'attr' => array(
                    array('name' => 'placeholder', 'value' => lang('Video'))
                ),
                "group" => "column1",
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
                "group" => "column1"
            )
        );

        $this->pagination = array(
            'start' => 0,
            'per_page' => 10
        );

        $this->filters = array(
            $this->phisical_table . '.status!=' => 'deleted'
        );

        $this->addGroup('form', array('id', 'food_id', 'food_step_id', 'image', 'video'));
        $this->addGroup('grid', array('id', 'food_id', 'food_step_id', 'image', 'video'));
    }
}