<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'proyek';
$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;

$route['proyek'] = 'proyek/index';
$route['proyek/create'] = 'proyek/create';
$route['proyek/store'] = 'proyek/store';
$route['proyek/edit/(:any)'] = 'proyek/edit/$1';
$route['proyek/update/(:any)'] = 'proyek/update/$1';
$route['proyek/delete/(:any)'] = 'proyek/delete/$1';

$route['lokasi'] = 'lokasi/index';
$route['lokasi/create'] = 'lokasi/create';
$route['lokasi/store'] = 'lokasi/store';
$route['lokasi/edit/(:num)'] = 'lokasi/edit/$1';
$route['lokasi/update/(:num)'] = 'lokasi/update/$1';
$route['lokasi/delete/(:any)'] = 'lokasi/delete/$1';
?>
