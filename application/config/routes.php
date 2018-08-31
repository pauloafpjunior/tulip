<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'users';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['organizations/view/(:num)'] = 'private/organizations/view/$1';
$route['bulletins/view/(:num)'] = 'private/bulletins/view/$1';
$route['api/organizations'] = 'rest/organizations';
$route['api/bulletins'] = 'rest/bulletins';
$route['api/sections'] = 'rest/sections';
