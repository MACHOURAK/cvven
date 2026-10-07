<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

// Front-office
$routes->get('/', 'Home::index');

$routes->get('/villages', 'Villages::index');
$routes->get('/villages/(:segment)', 'Villages::show/$1');

$routes->get('/reservation', 'Reservation::index');
$routes->post('/reservation/confirm', 'Reservation::confirm');

$routes->get('/reservation/supprimer/(:num)', 'Reservation::supprimer/$1');

$routes->get('/reservation/modifier/(:num)', 'Reservation::modifier/$1');
$routes->post('/reservation/modifier/(:num)', 'Reservation::enregistrerModification/$1');

$routes->get('/reservations', 'Reservation::liste');

// Authentification
$routes->get('login', 'Auth::login');
$routes->post('login', 'Auth::attemptLogin');
$routes->get('logout', 'Auth::logout');

// Espace administration
$routes->group('admin', function($routes) {

    $routes->get('/', 'Admin\Dashboard::index');

    // Gestion des villages
    $routes->get('villages', 'Admin\Villages::index');
    $routes->get('villages/ajouter', 'Admin\Villages::ajouter');
    $routes->post('villages/enregistrer', 'Admin\Villages::enregistrer');

    $routes->get('villages/modifier/(:num)', 'Admin\Villages::modifier/$1');
    $routes->post(
        'villages/modifier/(:num)',
        'Admin\Villages::enregistrerModification/$1'
    );

    $routes->get('villages/supprimer/(:num)', 'Admin\Villages::supprimer/$1');
});