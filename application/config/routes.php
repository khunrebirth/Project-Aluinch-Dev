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
|	https://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'Front_End/Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/*
| -------------------------------------------------------------------------
| SET ROUTE FRONT END
| -------------------------------------------------------------------------
*/

$route['home'] = 'Front_End/Home';
$route['product'] = 'Front_End/Product';
$route['product/(:any)/(:any)'] = 'Front_End/Product/show/$group_product/$category_group_product';
$route['technology'] = 'Front_End/Technology';
$route['technology/(:any)'] = 'Front_End/Technology/show/$page_slug';
$route['project-references'] = 'Front_End/ProjectReferences';
$route['contact-us'] = 'Front_End/Contact';


/*
| -------------------------------------------------------------------------
| SET ROUTE BACK END
| -------------------------------------------------------------------------
*/

// Authentication
$route['backoffice'] = 'Back_End/Auth/Authentication';
$route['backoffice/login'] = 'Back_End/Auth/Authentication';
$route['backoffice/login_process'] = 'Back_End/Auth/Authentication/login_process';
$route['backoffice/logout'] = 'Back_End/Auth/Authentication/logout';

// Dashboard
$route['backoffice/dashboard'] = 'Back_End/Dashboard';
