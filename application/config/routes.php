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

// $route['default_controller'] = "home";
$route['default_controller'] = "home";
$route['404_override'] = 'error_404';
$route['translate_uri_dashes'] = FALSE;


/*********** USER DEFINED ROUTES *******************/

$route['home'] = 'home/index';
$route['about'] = 'home/about';
$route['catalogue'] = 'home/catalogue';
$route['harvard'] = 'home/harvard';
$route['result'] = 'home/result';
$route['home/(.*)'] = 'home/$1';

$route['book'] = "home/book";
$route['book/(.*)'] = "home/book/$1";

$route['user/book/(.*)'] = "user/book/$1";
$route['user/userListing/(:num)'] = "user/userListing/$1";
$route['user/editOld/(:num)'] = "user/editOld/$1";
$route['user/profile/(:any)'] = "user/profile/$1";
$route['user/profileUpdate/(:any)'] = "user/profileUpdate/$1";
$route['user/changePassword/(:any)'] = "user/changePassword/$1";
$route['user/login-history/(:num)'] = "user/loginHistoy/$1";
$route['user/login-history/(:num)/(:num)'] = "user/loginHistoy/$1/$2";
$route['user'] = 'user/profile';
$route['user/register'] = 'user/addNew';
$route['user/(.*)'] = 'user/$1';

$route['login/resetPasswordConfirmUser/(:any)'] = "login/resetPasswordConfirmUser/$1";
$route['login/resetPasswordConfirmUser/(:any)/(:any)'] = "login/resetPasswordConfirmUser/$1/$2";
$route['login/(.*)'] = 'login/$1';

/* End of file routes.php */
/* Location: ./application/config/routes.php */
