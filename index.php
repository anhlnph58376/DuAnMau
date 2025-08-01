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

// Require toàn bộ file Models
require_once './models/ProductModel.php';

// Route
$act = $_GET['url'] ?? '/';


// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // Trang chủ
    '/'=>(new ProductController())->Home(),
    'detail'=>(new ProductController())->Detail(),
    'ruouvang'=>(new ProductController())->RuouVang(),
    'khuyenmai'=>(new ProductController())->KhuyenMai(),
    'ruoumanh'=>(new ProductController())->RuouManh(),

    // Cart
    'cart' => showCart(),
    'add-to-cart' => addToCart(),
    'more-to-cart' => moreToCart(),
    'update-cart' => updateCart(),
    'remove-from-cart' => removeFromCart(),

    // Auth
    'login' => showLoginForm(),
    'login-handle' => login(),
    'register' => showRegisterForm(),
    'register-handle' => register(),
    'logout' => logout(),
};
