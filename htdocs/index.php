<?php
// constante qui contient le chemin vers index.php

define('ROOT', str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']));

// Chargement des models et controllers principaux

require_once(ROOT.'app/Model.php');
require_once(ROOT.'app/Controller.php');

// on sépare les paramètres

$params = explode('/',$_GET['p']);

// existe t'il un paramètre

if ($params[0] !== '') {
    $controller = ucfirst($params[0]);
    $action = isset($params[1]) ? $params[1] : 'index';
    require_once(ROOT.'controllers/'.$controller.'.php');
    $controller = new $controller();
    if(method_exists($controller, $action)) {
        unset($params[0]);
        unset($params[1]);
        call_user_func_array([$controller, $action], $params);
    } else {
        http_response_code(404);
        echo "Cette page n'existe pas";
    }
} else {
    // On appelle le contrôleur par défaut
    require_once(ROOT.'controllers/Main.php');

    // On instancie le contrôleur
    $controller = new Main();

    // On appelle la méthode index
    $controller->index();

}