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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


$route['dashboard']['get'] = 'dashboard/index';
$route['dashboard/apps']['get'] = 'dashboard/apps';
$route['dashboard/levels']['get'] = 'dashboard/levels';
$route['dashboard/types']['get'] = 'dashboard/types';

$route['dashboard/permissions']['get'] = 'dashboard/permissions';


$route['register']['get'] = 'home/register';
$route['register']['post'] = 'home/register_save';

$route['login']['get'] = 'home/login';
$route['login']['post'] = 'home/login_enter';

$route['application']['get'] = 'application/index';
$route['application/all'] = 'application/get_all';
$route['application/create']['post'] = 'application/create';
$route['application/update']['post'] = 'application/update';

$route['level/all'] = 'level/get_all';
$route['level/create']['post'] = 'level/create';
$route['level/update']['post'] = 'level/update';
$route['level/delete']['post'] = 'level/delete';

$route['type/all'] = 'type/get_all';
$route['type/create']['post'] = 'type/create';
$route['type/update']['post'] = 'type/update';
$route['type/delete']['post'] = 'type/delete';


$route['application_type/all'] = 'levelstypesapplication/get_app_types';
$route['application_type/add']['post'] = 'levelstypesapplication/add_app_type';
$route['application_type/remove']['post'] = 'levelstypesapplication/remove_app_type';

$route['application_level/all'] = 'levelstypesapplication/get_app_levels';
$route['application_level/add']['post'] = 'levelstypesapplication/add_app_level';
$route['application_level/remove']['post'] = 'levelstypesapplication/remove_app_level';



$route['departments']['get'] = 'department/index';
$route['departments/create']['get'] = 'department/create';
$route['departments/insert']['post'] = 'department/insert';
$route['departments/show/(:num)']['get'] = 'department/show/$1';
$route['departments/edit/(:num)']['get'] = 'department/edit/$1';
$route['departments/update']['post'] = 'department/update';

$route['departments/delete']['post'] = 'department/delete';
