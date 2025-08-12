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

    // Admin loai ruou
    'admin/loai-ruou' => (new AdminController())->listLoaiRuou(),
    'admin/loai-ruou/create' => (new AdminController())->showAddLoaiRuouForm(),
    'admin/loai-ruou/store' => (new AdminController())->addLoaiRuou(),
    'admin/loai-ruou/edit' => (new AdminController())->showEditLoaiRuouForm($id),
    'admin/loai-ruou/update' => (new AdminController())->updateLoaiRuou($id),
    'admin/loai-ruou/delete' => (new AdminController())->deleteLoaiRuou($id),

    // Admin Hang Ruou
    'admin/hang-ruou' => (new AdminController())->listHangRuou(),
    'admin/hang-ruou/create' => (new AdminController())->showAddHangRuouForm(),
    'admin/hang-ruou/store' => (new AdminController())->addHangRuou(),
    'admin/hang-ruou/edit' => (new AdminController())->showEditHangRuouForm($id),
    'admin/hang-ruou/update' => (new AdminController())->updateHangRuou($id),
    'admin/hang-ruou/delete' => (new AdminController())->deleteHangRuou($id),

    // Admin Quoc Gia
    'admin/quoc-gia' => (new AdminController())->listQuocGia(),
    'admin/quoc-gia/create' => (new AdminController())->showAddQuocGiaForm(),
    'admin/quoc-gia/store' => (new AdminController())->addQuocGia(),
    'admin/quoc-gia/edit' => (new AdminController())->showEditQuocGiaForm($id),
    'admin/quoc-gia/update' => (new AdminController())->updateQuocGia($id),
    'admin/quoc-gia/delete' => (new AdminController())->deleteQuocGia($id),

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

    // Admin Khuyen Mai
    'admin/khuyen-mai' => (new AdminController())->listKhuyenMai(),
    'admin/khuyen-mai/create' => (new AdminController())->showAddKhuyenMaiForm(),
    'admin/khuyen-mai/store' => (new AdminController())->addKhuyenMai(),
    'admin/khuyen-mai/edit' => (new AdminController())->showEditKhuyenMaiForm($id),
    'admin/khuyen-mai/update' => (new AdminController())->updateKhuyenMai($id),
    'admin/khuyen-mai/delete' => (new AdminController())->deleteKhuyenMai($id),
    'admin/khuyen-mai/manage-products' => (new AdminController())->manageKhuyenMaiProducts($id),
    'admin/khuyen-mai/add-product' => (new AdminController())->addProductToKhuyenMai(),
    'admin/khuyen-mai/remove-product' => (new AdminController())->removeProductFromKhuyenMai(),

    // Admin Statistics
    'admin/statistics' => (new AdminController())->showStatistics(),

    // Admin Advanced Search
    'admin/advanced-search' => (new AdminController())->advancedSearch(),
};
