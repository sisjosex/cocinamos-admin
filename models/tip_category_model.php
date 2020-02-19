<?php

require_once(BASE_PATH . 'system/module.php');
require_once(BASE_PATH . 'system/auth.php');

require_once(BASE_PATH . 'models/tip_model.php');

class TipCategoryModel extends Module
{
    function __construct()
    {
        parent::__construct('tip_category', 'id');

        $this->phisical_table = DB_PREFIX . 'tip_category';

        $this->field_custom_name_dropdown = "CONCAT(tip_category.title)";

        $this->addField(
            array(
                "key" => "id",
                "name" => lang("ID"),
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
                "key" => "image",
                "name" => lang("Imagen"),
                "type" => "upload",
                'validation' => array(
                    'rules' => array(
                        'required' => true
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
                "key" => "tips",
                "type" => "inline",
                "model" => new TipModel(),
                'validation' => array(
                    'rules' => array(
                        'required' => false
                    ),
                    'messages' => array(
                        'required' => lang('Tips son requerido')
                    )
                ),
                'tab' => lang('Tips')
            )
        );

        $this->pagination = array(
            'start' => 0,
            'per_page' => 10
        );

        $this->filters = array(
            $this->phisical_table . '.status!=' => 'deleted'
        );

        $this->addGroup('form', array('id', 'title', 'image', 'tips'));
        $this->addGroup('grid', array('id', 'title', 'image'));
    }
}