<?php

require_once(BASE_PATH . 'system/module.php');
require_once(BASE_PATH . 'system/auth.php');

require_once(BASE_PATH . 'models/ingredient_model.php');

class FoodIngredientModel extends Module
{
    function __construct()
    {
        parent::__construct('food_ingredient', 'id');

        $this->phisical_table = DB_PREFIX . 'food_ingredient';

        $this->field_custom_name = "CONCAT(ingredient.name, ingredient.unit_id)";
        $this->field_custom_name_dropdown = "CONCAT(ingredient.name)";

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
                "key" => "ingredient_id",
                "comparator" => "=",
                "name" => lang("Ingrediente"),
                "type" => "dropdown",
                "model" => new IngredientModel(),
                'validation' => array(
                    'rules' => array(
                        'required' => true
                    ),
                    'messages' => array(
                        'required' => lang('Ingrediente es requerido')
                    )
                ),
                "group" => "column1"
            )
        );

        $this->addField(
            array(
                "key" => "quantity",
                "comparator" => "=",
                "name" => lang("Cantidad"),
                "type" => "text",
                'validation' => array(
                    'rules' => array(
                        'required' => true,
                        'number' => false
                    ),
                    'messages' => array(
                        'required' => lang('Cantidad es requerida'),
                        'number' => lang('Cantidad Inválida')
                    )
                ),
                'attr' => array(
                    array('name' => 'placeholder', 'value' => lang('Cantidad') )
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
                "group" => "column1"
            )
        );

        $this->addField(
            array(
                "key" => "ingredient",
                "name" => lang("Ingrediente"),
                "field" => "ingredient_id"
            )
        );

        $this->pagination = array(
            'start' => 0,
            'per_page' => 10
        );

        $this->filters = array(
            $this->phisical_table . '.status!=' => 'deleted'
        );

        $this->post_joins = array(
            "LEFT JOIN unit on(unit.id = ingredient.id)"
        );

        $this->addGroup('form', array('id', 'food_id', 'ingredient_id', 'quantity'));
        $this->addGroup('grid', array('id', 'quantity', 'ingredient'));
    }
}