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
$route['default_controller'] = 'Login_pengadu';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login_pengaduan'] = 'Login_pengadu'; //path lain dari login
$route['karyawan'] = 'Login/login_karyawan';
$route['forgot'] = 'forgot';
$route['forgot/reset_password'] = 'forgot/lupa_password';
$route['logout_karyawan'] = 'login/logout_karyawan';
$route['logout'] = 'Login_pengadu/logout';

//admin
$route['admin'] = 'admin/Cadm_log';  //akses halaman pertama
$route['admin/data_lokasi'] = 'admin/Cadm_dataruangtempat';  //akses halaman kedua
$route['admin/data_user'] = 'admin/Cadm_datauser';
$route['admin/data_user/upload'] = 'admin/Cadm_datauser/upload';
$route['admin/tambah_ruang'] = 'admin/Cadm_dataruangtempat/tambah_ruang';
$route['admin/edit_ruang'] = 'admin/Cadm_dataruangtempat/edit_ruang';
$route['admin/tambah_tempat'] = 'admin/Cadm_dataruangtempat/tambah_tempat';
$route['admin/edit_tempat'] = 'admin/Cadm_dataruangtempat/edit_tempat';
$route['admin/hapus_ruang/(:num)'] = 'admin/Cadm_dataruangtempat/hapus_ruang/$1';
$route['admin/hapus_tempat/(:num)'] = 'admin/Cadm_dataruangtempat/hapus_tempat/$1';
$route['admin/download'] = 'admin/Cadm_datauser/download';
$route['admin/edit_user'] = 'admin/Cadm_datauser/edit_user';
$route['admin/hapus_user/(:num)'] = 'admin/Cadm_datauser/hapus_user/$1';
$route['admin/ubah_password'] = 'admin/Cadm_datauser/save_password';

//user
$route['user'] = 'user/Cform';
$route['user/home'] = 'user/Cform/home';
$route['user/riwayat_pengaduan'] = 'user/Criwayat_pengaduanuser';
$route['user/insert_data'] = 'user/Cform/tambah';

//analis
$route['analis'] = 'analis/Cpengaduan_masuk';
$route['analis/detail_pengaduan/(:num)'] = 'analis/Cpengaduan_masuk/detail/$1';
$route['analis/riwayat_pengaduan'] = 'analis/Canalis_riwayatpeng';
$route['analis/kirim_pengaduan'] = 'analis/Cpengaduan_masuk/kirim';
$route['analis/ubah_pengaduan'] = 'analis/Cpengaduan_masuk/ubah';
$route['analis/buat_kategori'] = 'analis/Cpengaduan_masuk/tambah_kategori';
$route['analis/update_status'] = 'analis/Cpengaduan_masuk/update_status';
$route['analis/riwayat_deleted/(:num)'] = 'analis/Canalis_riwayatpeng/deleted/$1';
$route['analis/ubah_password'] = 'analis/Canalis_riwayatpeng/save_password';
$route['analis/ubah_password'] = 'analis/Cpengaduan_masuk/save_password';
$route['analis/laporan'] = 'analis/Claporan_analis';
$route['analis/cetak'] = 'analis/Claporan_analis/print_laporan';
$route['analis/kelola'] = 'analis/Ckategori_jenis';
$route['analis/tambah_kategori'] = 'analis/Ckategori_jenis/tambah_kategori';
$route['analis/edit_kategori'] = 'analis/Ckategori_jenis/edit_kategori';
$route['analis/tambah_jenis'] = 'analis/Ckategori_jenis/tambah_jenis';
$route['analis/edit_jenis'] = 'analis/Ckategori_jenis/edit_jenis';
$route['analis/hapus_kategori/(:num)'] = 'analis/Ckategori_jenis/hapus_kategori/$1';
$route['analis/hapus_jenis/(:num)'] = 'analis/Ckategori_jenis/hapus_jenis/$1';
$route['analis/konfirmasi/(:num)'] = 'analis/Cpengaduan_masuk/konfirmasi/$1';

//koor
$route['koordinator'] = 'koor/Ckpengaduan_masuk';
$route['koordinator/riwayat'] = 'koor/Ck_riwayatpeng';
$route['koordinator/detail_pengaduan_koor/(:num)'] = 'koor/Ckpengaduan_masuk/detail_koor/$1';
$route['koordinator/konfirmasi/(:num)'] = 'koor/Ckpengaduan_masuk/konfirmasi/$1';
$route['koordinator/ubah_password_riwayat'] = 'analis/Ck_riwayatpeng/save_password';
$route['koordinator/ubah_password_masuk'] = 'koor/Ckpengaduan_masuk/save_password';
$route['koordinator/kirim_pengaduan'] = 'koor/Ckpengaduan_masuk/kirim';

$route['laporan'] = 'laporan';

