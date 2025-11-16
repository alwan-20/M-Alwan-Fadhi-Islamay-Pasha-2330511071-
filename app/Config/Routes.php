<?php 
use CodeIgniter\Router\RouteCollection;

/**
  * @var RouteCollection $routers
  */

$routes->get('/', 'CvController::index');
$routes->get('cv', 'CvController::index');
$routes->get('cv/pendidikan', 'CvController::pendidikan');
$routes->get('cv/pengalaman', 'CvController::pengalaman');
$routes->get('cv/keahlian', 'CvController::keahlian');
// Route to serve uploaded profile photos via controller (keeps files outside public/)
$routes->get('cv/foto/(:any)', 'CvController::foto/$1');