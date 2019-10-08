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
$route['default_controller'] = 'front_end/Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/*
| -------------------------------------------------------------------------
| SET ROUTE FRONT END
| -------------------------------------------------------------------------
*/

$route['home'] = 'front_end/Home';
$route['product'] = 'front_end/Product';
$route['product/(:any)/(:any)/(:any)'] = "front_end/Product/show/$1/$2/$3";
$route['technology'] = 'front_end/Technology';
$route['technology/(:any)/(:any)/(:any)'] = "front_end/Technology/show/$1/$2/$3";
$route['technology/(:any)/(:any)'] = "front_end/Technology/show_faq/$1/$2";
$route['project-references'] = 'front_end/Project_references';
$route['contact'] = 'front_end/Contact';
$route['contact/send']['post'] = 'front_end/Contact/send';

    /*
    | -------------------------------------------------------------------------
    | AJAX
    | -------------------------------------------------------------------------
    */

	$route['ajax/get/product/(:any)'] = 'front_end/Product/ajax_get_product_by_id/$1';
	$route['ajax/get/project-references/(:any)/(:any)'] = 'front_end/Project_references/ajax_get_project_by_id/$1/$2';


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

    $route['backoffice'] = 'back_end/auth/Authentication';
    $route['backoffice/login'] = 'back_end/auth/Authentication';
    $route['backoffice/login_process'] = 'back_end/auth/Authentication/login_process';
    $route['backoffice/logout'] = 'back_end/auth/Authentication/logout';

    /*
    | -------------------------------------------------------------------------
    | Dashboard
    | -------------------------------------------------------------------------
    */

    $route['backoffice/dashboard'] = 'back_end/Dashboard';

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

        // Content
        $route['backoffice/page/home/content/(:any)'] = 'back_end/Home/edit_content/$1';
        $route['backoffice/page/home/content/update/(:any)'] = 'back_end/Home/update_content/$1';

        // Gallery
        $route['backoffice/page/home/gallery'] = 'back_end/Home/gallery';
        $route['backoffice/page/home/gallery/create'] = 'back_end/Home/gallery_create';
        $route['backoffice/page/home/gallery/store'] = 'back_end/Home/gallery_store';
        $route["backoffice/page/home/gallery/edit/(:any)"] = "back_end/Home/gallery_edit/$1";
        $route["backoffice/page/home/gallery/update/(:any)"] = "back_end/Home/gallery_update/$1";
        $route["backoffice/page/home/gallery/destroy/(:any)"] = "back_end/Home/gallery_destroy/$1";

        /*
        | -------------------------------------------------------------------------
        | Product
        | -------------------------------------------------------------------------
        */

        // Groups
        $route['backoffice/page/product/group'] = 'back_end/Group_product';
        $route['backoffice/page/product/group/create'] = 'back_end/Group_product/create';
        $route['backoffice/page/product/group/store'] = 'back_end/Group_product/store';
        $route['backoffice/page/product/group/edit/(:any)'] = "back_end/Group_product/edit/$1";
        $route['backoffice/page/product/group/update/(:any)'] = "back_end/Group_product/update/$1";
        $route['backoffice/page/product/group/destroy/(:any)'] = "back_end/Group_product/destroy/$1";

        // Category
        $route['backoffice/page/product/category/show/(:any)'] = 'back_end/Category_product/show/$1';
        $route['backoffice/page/product/category/create/(:any)'] = 'back_end/Category_product/create/$1';
        $route['backoffice/page/product/category/store'] = 'back_end/category_product/store';
        $route['backoffice/page/product/category/edit/(:any)'] = "back_end/Category_product/edit/$1";
        $route['backoffice/page/product/category/update/(:any)'] = "back_end/Category_product/update/$1";
        $route['backoffice/page/product/category/destroy/(:any)'] = "back_end/Category_product/destroy/$1";

        // Products
        $route['backoffice/page/product/product/show/(:any)/(:any)'] = 'back_end/Product/show/$1/$2';
        $route['backoffice/page/product/products/create/(:any)/(:any)'] = 'back_end/Product/create/$1/$2';
        $route['backoffice/page/product/products/store'] = "back_end/Product/store";
        $route['backoffice/page/product/products/edit/(:any)'] = "back_end/Product/edit/$1";
        $route['backoffice/page/product/products/update/(:any)'] = "back_end/Product/update/$1";
        $route['backoffice/page/product/products/destroy/(:any)'] = "back_end/Product/destroy/$1";

        // List Product Pictures
		$route['backoffice/page/product/list-product-pictures/(:any)/(:any)/(:any)'] = 'back_end/Product/list_product_pictures/$1/$2/$3';
		$route['backoffice/page/product/list-product-pictures/create/(:any)/(:any)/(:any)'] = 'back_end/Product/product_pictures_create/$1/$2/$3';
		$route['backoffice/page/product/list-product-pictures/store/(:any)/(:any)/(:any)'] = 'back_end/Product/product_pictures_store/$1/$2/$3';
		$route['backoffice/page/product/list-product-pictures/edit/(:any)/(:any)/(:any)/(:any)'] = 'back_end/Product/product_pictures_edit/$1/$2/$3/$4';
		$route['backoffice/page/product/list-product-pictures/update/(:any)/(:any)/(:any)/(:any)'] = 'back_end/Product/product_pictures_update/$1/$2/$3/$4';
		$route['backoffice/page/product/list-product-pictures/destroy/(:any)'] = 'back_end/Product/product_pictures_destroy/$1';

        /*
        | -------------------------------------------------------------------------
        | Technology
        | -------------------------------------------------------------------------
        */

        // Category
        $route['backoffice/page/technology/category'] = 'back_end/Category_technology';
        $route['backoffice/page/technology/category/store'] = 'back_end/Category_technology/store';
        $route['backoffice/page/technology/category/edit/(:any)'] = "back_end/Category_technology/edit/$1";
        $route['backoffice/page/technology/category/update/(:any)'] = "back_end/Category_technology/update/$1";
        $route['backoffice/page/technology/category/destroy/(:any)'] = "back_end/Category_technology/destroy/$1";
        $route['backoffice/page/technology/category/content'] = 'back_end/Category_technology/content';

        // Technologies
        $route['backoffice/page/technology/technology_videos/show/(:any)'] = 'back_end/Technology_video/show/$1';
        $route['backoffice/page/technology/technology_videos/create/(:any)'] = 'back_end/Technology_video/create/$1';
        $route['backoffice/page/technology/technology_videos/store'] = 'back_end/Technology_video/store';
        $route['backoffice/page/technology/technology_videos/edit/(:any)/(:any)'] = "back_end/Technology_video/edit/$1/$2";
        $route['backoffice/page/technology/technology_videos/update/(:any)'] = "back_end/Technology_video/update/$1";
        $route['backoffice/page/technology/technology_videos/destroy/(:any)'] = "back_end/Technology_video/destroy/$1";
        $route['backoffice/page/technology/technology_videos/destroy_question/(:any)'] = "back_end/Technology_video/destroy_question/$1";

		/*
		| -------------------------------------------------------------------------
		| Project
		| -------------------------------------------------------------------------
		*/

		// Content
        $route['backoffice/page/project/content/(:any)'] = 'back_end/Project/edit_content/$1';
        $route['backoffice/page/project/content/update/(:any)'] = 'back_end/Project/update_content/$1';

        // Projects
        $route['backoffice/page/project/projects'] = 'back_end/Project';
        $route['backoffice/page/project/projects/create'] = 'back_end/Project/create';
        $route['backoffice/page/project/projects/edit/(:any)'] = "back_end/Project/edit/$1";
        $route['backoffice/page/project/projects/update/(:any)'] = "back_end/Project/update/$1";
        $route['backoffice/page/project/projects/destroy/(:any)'] = "back_end/Project/destroy/$1";

		/*
		| -------------------------------------------------------------------------
		| Contact
		| -------------------------------------------------------------------------
		*/

    	// Content
        $route['backoffice/page/contact/content/(:any)'] = 'back_end/Contact_page/edit_content/$1';
		$route['backoffice/page/contact/content/update/(:any)'] = 'back_end/Contact_page/update_content/$1';

        // Info
        $route['backoffice/page/contact/info/(:any)'] = 'back_end/Contact_page/edit_info/$1';
		$route['backoffice/page/contact/info/update/(:any)'] = 'back_end/Contact_page/update_info/$1';

    /*
    | -------------------------------------------------------------------------
    | SETTING
    | -------------------------------------------------------------------------
    */

    $route['backoffice/setting'] = 'back_end/setting';
