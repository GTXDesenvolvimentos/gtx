<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


//$routes->get('/login', 'AuthController::login');
$routes->post('/loginProcess', 'AuthController::loginProcess');
$routes->get('/logout', 'SigninController::logout');
$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'auth']);
$routes->get('/vendas', 'vendasController::index',['filter' => 'authGuard']);



$routes->get('/', 'SigninController::index');
$routes->get('/signin', 'SigninController::index');
$routes->get('/signup', 'SignupController::index');


$routes->get('/membros', 'MembrosController::index',['filter' => 'authGuard']);
$routes->get('/profile', 'ProfileController::index',['filter' => 'authGuard']);
$routes->get('/vendas', 'vendasController::index',['filter' => 'authGuard']);
$routes->get('/pagamento', 'pagamentoController::index',['filter' => 'authGuard']);


$routes->match(['get', 'post'], 'SignupController/store', 'SignupController::store');
$routes->match(['get', 'post'], 'SigninController/loginAuth', 'SigninController::loginAuth');
$routes->match(['get', 'post'], 'MembrosController/cadMembros', 'MembrosController::cadMembros');
$routes->match(['get', 'post'], 'MembrosController/validaCPF', 'MembrosController::validaCPF');

$routes->match(['get', 'post'], 'VendasController/cadPedidos', 'VendasController::cadPedidos');


$routes->get('/sair', 'SigninController::logout');
