<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['organizations/create'] = 'organizations/create';
$route['(:any)'] = 'organizations/index';
$route['default_controller'] = 'organizations';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;