<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

$routes->get('/', 'Home::index');

$routes->get('/villages', 'Villages::index');

$routes->get('/villages/(:segment)', 'Villages::show/$1');

$routes->get('/reservation', 'Reservation::index');

$routes->post('/reservation/confirm', 'Reservation::confirm');

$routes->get('/reservation/supprimer/(:num)', 'Reservation::supprimer/$1');

$routes->get('/reservation/modifier/(:num)', 'Reservation::modifier/$1');

$routes->post('/reservation/modifier/(:num)', 'Reservation::enregistrerModification/$1');

$routes->get('/reservations', 'Reservation::liste');