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

$route['admin/loginMe'] = 'login/loginMe';
$route['admin/dashboard'] = 'user';
$route['admin/logout'] = 'user/logout';
$route['admin/userListing'] = 'user/userListing';
$route['admin/userListing/(:num)'] = "user/userListing/$1";
$route['admin/addNew'] = "user/addNew";
$route['admin/addNewUser'] = "user/addNewUser";
$route['admin/editOld'] = "user/editOld";
$route['admin/editOld/(:num)'] = "user/editOld/$1";
$route['admin/editUser'] = "user/editUser";
$route['admin/deleteUser'] = "user/deleteUser";
$route['admin/profile'] = "user/profile";
$route['admin/profile/(:any)'] = "user/profile/$1";
$route['admin/profileUpdate'] = "user/profileUpdate";
$route['admin/profileUpdate/(:any)'] = "user/profileUpdate/$1";

$route['admin/loadChangePass'] = "user/loadChangePass";
$route['admin/changePassword'] = "user/changePassword";
$route['admin/changePassword/(:any)'] = "user/changePassword/$1";
$route['admin/pageNotFound'] = "user/pageNotFound";
$route['admin/checkEmailExists'] = "user/checkEmailExists";
$route['admin/login-history'] = "user/loginHistoy";
$route['admin/login-history/(:num)'] = "user/loginHistoy/$1";
$route['admin/login-history/(:num)/(:num)'] = "user/loginHistoy/$1/$2";

$route['admin/forgotPassword'] = "login/forgotPassword";
$route['admin/resetPasswordUser'] = "login/resetPasswordUser";
$route['admin/resetPasswordConfirmUser'] = "login/resetPasswordConfirmUser";
$route['admin/resetPasswordConfirmUser/(:any)'] = "login/resetPasswordConfirmUser/$1";
$route['admin/resetPasswordConfirmUser/(:any)/(:any)'] = "login/resetPasswordConfirmUser/$1/$2";
$route['admin/createPasswordUser'] = "login/createPasswordUser";

/* End of file routes.php */
/* Location: ./application/config/routes.php */
