<?php

// POINT D'ENTRÉE UNIQUE :
// FrontController

// inclusion des dépendances via Composer
// autoload.php permet de charger d'un coup toutes les dépendances installées avec composer
// mais aussi d'activer le chargement automatique des classes (convention PSR-4)
require_once __DIR__ . '/../vendor/autoload.php';

// on démarre la session
// cela nous permettra d'utiliser le tableau $_SESSION

session_start();
/* ------------
--- ROUTAGE ---
-------------*/


// création de l'objet router
// Cet objet va gérer les routes pour nous, et surtout il va
$router = new AltoRouter();

// le répertoire (après le nom de domaine) dans lequel on travaille est celui-ci
// Mais on pourrait travailler sans sous-répertoire
// Si il y a un sous-répertoire
if (array_key_exists('BASE_URI', $_SERVER)) {
    // Alors on définit le basePath d'AltoRouter
    $router->setBasePath($_SERVER['BASE_URI']);
    // ainsi, nos routes correspondront à l'URL, après la suite de sous-répertoire
} else { // sinon
    // On donne une valeur par défaut à $_SERVER['BASE_URI'] car c'est utilisé dans le CoreController
    $_SERVER['BASE_URI'] = '/';
}

// On doit déclarer toutes les "routes" à AltoRouter,
// afin qu'il puisse nous donner LA "route" correspondante à l'URL courante
// On appelle cela "mapper" les routes
// 1. méthode HTTP : GET ou POST (pour résumer)
// 2. La route : la portion d'URL après le basePath
// 3. Target/Cible : informations contenant
//      - le nom de la méthode à utiliser pour répondre à cette route
//      - le nom du controller contenant la méthode
// 4. Le nom de la route : pour identifier la route, on va suivre une convention
//      - "NomDuController-NomDeLaMéthode"
//      - ainsi pour la route /, méthode "home" du MainController => "main-home"

/* MAIN */

$router->map(
    'GET',
    '/',
    [
        'method' => 'home',
        'controller' => '\App\Controllers\MainController' // On indique le FQCN de la classe
    ],
    'main-home'
);

$router->map(
    'GET',
    '/login',
    [
        'method' => 'login',
        'controller' => '\App\Controllers\MainController' 
    ],
    'main-login'
);

$router->map(
    'POST',
    '/login',
    [
        'method' => 'loginExecute',
        'controller' => '\App\Controllers\MainController' 
    ],
    'main-loginExecute'
);

$router->map(
    'GET',
    '/logout',
    [
        'method' => 'logout',
        'controller' => '\App\Controllers\MainController' 
    ],
    'main-logout'
);
/* CATEGORY */ 

$router->map(
    'GET',
    '/category',
    [
        'method' => 'browse',
        'controller' => '\App\Controllers\CategoryController' 
    ],
    'category-browse'
);

$router->map(
    'GET',
    '/category/add',
    [
        'method' => 'add',
        'controller' => '\App\Controllers\CategoryController'
    ],
    'category-add'
);

$router->map(
    'POST',
    '/category/add',
    [
        'method' => 'addExecute',
        'controller' => '\App\Controllers\CategoryController'
    ],
    'category-addExecute'
);

$router->map(
    'GET',
    '/category/edit/[i:id]',
    [
        'method' => 'edit',
        'controller' => '\App\Controllers\CategoryController'
    ],
    'category-edit'
);

$router->map(
    'POST',
    '/category/edit/[i:id]',
    [
        'method' => 'editExecute',
        'controller' => '\App\Controllers\CategoryController'
    ]
);

$router->map(
    'GET',
    '/category/delete/[i:id]',
    [
        'method' => 'delete',
        'controller' => '\App\Controllers\CategoryController'
    ],
    'category-delete'
);

/* PRODUCT */ 

$router->map(
    'GET',
    '/product',
    [
        'method' => 'browse',
        'controller' => '\App\Controllers\ProductController'
    ],
    'product-browse'
);

$router->map(
    'GET',
    '/product/add',
    [
        'method' => 'add',
        'controller' => '\App\Controllers\ProductController'
    ],
    'product-add'
);

$router->map(
    'POST',
    '/product/add',
    [
        'method' => 'addExecute',
        'controller' => '\App\Controllers\ProductController'
    ],
    'product-addExecute'
);

$router->map(
    'GET',
    '/product/edit/[i:id]',
    [
        'method' => 'edit',
        'controller' => '\App\Controllers\ProductController'
    ],
    'product-edit'
);

$router->map(
    'POST',
    '/product/edit/[i:id]',
    [
        'method' => 'editExecute',
        'controller' => '\App\Controllers\ProductController'
    ]
);

/* USERS */ 

$router->map(
    'GET',
    '/user',
    [
        'method' => 'browse',
        'controller' => '\App\Controllers\UserController'
    ],
    'user-browse'
);

$router->map(
    'GET',
    '/user/add',
    [
        'method' => 'add',
        'controller' => '\App\Controllers\UserController'
    ],
    'user-add'
);

$router->map(
    'POST',
    '/user/add',
    [
        'method' => 'addExecute',
        'controller' => '\App\Controllers\UserController'
    ],
    'user-addExecute'
);

$router->map(
    'GET',
    '/user/edit/[i:id]',
    [
        'method' => 'edit',
        'controller' => '\App\Controllers\UserController'
    ],
    'user-edit'
);

$router->map(
    'POST',
    '/user/edit/[i:id]',
    [
        'method' => 'editExecute',
        'controller' => '\App\Controllers\UserController'
    ]
);

$router->map(
    'GET',
    '/user/delete/[i:id]',
    [
        'method' => 'delete',
        'controller' => '\App\Controllers\UserController'
    ],
    'user-delete'
);


/* -------------
--- DISPATCH ---
--------------*/

// On demande à AltoRouter de trouver une route qui correspond à l'URL courante
$match = $router->match();
// dd($match);

// Ensuite, pour dispatcher le code dans la bonne méthode, du bon Controller
// On délègue à une librairie externe : https://packagist.org/packages/benoclock/alto-dispatcher
// 1er argument : la variable $match retournée par AltoRouter
// 2e argument : le "target" (controller & méthode) pour afficher la page 404
$dispatcher = new Dispatcher($match, '\App\Controllers\ErrorController::err404');
// Une fois le "dispatcher" configuré, on lance le dispatch qui va exécuter la méthode du controller
$dispatcher->dispatch();
