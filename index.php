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

// Tách URL thành các phần
$urlParts = explode('/', $url);
$route = $urlParts[0] . (isset($urlParts[1]) ? '/' . $urlParts[1] : '') . (isset($urlParts[2]) ? '/' . $urlParts[2] : '');
$id = $urlParts[3] ?? null;

match ($route) {
    // Trang chủ
    '/' => (new ProductController())->Home(),
    'search' => (new ProductController())->search(),
    'detail' => (new ProductController())->Detail(),
    'ruouvang' => (new ProductController())->RuouVang(),
    'khuyenmai' => (new ProductController())->KhuyenMai(),
    'ruoumanh' => (new ProductController())->RuouManh(),
    'add-comment' => (new ProductController())->addComment(),

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
    'admin/' => (new AdminController())->dashboard(),
    'admin/products' => (new AdminController())->listProducts(),
    'admin/products/create' => (new AdminController())->showAddProductForm(),
    'admin/products/store' => (new AdminController())->addProduct(),
    'admin/products/edit' => (new AdminController())->showEditProductForm($id),
    'admin/products/update' => (new AdminController())->updateProduct($id),
    'admin/products/delete' => (new AdminController())->deleteProduct($id),

    // Admin Users
    'admin/users' => (new AdminController())->listUsers(),
    'admin/users/create' => (new AdminController())->showAddUserForm(),
    'admin/users/add' => (new AdminController())->addUser(),
    'admin/users/edit' => (new AdminController())->showEditUserForm($id),
    'admin/users/update' => (new AdminController())->updateUser($id),
    'admin/users/delete' => (new AdminController())->deleteUser($id),

    // Admin Comments
    'admin/comments' => (new AdminController())->listComments(),
    'admin/comments/delete' => (new AdminController())->deleteComment($id),
};
