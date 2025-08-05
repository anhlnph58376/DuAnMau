<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/../models/ProductModel.php';

class AdminController {
    public $modelProduct;

    public function __construct()
    {
        $this->modelProduct = new ProductModel();
    }

    private function checkAdmin() {
        if (!isset($_SESSION['user']) || $_SESSION['user']['vai_tro'] !== 'admin') {
            header('Location: ./index.php');
            exit();
        }
    }

    public function dashboard() {
        $this->checkAdmin();
        echo "Chào mừng đến với trang quản trị!";
    }

    public function listProducts() {
    $this->checkAdmin();
    $products =  $this->modelProduct->getAllProduct();
    require_once "./views/admin/products/index.php";
    }
}
?>
