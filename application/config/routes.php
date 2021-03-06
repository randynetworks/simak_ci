<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Dashboard
$route['dashboard'] = 'dashboard';
$route['dashboard/menus'] = 'dashboard/menus';
$route['dashboard/set_menu'] = 'dashboard/set_menu';
$route['dashboard/destroy_menu/(:any)'] = 'dashboard/destroy_menu/$1';
$route['dashboard/edit_menu/(:any)'] = 'dashboard/edit_menu/$1';
$route['dashboard/update_menu'] = 'dashboard/update_menu';


$route['auth'] = 'auth';

$route['dashboard/materials'] = 'dashboard/materials';
$route['dashboard/set_material'] = 'dashboard/set_material';
$route['dashboard/destroy_material/(:any)'] = 'dashboard/destroy_material/$1';
$route['dashboard/edit_material/(:any)'] = 'dashboard/edit_material/$1';
$route['dashboard/update_material'] = 'dashboard/update_material';


$route['default_controller'] = 'auth';
$route['404_override'] = '';
$route['translate_uri_dashes'] = false;
