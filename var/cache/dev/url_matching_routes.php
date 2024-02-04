<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/todos' => [[['_route' => 'show_todos', '_controller' => 'App\\Controller\\TodoController::index'], null, null, null, false, false, null]],
        '/create' => [[['_route' => 'create_todo', '_controller' => 'App\\Controller\\TodoController::create'], null, null, null, false, false, null]],
        '/edit' => [[['_route' => 'edit_todo', '_controller' => 'App\\Controller\\TodoController::edit'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:35)'
                .'|/todo/([^/]++)(*:56)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        35 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        56 => [
            [['_route' => 'show_todo', '_controller' => 'App\\Controller\\TodoController::show'], ['id'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
