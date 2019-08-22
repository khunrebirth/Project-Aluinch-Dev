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
$route['product/(:any)/(:any)/(:any)'] = "Front_End/Product/show/$1/$2/$3";
$route['technology'] = 'Front_End/Technology';
$route['technology/(:any)/(:any)/(:any)'] = "Front_End/Technology/show/$1/$2/$3";
$route['technology/(:any)/(:any)'] = "Front_End/Technology/show_faq/$1/$2";
$route['project-references'] = 'Front_End/ProjectReferences';
$route['contact-us'] = 'Front_End/Contact';
$route['contact-us/send']['post'] = 'Front_End/Contact/send';

    /*
    | -------------------------------------------------------------------------
    | AJAX
    | -------------------------------------------------------------------------
    */

    $route['ajax/get/product/(:any)'] = 'Front_End/Product/ajax_get_product_by_id/$1';
    $route['ajax/get/project-references/(:any)'] = 'Front_End/ProjectReferences/ajax_get_project_by_id/$1';


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

    $route['backoffice'] = 'back_end/auth/authentication';
    $route['backoffice/login'] = 'back_end/auth/authentication';
    $route['backoffice/login_process'] = 'back_end/auth/authentication/login_process';
    $route['backoffice/logout'] = 'back_end/auth/authentication/logout';

    /*
    | -------------------------------------------------------------------------
    | Dashboard
    | -------------------------------------------------------------------------
    */

    $route['backoffice/dashboard'] = 'back_end/dashboard';

    /*
    | -------------------------------------------------------------------------
    | Meta tag
    | -------------------------------------------------------------------------
    */

    $route['backoffice/mete-tag'] = 'back_end/meta_tag';

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

        $route['backoffice/page/home'] = 'back_end/home';
        $route['backoffice/page/home/content'] = 'back_end/home/content';

        /*
        | -------------------------------------------------------------------------
        | Product
        | -------------------------------------------------------------------------
        */

        // Groups
        $route['backoffice/page/product/group'] = 'back_end/group_product';
        $route['backoffice/page/product/group/store'] = 'back_end/group_product/store';
        $route['backoffice/page/product/group/edit/(:any)'] = "back_end/group_product/edit/$1";
        $route['backoffice/page/product/group/update/(:any)'] = "back_end/group_product/update/$1";
        $route['backoffice/page/product/group/destroy/(:any)'] = "back_end/group_product/destroy/$1";

        // Category
        $route['backoffice/page/product/category'] = 'back_end/category_product';
        $route['backoffice/page/product/category/store'] = 'back_end/category_product/store';
        $route['backoffice/page/product/category/edit/(:any)'] = "back_end/category_product/edit/$1";
        $route['backoffice/page/product/category/update/(:any)'] = "back_end/category_product/update/$1";
        $route['backoffice/page/product/category/destroy/(:any)'] = "back_end/category_product/destroy/$1";

        // Products
        $route['backoffice/page/product/list-products'] = 'back_end/product';
        $route['backoffice/page/product/products/store'] = 'back_end/product/store';
        $route['backoffice/page/product/products/edit/(:any)'] = "back_end/product/edit/$1";
        $route['backoffice/page/product/products/update/(:any)'] = "back_end/product/update/$1";
        $route['backoffice/page/product/products/destroy/(:any)'] = "back_end/product/destroy/$1";
        $route['backoffice/page/product/content'] = 'back_end/product/content';

        /*
        | -------------------------------------------------------------------------
        | Technology
        | -------------------------------------------------------------------------
        */

        // Category
        $route['backoffice/page/technology/category'] = 'back_end/technology_category';
        $route['backoffice/page/technology/category/store'] = 'back_end/product_category/store';
        $route['backoffice/page/technology/category/edit/(:any)'] = "back_end/product_category/edit/$1";
        $route['backoffice/page/technology/category/update/(:any)'] = "back_end/product_category/update/$1";
        $route['backoffice/page/technology/category/destroy/(:any)'] = "back_end/product_category/destroy/$1";

        // Technologies
        $route['backoffice/page/technology'] = 'back_end/technology';
        $route['backoffice/page/technology/list-technologies'] = 'back_end/technology';
        $route['backoffice/page/technology/technologies/store'] = 'back_end/technology/store';
        $route['backoffice/page/technology/technologies/edit/(:any)'] = "back_end/technology/edit/$1";
        $route['backoffice/page/technology/technologies/update/(:any)'] = "back_end/technology/update/$1";
        $route['backoffice/page/technology/technologies/destroy/(:any)'] = "back_end/technology/destroy/$1";
        $route['backoffice/page/technology/content'] = 'back_end/technology/content';

        /*
        | -------------------------------------------------------------------------
        | Project
        | -------------------------------------------------------------------------
        */

        // Category
        $route['backoffice/page/project/category'] = 'back_end/project_category';
        $route['backoffice/page/project/category/store'] = 'back_end/project_category/store';
        $route['backoffice/page/project/category/edit/(:any)'] = "back_end/project_category/edit/$1";
        $route['backoffice/page/project/category/update/(:any)'] = "back_end/project_category/update/$1";
        $route['backoffice/page/project/category/destroy/(:any)'] = "back_end/project_category/destroy/$1";

        // Projects
        $route['backoffice/page/project'] = 'back_end/project';
        $route['backoffice/page/project/list-projects'] = 'back_end/project';
        $route['backoffice/page/project/projects/store'] = 'back_end/project/store';
        $route['backoffice/page/project/projects/edit/(:any)'] = "back_end/project/edit/$1";
        $route['backoffice/page/project/projects/update/(:any)'] = "back_end/project/update/$1";
        $route['backoffice/page/project/projects/destroy/(:any)'] = "back_end/project/destroy/$1";
        $route['backoffice/page/project/content'] = 'back_end/project/content';

    /*
    | -------------------------------------------------------------------------
    | Contact
    | -------------------------------------------------------------------------
    */

    $route['backoffice/page/contact'] = 'back_end/contact';

    /*
    | -------------------------------------------------------------------------
    | Contact
    | -------------------------------------------------------------------------
    */

    $route['backoffice/setting'] = 'back_end/setting';
