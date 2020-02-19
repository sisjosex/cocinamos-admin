<?php

require_once(BASE_PATH . 'system/module.php');
require_once(BASE_PATH . 'system/auth.php');

class UnitModel extends Module
{
    function __construct()
    {
        parent::__construct('unit', 'id');

        $this->phisical_table = DB_PREFIX . 'unit';

        $this->field_custom_name_dropdown = "CONCAT(unit.name)";

        $this->addField(
            array(
                "key" => "id",
                "name" => lang("ID"),
                "type" => "hidden"
            )
        );

        $this->addField(
            array(
                "key" => "measure",
                "comparator" => "LIKE",
                "name" => lang("Precisión"),
                "type" => "dropdown",
                "values" => array(
                    array("id" => '', 'name' => lang('Seleccione Precisión') ),
                    array("id" => 'gr', 'name' => lang('Gramo') ),
                    array("id" => 'ml', 'name' => lang('Mililitro') ),
                    array("id" => 'unit', 'name' => lang('Unidad') ),
                    array("id" => 'alimento', 'name' => lang('Alimento') )
                ),
                'validation' => array(
                    'rules' => array(
                        'required' => true
                    ),
                    'messages' => array(
                        'required' => lang('Precisión es requerida')
                    )
                ),
                "group" => "column1",
                "filtrable" => false
            )
        );

        $this->addField(
            array(
                "key" => "name",
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
                "key" => "value",
                "comparator" => "=",
                "name" => lang("Valor"),
                "type" => "text",
                'validation' => array(
                    'rules' => array(
                        'required' => true,
                        'number' => true
                    ),
                    'messages' => array(
                        'required' => lang('Cantidad es requerida'),
                        'number' => lang('Cantidad Inválida')
                    )
                ),
                'attr' => array(
                    array('name' => 'placeholder', 'value' => lang('Valor') )
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

        $this->pagination = array(
            'start' => 0,
            'per_page' => 10
        );

        $this->filters = array(
            $this->phisical_table . '.status!=' => 'deleted'
        );

        $this->addGroup('form', array('id', 'measure', 'name', 'value'));
        $this->addGroup('grid', array('id', 'name', 'value', 'measure'));
    }
}