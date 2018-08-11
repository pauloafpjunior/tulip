<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['organizations/view/(:any)'] = 'organizations/view/$1';
$route['organizations/create'] = 'organizations/create';
$route['default_controller'] = 'organizations';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;