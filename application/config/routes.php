<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

//client
$route['auth/login']['post']           = 'auth/login';
$route['auth/logout']['post']          = 'auth/logout';
$route['docs']['get']        	       = 'docs';
$route['reservation']['get']          	       = 'reservation';
$route['reservationadmintest/test_detail']          	       = 'reservationadmintest/test_detail';
$route['reservation/detail/(:num)']['get']    = 'reservation/detail/$1';
$route['reservation/create']['post']   	   = 'reservation/create';
$route['reservation/update/(:num)']['put']    = 'reservation/update/$1';
$route['reservation/delete/(:num)']['delete'] = 'reservation/delete/$1';

//admin
$route['auth/loginadmin']['post']           = 'auth/loginadmin';
$route['auth/logoutadmin']['post']          = 'auth/logoutadmin';
$route['reservationadmin']['get']          	       = 'reservationadmin';
$route['reservationadmin/detail/(:num)']['get']    = 'reservationadmin/detail/$1';
$route['reservationadmin/create']['post']   	   = 'reservationadmin/create';
$route['reservationadmin/update/(:num)']['put']    = 'reservationadmin/update/$1';
$route['reservationadmin/delete/(:num)']['delete'] = 'reservationadmin/delete/$1';

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
