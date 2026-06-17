<?php

use CodeIgniter\Router\RouteCollection;


$routes->get('/', 'AccueilController::index');
$routes->get('/Check_Caisse', 'CaisseController::checkCaisse');
$routes->post('/Valider_Achat', 'AchatControllers::insert_achat');