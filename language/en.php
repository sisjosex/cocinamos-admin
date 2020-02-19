<?php

$lang['submit_save'] = 'Save';
$lang['submit_edit'] = 'Edit';
$lang['submit_cancel'] = 'Cancel';
$lang['Company'] = 'Empresa';
$lang['Email'] = 'Correo Electrónico';
$lang['Password'] = 'Contraseña';
$lang['Sign In'] = 'Entrar';
$lang['Email is required'] = 'Correo electrónico es requerido';
$lang['Password is required'] = 'Contraseña es requerida';
$lang['Invalid user or password'] = 'Usuario o contraseña son invalidos';
$lang['Logout'] = 'Salir';

function lang($txt) {

    global $lang;

    if( isset($lang[$txt]) ) {
        return $lang[$txt];
    }

    return $txt;
}