<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */



$routes->get('/', 'Home::homepage');


$routes->get('/pengaduan', 'Pengaduan::index');
$routes->post('/pengaduan/store', 'Pengaduan::store');


$routes->get('/registrasi', 'Auth\Registrasi::index');
$routes->post('/registrasi/store', 'Auth\Registrasi::store');

$routes->get('email-verification', 'Auth\EmailVerivication::verifyEmailRegistration');

$routes->get('email-verification/resend', 'Auth\EmailVerivication::viewResendEmailVerification');
$routes->post('email-verification/resend', 'Auth\EmailVerivication::resendEmailVerification');

$routes->get('/login', 'Auth\Login::index');
$routes->post('/login/authenticate', 'Auth\Login::authenticate');

$routes->get('forgot-password', 'Auth\ForgotPassword::index');
$routes->post('forgot-password/reset-password', 'Auth\ForgotPassword::resetPassword');
$routes->get('reset-password', 'Auth\EmailVerivication::verifyEmailForgotPassword');

$routes->post('logout', 'Auth\Logout::index');

$routes->get('change-password', 'Auth\ChangePassword::index');
$routes->post('change-password/update-forgot-password', 'Auth\  ChangePassword::updateForgotPassword');

$routes->get('/dashboard', 'Complaint::index');
$routes->get('/gambar', 'Complaint::buktifoto');
$routes->get('/grafik', 'Complaint::grafik');
$routes->post('/complaint/store', 'Complaint::store');
// $routes->get('/complaint/delete/(:segment)', 'Complaint::delete');
$routes->get('complaint/delete/(:num)', 'Complaint::delete/$1', ['as' => 'complaint-delete']);

