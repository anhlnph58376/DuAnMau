<?php 
session_start();
// Require toàn bộ các file khai báo môi trường, thực thi,...(không require view)

// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/ProductController.php';
require_once './controllers/UserController.php';
require_once './controllers/CartController.php';
require_once './controllers/AdminController.php';

// Require toàn bộ file Models
require_once './models/ProductModel.php';
require_once './models/UserModel.php';

// Route
$url = $_GET['url'] ?? '/';

match ($url) {
    // Trang chủ
    '/' => (new ProductController())->Home(),
    'detail' => (new ProductController())->Detail(),
    'ruouvang' => (new ProductController())->RuouVang(),
    'khuyenmai' => (new ProductController())->KhuyenMai(),
    'ruoumanh' => (new ProductController())->RuouManh(),

    // Cart
    'cart' => showCart(),
    'add-to-cart' => addToCart(),
    'update-cart' => updateCart(),
    'remove-from-cart' => removeFromCart(),

    // Auth
    'login' => showLoginForm(),
    'login-handle' => login(),
    'register' => showRegisterForm(),
    'register-handle' => register(),
    'logout' => logout(),

    // Admin
    'admin' => (new AdminController())->dashboard(),
    'admin/products' => (new AdminController())->listProducts(),
};
