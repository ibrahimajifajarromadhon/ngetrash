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
$route['default_controller'] = 'user';
$route['404_override'] = 'NotFound';
$route['translate_uri_dashes'] = FALSE;

$route['admin/login'] = 'Admin/login';
$route['admin/register'] = 'Admin/register';

$route['admin_petugas'] = 'AdminPetugas';
$route['admin_petugas/delete/(:num)'] = 'AdminPetugas/delete/$1';
$route['admin_petugas/ubah_status/(:num)'] = 'AdminPetugas/ubah_status/$1';
$route['admin_petugas/page/(:num)'] = 'AdminPetugas/index/$1';

$route['admin_user'] = 'AdminUser';
$route['admin_user/delete/(:num)'] = 'AdminUser/delete/$1';
$route['admin_user/ubah_status/(:num)'] = 'AdminUser/ubah_status/$1';
$route['admin_user/page/(:num)'] = 'AdminUser/index/$1';

$route['admin_barang'] = 'AdminBarang';
$route['admin_barang/add'] = 'AdminBarang/add';
$route['admin_barang/save'] = 'AdminBarang/save';
$route['admin_barang/edit'] = 'AdminBarang/edit';
$route['admin_barang/page/(:num)'] = 'AdminBarang/index/$1';
$route['admin_barang/get_by_id/(:num)'] = 'AdminBarang/get_by_id/$1';
$route['admin_barang/delete/(:num)'] = 'AdminBarang/delete/$1';

$route['admin_print/laporan_petugas/page/(:num)'] = 'Admin/laporan_petugas/$1';
$route['admin_print/laporan_user/page/(:num)'] = 'Admin/laporan_user/$1';
$route['admin_print/laporan_iuran/page/(:num)'] = 'Admin/laporan_iuran/$1';
$route['admin_print/laporan_status/page/(:num)'] = 'Admin/laporan_status/$1';
$route['admin_print/laporan_daur/page/(:num)'] = 'Admin/laporan_daur/$1';

$route['admin_print/laporan_petugas'] = 'Admin/laporan_petugas';
$route['admin_print/laporan_user'] = 'Admin/laporan_user';
$route['admin_print/laporan_iuran'] = 'Admin/laporan_iuran';
$route['admin_print/laporan_status'] = 'Admin/laporan_status';
$route['admin_print/laporan_daur'] = 'Admin/laporan_daur';

$route['admin_print/print_petugas'] = 'Admin/print_petugas';
$route['admin_print/print_user'] = 'Admin/print_user';
$route['admin_print/print_iuran'] = 'Admin/print_iuran';
$route['admin_print/print_status'] = 'Admin/print_status';
$route['admin_print/print_daur'] = 'Admin/print_daur';

$route['petugas/login'] = 'Petugas/login';
$route['petugas/register'] = 'Petugas/register';

$route['petugas_iuran'] = 'PetugasIuran';
$route['petugas_iuran/add'] = 'PetugasIuran/add';
$route['petugas_iuran/save'] = 'PetugasIuran/save';
$route['petugas_iuran/edit'] = 'PetugasIuran/edit';
$route['petugas_iuran/page/(:num)'] = 'PetugasIuran/index/$1';
$route['petugas_iuran/get_by_id/(:num)'] = 'PetugasIuran/get_by_id/$1';
$route['petugas_iuran/delete/(:num)'] = 'PetugasIuran/delete/$1';

$route['petugas_status'] = 'PetugasStatus';
$route['petugas_status/add'] = 'PetugasStatus/add';
$route['petugas_status/save'] = 'PetugasStatus/save';
$route['petugas_status/edit'] = 'PetugasStatus/edit';
$route['petugas_status/page/(:num)'] = 'PetugasStatus/index/$1';
$route['petugas_status/get_by_id/(:num)'] = 'PetugasStatus/get_by_id/$1';
$route['petugas_status/delete/(:num)'] = 'PetugasStatus/delete/$1';

$route['petugas_daur'] = 'PetugasDaur';
$route['petugas_daur/add'] = 'PetugasDaur/add';
$route['petugas_daur/save'] = 'PetugasDaur/save';
$route['petugas_daur/edit'] = 'PetugasDaur/edit';
$route['petugas_daur/page/(:num)'] = 'PetugasDaur/index/$1';
$route['petugas_daur/get_by_id/(:num)'] = 'PetugasDaur/get_by_id/$1';
$route['petugas_daur/delete/(:num)'] = 'PetugasDaur/delete/$1';

$route['user/login'] = 'User/login';
$route['user/register'] = 'User/register';

$route['user'] = 'User';
$route['user/status'] = 'UserStatus';
$route['user/status/page/(:num)'] = 'UserStatus/index/$1';
$route['user/riwayat'] = 'UserRiwayat';
$route['user/riwayat/page/(:num)'] = 'UserRiwayat/index/$1';
