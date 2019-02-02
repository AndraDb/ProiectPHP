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


    '/restaurants' => ['controller' => 'RestaurantController','action' => 'restaurantsGET','guard' => "Authenticated"],
    '/restaurants/' => ['controller' => 'RestaurantController','action' => 'restaurantsGET','guard' => "Authenticated"],
    '/restaurants/post' => ['controller' => 'RestaurantController', 'action' => 'restaurantsPOST','guard' => "Authenticated"],

    '/menu?id={id}' => ['controller' => 'FoodController','action' => 'menuGET','guard' => "Authenticated"],
    '/menu?id={id}/' => ['controller' => 'FoodController','action' => 'menuGET','guard' => "Authenticated"],
    '/menu?id={id}/post' => ['controller' => 'FoodController', 'action' => 'menuPOST','guard' => "Authenticated"],

    '/addfood' => ['controller' => 'FoodController','action' => 'addfoodGET','guard' => "Authenticated"],
    '/addfood/' => ['controller' => 'FoodController','action' => 'addfoodGET','guard' => "Authenticated"],
    '/addfood/post' => ['controller' => 'FoodController', 'action' => 'addfoodPOST','guard' => "Authenticated"],

    '/addrestaurant' => ['controller' => 'RestaurantController','action' => 'addrestaurantGET','guard' => "Authenticated"],
    '/addrestaurant/' => ['controller' => 'RestaurantController','action' => 'addrestaurantGET','guard' => "Authenticated"],
    '/addrestaurant/post' => ['controller' => 'RestaurantController', 'action' => 'addrestaurantPOST','guard' => "Authenticated"],

    '/cart' => ['controller' => 'FoodController','action' => 'cartGET','guard' => "Authenticated"],
    '/cart/' => ['controller' => 'FoodController','action' => 'cartGET','guard' => "Authenticated"],
    '/cart/post' => ['controller' => 'FoodController', 'action' => 'cartPOST','guard' => "Authenticated"],
    ];
