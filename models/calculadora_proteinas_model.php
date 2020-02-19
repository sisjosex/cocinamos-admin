<?php

require_once(BASE_PATH . 'system/module.php');
require_once(BASE_PATH . 'system/auth.php');

require_once(BASE_PATH . 'models/ingredient_model.php');
require_once(BASE_PATH . 'models/categoria_model.php');

class Calculadora_proteinas_Model extends Module
{
    function __construct()
    {
        parent::__construct('calculadora_proteinas', 'id');

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
                "key" => "categoria_id",
                "name" => lang("Categoría"),
                "type" => "dropdown",
                "model" => new CategoriaModel(),
                'validation' => array(
                    'rules' => array(
                        'required' => true
                    ),
                    'messages' => array(
                        'required' => lang('Categoría es requerida')
                    )
                )
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
                "key" => "proteinas_por_kcal",
                "name" => lang("Proteinas por Kcal"),
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
                "key" => "peso_racion",
                "name" => lang("Peso ración"),
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
                "key" => "categoria",
                "name" => lang("Categoria"),
                "field" => "categoria_id"
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

        $this->addGroup('form', array('id', 'categoria_id', 'ingredient_id', 'proteinas_por_kcal', 'peso_racion', 'proteinas'));
        $this->addGroup('grid', array('id', 'categoria', 'ingredient', 'proteinas_por_kcal', 'peso_racion', 'proteinas'));
    }
}