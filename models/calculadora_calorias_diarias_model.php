<?php

require_once(BASE_PATH . 'system/module.php');
require_once(BASE_PATH . 'system/auth.php');

class Calculadora_calorias_diarias_Model extends Module
{
    function __construct()
    {
        parent::__construct('calculadora_calorias_diarias', 'id');

        //$this->field_custom_name_dropdown = "CONCAT(category.name)";

        $this->addField(
            array(
                "key" => "id",
                "name" => lang("ID"),
                "type" => "hidden"
            )
        );

        $this->addField(
            array(
                "key" => "nivel_de_actividad",
                "name" => lang("Nivel de actividad"),
                "type" => "text",
                'validation' => array(
                    'rules' => array(
                        'required' => true
                    ),
                    'messages' => array(
                        'required' => lang('campo requerido')
                    )
                ),
                'attr' => array(
                    array('name' => 'placeholder', 'value' => lang('Nivel de Actividad') )
                )
            )
        );

        $this->addField(
            array(
                "key" => "incremento_nutricional",
                "name" => lang("Calorias"),
                "type" => "text",
                'validation' => array(
                    'rules' => array(
                        'required' => true,
                        'number' => true
                    ),
                    'messages' => array(
                        'required' => lang('campo requerido'),
                        'number' => lang('Cantidad inválida')
                    )
                ),
                'attr' => array(
                    array('name' => 'placeholder', 'value' => lang('0.00') )
                )
            )
        );

        $this->addField(
            array(
                "key" => "decremento_nutricional",
                "name" => lang("Carbohidratos"),
                "type" => "text",
                'validation' => array(
                    'rules' => array(
                        'required' => true,
                        'number' => true
                    ),
                    'messages' => array(
                        'required' => lang('campo requerido'),
                        'number' => lang('Cantidad inválida')
                    )
                ),
                'attr' => array(
                    array('name' => 'placeholder', 'value' => lang('0.00') )
                )
            )
        );

        $this->addField(
            array(
                "key" => "status"
            )
        );

        $this->pagination = array(
            'start' => 0,
            'per_page' => 10
        );

        $this->filters = array(
            $this->phisical_table . '.status!=' => 'deleted'
        );

        $this->addGroup('form', array('id', 'nivel_de_actividad', 'incremento_nutricional', 'decremento_nutricional'));
        $this->addGroup('grid', array('id', 'nivel_de_actividad', 'incremento_nutricional', 'decremento_nutricional'));
    }
}