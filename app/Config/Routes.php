<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'AuthController::go_to_register');
$routes->get('/register', 'AuthController::go_to_register');
$routes->post('/register', 'AuthController::register');
$routes->get('/login', 'AuthController::go_to_login');
$routes->post('/login', 'AuthController::login');
$routes->get('/logout', 'AuthController::logout');
$routes->get('/forgot-password', 'AuthController::forgotPassword');
$routes->post('/forgot-password', 'AuthController::sendResetLink');


$routes->get('/dashboard', 'DashboardController::index');


$routes->get('/profileupdate', 'ProfileController::index');
$routes->post('/profileupdate', 'ProfileController::updateProfile');


$routes->get('/useraccess', 'UserAccessController::index');
$routes->get('/changeUserType/(:num)', 'UserAccessController::changeUserType/$1');
$routes->get('statusUpdate/(:num)', 'UserAccessController::statusUpdate/$1');


$routes->get('/exampleMethode', 'ExampleController::index');