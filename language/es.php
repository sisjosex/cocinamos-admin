<?php

$lang['submit_save'] = 'Save';
$lang['submit_edit'] = 'Edit';
$lang['submit_cancel'] = 'Cancel';
$lang['Company'] = 'Empresa';
$lang['Company'] = 'Empresa';

$lang['Edituser'] = 'Editar usuario';
$lang['Newuser'] = 'Nuevo usuario';
$lang['Filter'] = 'Buscar';

$lang['category'] = 'Categoria';
$lang['food_ingredient'] = 'Ingrediente';
$lang['food'] = 'Menú';
$lang['food_step'] = 'Paso';
$lang['food_step_media'] = 'Media';
$lang['ingredient'] = 'Ingrediente';
$lang['unit'] = 'Unidad';
$lang['user_app'] = 'Usuario';
$lang['user'] = 'Admin';
$lang['user_favorite'] = 'Favorito';
$lang['user_recipe'] = 'Receta';
$lang['New'] = 'Nuevo';
$lang['Edit'] = 'Editar';
$lang['Detail'] = 'Detalle';
$lang['Default'] = 'General';
$lang['Delete'] = 'Eliminar';
$lang['Send'] = 'Guardar';
$lang['Cancel'] = 'Cancelar';

function lang($txt) {

    if( isset($lang[$txt]) ) {
        return $lang[$txt];
    }

    return $txt;
}