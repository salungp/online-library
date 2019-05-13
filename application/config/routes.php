<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['detail/(:any)'] = 'home/detail/$1';
$route['cari'] = 'home/cari';
$route['login'] = 'auth/login';
$route['register'] = 'auth/register';
$route['_register'] = 'auth/_register';
$route['logout'] = 'auth/logout';
$route['profile/foto'] = 'auth/foto';
$route['profile/edit'] = 'auth/edit';
$route['profile/donasi'] = 'home/donasi';
$route['donasi'] = 'auth/auth_donasi';
$route['profile'] = 'auth/profile/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
