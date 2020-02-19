<?php

require_once(BASE_PATH . 'system/module.php');
require_once(BASE_PATH . 'system/auth.php');

class TipModel extends Module
{
    function __construct()
    {
        parent::__construct('tip', 'id');

        $this->phisical_table = DB_PREFIX . 'tip';

        $this->field_custom_name_dropdown = "CONCAT(tip.title)";

        $this->addField(
            array(
                "key" => "id",
                "name" => lang("ID"),
                "type" => "hidden"
            )
        );

        $this->addField(
            array(
                "key" => "tip_category_id",
                "name" => lang("CATEGORY ID"),
                "type" => "hidden"
            )
        );

        $this->addField(
            array(
                "key" => "title",
                "name" => lang("Title"),
                "type" => "text",
                'validation' => array(
                    'rules' => array(
                        'required' => true
                    ),
                    'messages' => array(
                        'required' => lang('Título es requerido')
                    )
                ),
                'attr' => array(
                    array('name' => 'placeholder', 'value' => lang('Título') ),
                    array('name' => 'class', 'value' => 'full-width' )
                )
            )
        );

        $this->addField(
            array(
                "key" => "content",
                "name" => lang("Contenido"),
                "type" => "editor",
                'validation' => array(
                    'rules' => array(
                        'required' => true
                    ),
                    'messages' => array(
                        'required' => lang('Contenido es requerido')
                    )
                ),
                'settings' => array(
                    'url' => BASE_URL . 'admin/' . $this->table_name . '/upload',
                    'path' => BASE_PATH . 'uploads' . DIRECTORY_SEPARATOR . $this->table_name . DIRECTORY_SEPARATOR,
                    'download' => BASE_URL . 'uploads/' . $this->table_name . '/'
                ),
                'attr' => array(
                    array('name' => 'placeholder', 'value' => lang('Contenido') ),
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

        $this->pagination = array(
            'start' => 0,
            'per_page' => 10
        );

        $this->filters = array(
            $this->phisical_table . '.status!=' => 'deleted'
        );

        $this->addGroup('form', array('id', 'title', 'content'));
        $this->addGroup('grid', array('id', 'title'));
    }
}