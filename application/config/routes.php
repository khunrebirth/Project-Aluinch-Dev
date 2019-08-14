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
    | AJAX
    | -------------------------------------------------------------------------
    */

    $route['ajax/get/product/(:any)'] = 'Front_End/Product/ajax_get_product_by_id/$id';
    $route['ajax/get/project-references/(:any)'] = 'Front_End/ProjectReferences/ajax_get_project_by_id/$id';


/*
| -------------------------------------------------------------------------
| SET ROUTE BACK END
| -------------------------------------------------------------------------
*/

    /*
    | -------------------------------------------------------------------------
    | Authentication
    | -------------------------------------------------------------------------
    */

    $route['backoffice'] = 'Back_End/Auth/Authentication';
    $route['backoffice/login'] = 'Back_End/Auth/Authentication';
    $route['backoffice/login_process'] = 'Back_End/Auth/Authentication/login_process';
    $route['backoffice/logout'] = 'Back_End/Auth/Authentication/logout';

    /*
    | -------------------------------------------------------------------------
    | Dashboard
    | -------------------------------------------------------------------------
    */

    $route['backoffice/dashboard'] = 'Back_End/Dashboard';

    /*
    | -------------------------------------------------------------------------
    | Meta tag
    | -------------------------------------------------------------------------
    */

    $route['backoffice/mete-tag'] = 'Back_End/MetaTag';

    /*
    | -------------------------------------------------------------------------
    | Page
    | -------------------------------------------------------------------------
    */

        /*
        | -------------------------------------------------------------------------
        | Home
        | -------------------------------------------------------------------------
        */

        $route['backoffice/page/home'] = 'Back_End/home';
        $route['backoffice/page/home/content'] = 'Back_End/home/content';

        /*
        | -------------------------------------------------------------------------
        | Product
        | -------------------------------------------------------------------------
        */

        // Category
        $route['backoffice/page/product/group'] = 'Back_End/product_group';
        $route['backoffice/page/product/group/store'] = 'Back_End/product_group/store';
        $route['backoffice/page/product/group/edit/(:any)'] = "Back_End/product_group/edit/$1";
        $route['backoffice/page/product/group/update/(:any)'] = "Back_End/product_group/update/$1";
        $route['backoffice/page/product/group/destroy/(:any)'] = "Back_End/product_group/destroy/$1";

        // Groups
        $route['backoffice/page/product/category'] = 'Back_End/product_category';
        $route['backoffice/page/product/category/store'] = 'Back_End/product_category/store';
        $route['backoffice/page/product/category/edit/(:any)'] = "Back_End/product_category/edit/$1";
        $route['backoffice/page/product/category/update/(:any)'] = "Back_End/product_category/update/$1";
        $route['backoffice/page/product/category/destroy/(:any)'] = "Back_End/product_category/destroy/$1";

        // Products
        $route['backoffice/page/product'] = 'Back_End/product';
        $route['backoffice/page/product/list-products'] = 'Back_End/product';
        $route['backoffice/page/product/products/store'] = 'Back_End/product/store';
        $route['backoffice/page/product/products/edit/(:any)'] = "Back_End/product/edit/$1";
        $route['backoffice/page/product/products/update/(:any)'] = "Back_End/product/update/$1";
        $route['backoffice/page/product/products/destroy/(:any)'] = "Back_End/product/destroy/$1";
        $route['backoffice/page/product/content'] = 'Back_End/product/content';

        /*
        | -------------------------------------------------------------------------
        | Technology
        | -------------------------------------------------------------------------
        */

        // Category
        $route['backoffice/page/technology/category'] = 'Back_End/technology_category';
        $route['backoffice/page/technology/category/store'] = 'Back_End/product_category/store';
        $route['backoffice/page/technology/category/edit/(:any)'] = "Back_End/product_category/edit/$1";
        $route['backoffice/page/technology/category/update/(:any)'] = "Back_End/product_category/update/$1";
        $route['backoffice/page/technology/category/destroy/(:any)'] = "Back_End/product_category/destroy/$1";

        // Technologies
        $route['backoffice/page/technology'] = 'Back_End/technology';
        $route['backoffice/page/technology/list-technologies'] = 'Back_End/technology';
        $route['backoffice/page/technology/technologies/store'] = 'Back_End/technology/store';
        $route['backoffice/page/technology/technologies/edit/(:any)'] = "Back_End/technology/edit/$1";
        $route['backoffice/page/technology/technologies/update/(:any)'] = "Back_End/technology/update/$1";
        $route['backoffice/page/technology/technologies/destroy/(:any)'] = "Back_End/technology/destroy/$1";
        $route['backoffice/page/technology/content'] = 'Back_End/technology/content';

        /*
        | -------------------------------------------------------------------------
        | Project
        | -------------------------------------------------------------------------
        */

        // Category
        $route['backoffice/page/project/category'] = 'Back_End/project_category';
        $route['backoffice/page/project/category/store'] = 'Back_End/project_category/store';
        $route['backoffice/page/project/category/edit/(:any)'] = "Back_End/project_category/edit/$1";
        $route['backoffice/page/project/category/update/(:any)'] = "Back_End/project_category/update/$1";
        $route['backoffice/page/project/category/destroy/(:any)'] = "Back_End/project_category/destroy/$1";

        // Projects
        $route['backoffice/page/project'] = 'Back_End/project';
        $route['backoffice/page/project/list-projects'] = 'Back_End/project';
        $route['backoffice/page/project/projects/store'] = 'Back_End/project/store';
        $route['backoffice/page/project/projects/edit/(:any)'] = "Back_End/project/edit/$1";
        $route['backoffice/page/project/projects/update/(:any)'] = "Back_End/project/update/$1";
        $route['backoffice/page/project/projects/destroy/(:any)'] = "Back_End/project/destroy/$1";
        $route['backoffice/page/project/content'] = 'Back_End/project/content';

    /*
    | -------------------------------------------------------------------------
    | Contact
    | -------------------------------------------------------------------------
    */

    $route['backoffice/page/contact'] = 'Back_End/contact';

    /*
    | -------------------------------------------------------------------------
    | Contact
    | -------------------------------------------------------------------------
    */

    $route['backoffice/setting'] = 'Back_End/setting';
