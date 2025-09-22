<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */



// $routes->get('api/test', function () {
//     return service('response')->setJSON([
//         'status'  => true,
//         'message' => 'CORS is working!',
//     ]);
// });

$routes->post('api/login', 'Api\AuthController::login');

$routes->get("register" , 'register::index');
$routes->post('register/save', 'register::save');

$routes->get('todo/tasks', 'todo\task::index');
$routes->get('todo/tasks/(:num)', 'todo\task::show/$1');
$routes->post('todo/tasks', 'todo\task::create');
$routes->put('todo/tasks/(:num)', 'todo\task::update/$1');
$routes->delete('todo/tasks/(:num)', 'todo\task::delete/$1');

