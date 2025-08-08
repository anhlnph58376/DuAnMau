<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/../models/ProductModel.php';
require_once __DIR__ . '/../models/UserModel.php';
require_once __DIR__ . '/../models/CommentModel.php';

class AdminController {
    public $modelProduct;
    public $modelUser;
    public $modelComment;

    public function __construct()
    {
        $this->modelProduct = new ProductModel();
        $this->modelUser = new UserModel();
        $this->modelComment = new CommentModel();
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
        $keyword = $_GET['keyword'] ?? null;
        if ($keyword) {
            $products = $this->modelProduct->searchProducts($keyword);
        } else {
            $products =  $this->modelProduct->getAllProduct();
        }
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
            $gia = $_POST['gia'];
            $so_luong_kho = $_POST['so_luong_kho'];
            $nong_do_con = $_POST['nong_do_con'];
            $nam_san_xuat = $_POST['nam_san_xuat'];
            $hien_thi = $_POST['hien_thi'];
            $loai_id = $_POST['loai_id'];
            $quoc_gia_id = $_POST['quoc_gia_id'];
            $hang_id = $_POST['hang_id'];

            $hinh_anh = '';
            if (isset($_FILES['hinh_anh']) && $_FILES['hinh_anh']['error'] === UPLOAD_ERR_OK) {
                $hinh_anh = basename($_FILES['hinh_anh']['name']);
                $target_dir = "uploads/ruouvang/";
                $target_file = $target_dir . $hinh_anh;
                move_uploaded_file($_FILES['hinh_anh']['tmp_name'], $target_file);
            }

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
            $product = $this->modelProduct->getProductById($id);
            $ten = $_POST['ten'];
            $mo_ta = $_POST['mo_ta'];
            $gia = $_POST['gia'];
            $so_luong_kho = $_POST['so_luong_kho'];
            $nong_do_con = $_POST['nong_do_con'];
            $nam_san_xuat = $_POST['nam_san_xuat'];
            $hien_thi = $_POST['hien_thi'];
            $loai_id = $_POST['loai_id'];
            $quoc_gia_id = $_POST['quoc_gia_id'];
            $hang_id = $_POST['hang_id'];

            $hinh_anh = $product['hinh_anh'];
            if (isset($_FILES['hinh_anh']) && $_FILES['hinh_anh']['error'] === UPLOAD_ERR_OK) {
                $hinh_anh_new = basename($_FILES['hinh_anh']['name']);
                $target_dir = "uploads/ruouvang/";
                $target_file = $target_dir . $hinh_anh_new;
                if(move_uploaded_file($_FILES['hinh_anh']['tmp_name'], $target_file)) {
                    $hinh_anh = $hinh_anh_new;
                }
            }

            $this->modelProduct->updateProduct($id, $ten, $mo_ta, $hinh_anh, $gia, $so_luong_kho, $nong_do_con, $nam_san_xuat, $hien_thi, $loai_id, $quoc_gia_id, $hang_id);
            header('Location: ?url=admin/products');
        }
    }

    public function deleteProduct($id) {
        $this->checkAdmin();
        $this->modelProduct->deleteProduct($id);
        header('Location: ?url=admin/products');
    }

    // User management
    public function listUsers() {
        $this->checkAdmin();
        $users = $this->modelUser->getAllUsers();
        require_once "./views/admin/users/index.php";
    }

    public function showAddUserForm() {
        $this->checkAdmin();
        require_once './views/admin/users/create.php';
    }

    public function addUser() {
        $this->checkAdmin();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $ten_dang_nhap = $_POST['ten_dang_nhap'];
            $mat_khau = $_POST['mat_khau'];
            $email = $_POST['email'];
            $sdt = $_POST['sdt'];
            $dia_chi = $_POST['dia_chi'];
            $vai_tro = $_POST['vai_tro'];

            $this->modelUser->addUser($ten_dang_nhap, $mat_khau, $email, $sdt, $dia_chi, $vai_tro);
            header('Location: ?url=admin/users');
        }
    }

    public function showEditUserForm($id) {
        $this->checkAdmin();
        $user = $this->modelUser->getUserById($id);
        require_once './views/admin/users/edit.php';
    }

    public function updateUser($id) {
        $this->checkAdmin();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $ten_dang_nhap = $_POST['ten_dang_nhap'];
            $email = $_POST['email'];
            $sdt = $_POST['sdt'];
            $dia_chi = $_POST['dia_chi'];
            $vai_tro = $_POST['vai_tro'];

            $this->modelUser->updateUser($id, $ten_dang_nhap, $email, $sdt, $dia_chi, $vai_tro);
            header('Location: ?url=admin/users');
        }
    }

    public function deleteUser($id) {
        $this->checkAdmin();
        $this->modelUser->deleteUser($id);
        header('Location: ?url=admin/users');
    }

    // Comment management
    public function listComments() {
        $this->checkAdmin();
        $comments = $this->modelComment->getAllComments();
        require_once "./views/admin/comments/index.php";
    }

    public function deleteComment($id) {
        $this->checkAdmin();
        $this->modelComment->deleteComment($id);
        header('Location: ?url=admin/comments');
    }
}
?>
