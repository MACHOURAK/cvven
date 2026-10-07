<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

// ========================================
// FRONT-OFFICE
// ========================================

$routes->get('/', 'Home::index');

$routes->get('/villages', 'Villages::index');
$routes->get('/villages/(:segment)', 'Villages::show/$1');

$routes->get('/reservation', 'Reservation::index');
$routes->post('/reservation/confirm', 'Reservation::confirm');

$routes->get('/reservation/supprimer/(:num)', 'Reservation::supprimer/$1');

$routes->get('/reservation/modifier/(:num)', 'Reservation::modifier/$1');
$routes->post(
    '/reservation/modifier/(:num)',
    'Reservation::enregistrerModification/$1'
);

$routes->get('/reservations', 'Reservation::liste');


// ========================================
// AUTHENTIFICATION
// ========================================

$routes->get('login', 'Auth::login');
$routes->post('login', 'Auth::attemptLogin');
$routes->get('logout', 'Auth::logout');


// ========================================
// ESPACE ADMINISTRATION
// ========================================

$routes->group('admin', function($routes) {

    // Dashboard
    $routes->get('/', 'Admin\Dashboard::index');


    // ========================================
    // GESTION DES VILLAGES
    // ========================================

    $routes->get('villages', 'Admin\Villages::index');

    $routes->get(
        'villages/ajouter',
        'Admin\Villages::ajouter'
    );

    $routes->post(
        'villages/enregistrer',
        'Admin\Villages::enregistrer'
    );

    $routes->get(
        'villages/modifier/(:num)',
        'Admin\Villages::modifier/$1'
    );

    $routes->post(
        'villages/modifier/(:num)',
        'Admin\Villages::enregistrerModification/$1'
    );

    $routes->get(
        'villages/supprimer/(:num)',
        'Admin\Villages::supprimer/$1'
    );


    // ========================================
    // GESTION DES CHAMBRES
    // ========================================

    $routes->get(
        'chambres',
        'Admin\Chambres::index'
    );

    $routes->get(
        'chambres/ajouter',
        'Admin\Chambres::ajouter'
    );

    $routes->post(
        'chambres/enregistrer',
        'Admin\Chambres::enregistrer'
    );

    $routes->get(
        'chambres/modifier/(:num)',
        'Admin\Chambres::modifier/$1'
    );

    $routes->post(
        'chambres/modifier/(:num)',
        'Admin\Chambres::enregistrerModification/$1'
    );

    $routes->get(
        'chambres/supprimer/(:num)',
        'Admin\Chambres::supprimer/$1'
    );

});