<?php

use Ductong\BaseMvc\Controllers\Admin\UserController;
use Ductong\BaseMvc\Controllers\Admin\CategoryController;
use Ductong\BaseMvc\Controllers\Admin\DashboardController;
use Ductong\BaseMvc\Controllers\Admin\ProductController;
use Ductong\BaseMvc\Controllers\Auth\LoginController;
use Ductong\BaseMvc\Controllers\Auth\LogoutController;
use Ductong\BaseMvc\Controllers\Client\CartController;
use Ductong\BaseMvc\Controllers\Client\HomeController;
use Ductong\BaseMvc\Router;

$router = new Router();

$router->addRoute('/', HomeController::class, 'index');

// Cart.
$router->addRoute('/cart', CartController::class, 'cart');
$router->addRoute('/addToCart', CartController::class, 'addToCart');
$router->addRoute('/removeFromCart', CartController::class, 'removeFromCart');
$router->addRoute('/incrementQuantity', CartController::class, 'incrementQuantity');
$router->addRoute('/decrementQuantity', CartController::class, 'decrementQuantity');
$router->addRoute('/createOrder', CartController::class, 'createOrder');

// Authentication
$router->addRoute('/login', LoginController::class, 'showForm');
$router->addRoute('/handleLogin', LoginController::class, 'handleLogin');
$router->addRoute('/logout', LogoutController::class, 'logout');

// Admin
$router->redirect('/admin', '/admin/dashboard');
$router->addRoute('/admin/dashboard', DashboardController::class, 'index');

$router->addRoute('/admin/users', UserController::class, 'index');
$router->addRoute('/admin/users/create', UserController::class, 'create');
$router->addRoute('/admin/users/update', UserController::class, 'update');
$router->addRoute('/admin/users/delete', UserController::class, 'delete');

$router->addRoute('/admin/categories', CategoryController::class, 'index');
$router->addRoute('/admin/categories/create', CategoryController::class, 'create');
$router->addRoute('/admin/categories/update', CategoryController::class, 'update');
$router->addRoute('/admin/categories/delete', CategoryController::class, 'delete');

$router->addRoute('/admin/products', ProductController::class, 'index');
$router->addRoute('/admin/products/create', ProductController::class, 'create');
$router->addRoute('/admin/products/update', ProductController::class, 'update');
$router->addRoute('/admin/products/delete', ProductController::class, 'delete');