<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
// $route['index'] = 'home';
// $route[''] = 'home';
$route['search'] = 'search';
$route['search/(:any)'] = 'search/index/$1';

$route['dashboard'] = 'dashboard';
$route['dash'] = 'dashboard';
$route['dashboard/post-bike'] = 'dashboard/post_bike';
$route['dashboard/store'] = 'dashboard/store';
$route['dashboard/profile'] = 'dashboard/profile';
$route['dashboard/edit-bike'] = 'dashboard';
$route['dashboard/edit-bike/(:num)'] = 'dashboard/edit_bike/$1';

$route['dashboard/post-blog'] = 'PostBlog/post_blog';
$route['dashboard/edit-blog/(:num)'] = 'PostBlog/edit_blog/$1';

$route['postblog/add_item'] = 'PostBlog/add_item';
$route['postblog/edit_item/(:num)'] = 'PostBlog/edit_item/$1';
$route['(:num)/blogs/(:any)'] = 'PostBlog/view_blog/$1/$2';

$route['sign_up'] = 'profile/sign_up';
$route['login'] = 'profile/sign_in';
$route['logout'] = 'profile/sign_out';

// url = mtbarena.com/compare?bike=model-here&bike=model-here/
$route['compare'] = 'compare';
$route['compare/check'] = 'compare/check';
$route['compare/(:any)'] = 'compare/index/$1';
$route['(:any)/compare/(:any)'] = 'Compare/index/$1/$2';

// url = mtbarena.com/mtb/model-here-full-specifications/
$route['(:any)/mtb/(:any)'] = 'SingleBike/index/$1/$2';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['sitemap\.xml'] = "sitemap/index";

$route['privacy'] = "home/privacy";
$route['terms'] = "home/terms";
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
