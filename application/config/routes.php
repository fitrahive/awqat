<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
$route['404_override'] = 'override/notfound';
$route['500_override'] = 'override/server';
$route['translate_uri_dashes'] = false;

$route['sync']['GET'] = 'home/sync';
$route['screen']['GET'] = 'home/screen';

$route['screen/login']['GET'] = 'app/login';
$route['screen/login']['POST'] = 'app/login/process';
$route['screen/logout']['GET'] = 'app/login/logout';

$route['screen/settings']['GET'] = 'app/settings';
$route['screen/settings']['POST'] = 'app/settings/process';

$route['screen/localization']['GET'] = 'app/localization';
$route['screen/localization']['POST'] = 'app/localization/process';

$route['screen/themes']['GET'] = 'app/themes';
$route['screen/themes/(:any)']['GET'] = 'app/themes/change/$1';

$route['screen/quotes']['GET'] = 'app/quotes';
$route['screen/quotes']['POST'] = 'app/quotes/insert';
$route['screen/quotes/update/(:num)']['POST'] = 'app/quotes/update/$1';
$route['screen/quotes/delete/(:num)']['GET'] = 'app/quotes/delete/$1';

$route['screen/account']['GET'] = 'app/account';
$route['screen/account']['POST'] = 'app/account/process';

// disable auto route
$route['(.*)'] = 'none';
