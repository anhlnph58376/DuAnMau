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

    public function showAddProductForm() {
        $this->checkAdmin();
        require_once './views/admin/products/create.php';
    }

    public function addProduct() {
        $this->checkAdmin();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $ten = $_POST['ten'];
            $mo_ta = $_POST['mo_ta'];
            $hinh_anh = ''; // Xử lý upload ảnh sau
            $gia = $_POST['gia'];
            $so_luong_kho = $_POST['so_luong_kho'];
            $nong_do_con = $_POST['nong_do_con'];
            $nam_san_xuat = $_POST['nam_san_xuat'];
            $hien_thi = $_POST['hien_thi'];
            $loai_id = $_POST['loai_id'];
            $quoc_gia_id = $_POST['quoc_gia_id'];
            $hang_id = $_POST['hang_id'];

            $this->modelProduct->addProduct($ten, $mo_ta, $hinh_anh, $gia, $so_luong_kho, $nong_do_con, $nam_san_xuat, $hien_thi, $loai_id, $quoc_gia_id, $hang_id);
            header('Location: ?url=admin/products');
        }
    }

    public function showEditProductForm($id) {
        $this->checkAdmin();
        $product = $this->modelProduct->getProductById($id);
        require_once './views/admin/products/edit.php';
    }

    public function updateProduct($id) {
        $this->checkAdmin();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $ten = $_POST['ten'];
            $mo_ta = $_POST['mo_ta'];
            $hinh_anh = ''; // Xử lý upload ảnh sau
            $gia = $_POST['gia'];
            $so_luong_kho = $_POST['so_luong_kho'];
            $nong_do_con = $_POST['nong_do_con'];
            $nam_san_xuat = $_POST['nam_san_xuat'];
            $hien_thi = $_POST['hien_thi'];
            $loai_id = $_POST['loai_id'];
            $quoc_gia_id = $_POST['quoc_gia_id'];
            $hang_id = $_POST['hang_id'];

            $this->modelProduct->updateProduct($id, $ten, $mo_ta, $hinh_anh, $gia, $so_luong_kho, $nong_do_con, $nam_san_xuat, $hien_thi, $loai_id, $quoc_gia_id, $hang_id);
            header('Location: ?url=admin/products');
        }
    }

    public function deleteProduct($id) {
        $this->checkAdmin();
        $this->modelProduct->deleteProduct($id);
        header('Location: ?url=admin/products');
    }
}
?>
