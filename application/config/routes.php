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
$route['default_controller'] = 'auth';
$route['login'] = 'auth';
$route['logout'] = 'auth/logout';
$route['attendance/report'] = 'attendance';
$route['attendance/history'] = 'attendance/view_attendance_history';
$route['employee/list'] = 'employee';
$route['employee/list/update/(:any)'] = 'employee/employee_update/$1';
$route['employee/list/delete/(:any)'] = 'employee/employee_delete/$1';
$route['employee/add'] = 'employee/add_new_employee';
$route['employee/profile/me'] = 'employee/my_profile';
$route['employee/profile/me/update'] = 'employee/my_profile_update';
$route['employee/profile/me/upload-photo'] = 'employee/upload_photo';
$route['employee/profile/me/upload-photo/remove'] = 'employee/remove_photo';
$route['employee/profile/me/change-password'] = 'employee/change_password';
$route['role/list'] = 'role';
$route['role/add'] = 'role/add_new_role';
$route['role/list/delete/(:num)'] = 'role/delete_role/$1';
$route['department/list'] = 'department';
$route['department/add'] = 'department/add_new_department';
$route['department/list/delete/(:num)'] = 'department/delete_department/$1';
$route['not_authorized'] = 'main/not_authorized';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
