<?php

$routes = [
    '/' => ['controller' => 'HomeController', 'action' => 'index', 'guard' => "Authenticated"],

    '/page/about-us' => ['controller' => 'PageController','action' => 'aboutUsAction', 'guard' => "Authenticated"],

    '/login' => ['controller' => 'AccountController', 'action' => 'loginGET'],
    '/login/' => ['controller' => 'AccountController', 'action' => 'loginGET'],
    '/login/post' => ['controller' => 'AccountController', 'action' => 'loginPOST'],

    '/register' => ['controller' => 'AccountController','action' => 'registerGET'],
    '/register/' => ['controller' => 'AccountController','action' => 'registerGET'],
    '/register/post' => ['controller' => 'AccountController', 'action' => 'registerPOST'],

    '/logout' => ['controller' => 'AccountController', 'action' => 'logout'],
    '/logout/' => ['controller' => 'AccountController', 'action' => 'logout'],
    

    '/AddMenu' => ['controller' => 'AddMenuController','action' => 'AddMenuGET','guard' => "Authenticated"],
    '/AddMenu/' => ['controller' => 'AddMenuController','action' => 'AddMenuGET','guard' => "Authenticated"],
    '/AddMenu/post' => ['controller' => 'AddMenuController', 'action' => 'AddMenuPOST','guard' => "Authenticated"],

    'order'=>['controller'=>'orders','action'=>'order'],
    '/order/'=>['controller'=>'orders','action'=>'order'],
    '/order/post' => ['controller' => 'orders', 'action' => 'orderPOST'],

    '/MeniuClient' => ['controller' => 'MeniuClientController','action' => 'meniuClientGET','guard' => "Authenticated"],
    '/MeniuClient/' => ['controller' => 'MeniuClientController','action' => 'meniuClientGET','guard' => "Authenticated"],
    '/MeniuClient/post' => ['controller' => 'MeniuClientController', 'action' => 'meniuClientPOST','guard' => "Authenticated"],
    
    '/user' => ['controller' => 'UserController','action' => 'userGET', 'guard' => "Authenticated"],
    '/user/' => ['controller' => 'UserController','action' => 'userGET', 'guard' => "Authenticated"],
    '/post' => ['controller' => 'UserController','action' => 'userPOST', 'guard' => "Authenticated"],

    '/edit' => ['controller' => 'UserController','action' => 'editGET', 'guard' => "Authenticated"],
    '/edit/' => ['controller' => 'UserController','action' => 'editGET', 'guard' => "Authenticated"],
    '/edit/post' => ['controller' => 'UserController','action' => 'editPOST', 'guard' => "Authenticated"],

    '/show' => ['controller' => 'UserController','action' => 'showGET', 'guard' => "Authenticated"],
    '/show/' => ['controller' => 'UserController','action' => 'showGET', 'guard' => "Authenticated"],
    '/show/post' => ['controller' => 'UserController','action' => 'showPOST', 'guard' => "Authenticated"],

    '/user/{id}' => ['controller' => 'UserController','action' => 'showAction', 'guard' => "Authenticated"],


    ];
