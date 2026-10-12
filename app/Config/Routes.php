<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Pages::index');
$routes->get('tasks', 'Tasks::index');
$routes->get('profile', 'Pages::profile');
$routes->get('about', 'Pages::about');
$routes->get('login', 'Auth::login');
$routes->post('login', 'Auth::authenticate');
$routes->get('logout', 'Auth::logout');
$routes->get('tasks/new', 'Tasks::new', ['filter' => 'auth']);
$routes->post('tasks/new', 'Tasks::create', ['filter' => 'auth']);
$routes->get('tasks/(:num)/edit', 'Tasks::edit/$1', ['filter' => 'auth']);
$routes->post('tasks/(:num)/edit', 'Tasks::update/$1', ['filter' => 'auth']);
$routes->post('tasks/(:num)/delete', 'Tasks::archive/$1', ['filter' => 'auth']);