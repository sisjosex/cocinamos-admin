<?php

require_once(BASE_PATH . 'system/module.php');
require_once(BASE_PATH . 'system/auth.php');

require_once(BASE_PATH . 'models/ingredient_model.php');

class Calculadora_nutrientes_Model extends Module
{
    function __construct()
    {
        parent::__construct('calculadora_nutrientes', 'id');

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
                "key" => "ingredient_id",
                "name" => lang("Alimento"),
                "type" => "dropdown",
                "model" => new IngredientModel(),
                'validation' => array(
                    'rules' => array(
                        'required' => true
                    ),
                    'messages' => array(
                        'required' => lang('Alimento es requerido')
                    )
                )
            )
        );

        $this->addField(
            array(
                "key" => "porcion",
                "name" => lang("Porcion"),
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
                "key" => "nombre_porcion",
                "name" => lang("Nombre porción"),
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
                    array('name' => 'placeholder', 'value' => lang('Nombre porción') )
                )
            )
        );

        $this->addField(
            array(
                "key" => "calorias",
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
                "key" => "carbohidratos",
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
                "key" => "proteinas",
                "name" => lang("Proteinas"),
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
                "key" => "grasas",
                "name" => lang("Grasas"),
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
                "key" => "ingredient",
                "name" => lang("Alimento"),
                "field" => "ingredient_id"
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

        $this->addGroup('form', array('id', 'ingredient_id', 'porcion', 'nombre_porcion', 'calorias', 'carbohidratos', 'proteinas', 'grasas'));
        $this->addGroup('grid', array('id', 'ingredient', 'porcion', 'nombre_porcion', 'calorias', 'carbohidratos', 'proteinas', 'grasas'));
    }
}