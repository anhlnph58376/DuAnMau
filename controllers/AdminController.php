<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/../models/ProductModel.php';
require_once __DIR__ . '/../models/UserModel.php';
require_once __DIR__ . '/../models/CommentModel.php';
require_once __DIR__ . '/../models/LoaiRuouModel.php';
require_once __DIR__ . '/../models/HangRuouModel.php';
require_once __DIR__ . '/../models/QuocGiaModel.php';
require_once __DIR__ . '/../models/KhuyenMaiModel.php';

class AdminController {
    public $modelProduct;
    public $modelUser;
    public $modelComment;
    public $modelLoaiRuou;
    public $modelHangRuou;
    public $modelQuocGia;
    public $modelKhuyenMai;

    public function __construct()
    {
        $this->modelProduct = new ProductModel();
        $this->modelUser = new UserModel();
        $this->modelComment = new CommentModel();
        $this->modelLoaiRuou = new LoaiRuouModel();
        $this->modelHangRuou = new HangRuouModel();
        $this->modelQuocGia = new QuocGiaModel();
        $this->modelKhuyenMai = new KhuyenMaiModel();
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
        $loai_ruou = $this->modelLoaiRuou->getAll();
        $hang_ruou = $this->modelHangRuou->getAll();
        $quoc_gia = $this->modelQuocGia->getAll();
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
                $hinh_anh = "ruouvang/" . $hinh_anh;
            }

            $this->modelProduct->addProduct($ten, $mo_ta, $hinh_anh, $gia, $so_luong_kho, $nong_do_con, $nam_san_xuat, $hien_thi, $loai_id, $quoc_gia_id, $hang_id);
            header('Location: ?url=admin/products');
        }
    }

    public function showEditProductForm($id) {
        $this->checkAdmin();
        $product = $this->modelProduct->getProductById($id);
        $loai_ruou = $this->modelLoaiRuou->getAll();
        $hang_ruou = $this->modelHangRuou->getAll();
        $quoc_gia = $this->modelQuocGia->getAll();
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
                    $hinh_anh = "ruouvang/" . $hinh_anh_new;
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

    // Loại rượu
    public function listLoaiRuou() {
        $this->checkAdmin();
        $loai_ruou = $this->modelLoaiRuou->getAll();
        require_once "./views/admin/loai_ruou/index.php";
    }

    public function showAddLoaiRuouForm() {
        $this->checkAdmin();
        require_once './views/admin/loai_ruou/create.php';
    }

    public function addLoaiRuou() {
        $this->checkAdmin();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $ten_loai = $_POST['ten_loai'];
            $this->modelLoaiRuou->add($ten_loai);
            header('Location: ?url=admin/loai-ruou');
        }
    }

    public function showEditLoaiRuouForm($id) {
        $this->checkAdmin();
        $loai = $this->modelLoaiRuou->getById($id);
        require_once './views/admin/loai_ruou/edit.php';
    }

    public function updateLoaiRuou($id) {
        $this->checkAdmin();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $ten_loai = $_POST['ten_loai'];
            $this->modelLoaiRuou->update($id, $ten_loai);
            header('Location: ?url=admin/loai-ruou');
        }
    }

    public function deleteLoaiRuou($id) {
        $this->checkAdmin();
        $this->modelLoaiRuou->delete($id);
        header('Location: ?url=admin/loai-ruou');
    }

    // Hãng rượu
    public function listHangRuou() {
        $this->checkAdmin();
        $hang_ruou = $this->modelHangRuou->getAll();
        require_once "./views/admin/hang_ruou/index.php";
    }

    public function showAddHangRuouForm() {
        $this->checkAdmin();
        require_once './views/admin/hang_ruou/create.php';
    }

    public function addHangRuou() {
        $this->checkAdmin();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $ten_hang = $_POST['ten_hang'];
            $this->modelHangRuou->add($ten_hang);
            header('Location: ?url=admin/hang-ruou');
        }
    }

    public function showEditHangRuouForm($id) {
        $this->checkAdmin();
        $hang = $this->modelHangRuou->getById($id);
        require_once './views/admin/hang_ruou/edit.php';
    }

    public function updateHangRuou($id) {
        $this->checkAdmin();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $ten_hang = $_POST['ten_hang'];
            $this->modelHangRuou->update($id, $ten_hang);
            header('Location: ?url=admin/hang-ruou');
        }
    }

    public function deleteHangRuou($id) {
        $this->checkAdmin();
        $this->modelHangRuou->delete($id);
        header('Location: ?url=admin/hang-ruou');
    }

    // Quốc gia
    public function listQuocGia() {
        $this->checkAdmin();
        $quoc_gia = $this->modelQuocGia->getAll();
        require_once "./views/admin/quoc_gia/index.php";
    }

    public function showAddQuocGiaForm() {
        $this->checkAdmin();
        require_once './views/admin/quoc_gia/create.php';
    }

    public function addQuocGia() {
        $this->checkAdmin();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $ten_quoc_gia = $_POST['ten_quoc_gia'];
            $this->modelQuocGia->add($ten_quoc_gia);
            header('Location: ?url=admin/quoc-gia');
        }
    }

    public function showEditQuocGiaForm($id) {
        $this->checkAdmin();
        $quoc = $this->modelQuocGia->getById($id);
        require_once './views/admin/quoc_gia/edit.php';
    }

    public function updateQuocGia($id) {
        $this->checkAdmin();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $ten_quoc_gia = $_POST['ten_quoc_gia'];
            $this->modelQuocGia->update($id, $ten_quoc_gia);
            header('Location: ?url=admin/quoc-gia');
        }
    }

    public function deleteQuocGia($id) {
        $this->checkAdmin();
        $this->modelQuocGia->delete($id);
        header('Location: ?url=admin/quoc-gia');
    }

    // Quản lý khuyến mãi
    public function listKhuyenMai() {
        $this->checkAdmin();
        $khuyen_mai = $this->modelKhuyenMai->getAllKhuyenMai();
        require_once "./views/admin/khuyen_mai/index.php";
    }

    public function showAddKhuyenMaiForm() {
        $this->checkAdmin();
        require_once './views/admin/khuyen_mai/create.php';
    }

    public function addKhuyenMai() {
        $this->checkAdmin();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $ten = $_POST['ten'];
            $mo_ta = $_POST['mo_ta'];
            $giam_phan_tram = $_POST['giam_phan_tram'];
            $ngay_bat_dau = $_POST['ngay_bat_dau'];
            $ngay_ket_thuc = $_POST['ngay_ket_thuc'];

            $this->modelKhuyenMai->addKhuyenMai($ten, $mo_ta, $giam_phan_tram, $ngay_bat_dau, $ngay_ket_thuc);
            header('Location: ?url=admin/khuyen-mai');
        }
    }

    public function showEditKhuyenMaiForm($id) {
        $this->checkAdmin();
        $khuyen_mai = $this->modelKhuyenMai->getKhuyenMaiById($id);
        require_once './views/admin/khuyen_mai/edit.php';
    }

    public function updateKhuyenMai($id) {
        $this->checkAdmin();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $ten_khuyen_mai = $_POST['ten'];
            $mo_ta = $_POST['mo_ta'];
            $giam_phan_tram = $_POST['giam_phan_tram'];
            $ngay_bat_dau = $_POST['ngay_bat_dau'];
            $ngay_ket_thuc = $_POST['ngay_ket_thuc'];

            $this->modelKhuyenMai->updateKhuyenMai($id, $ten_khuyen_mai, $mo_ta, $giam_phan_tram, $ngay_bat_dau, $ngay_ket_thuc);
            header('Location: ?url=admin/khuyen-mai');
        }
    }

    public function deleteKhuyenMai($id) {
        $this->checkAdmin();
        $this->modelKhuyenMai->deleteKhuyenMai($id);
        header('Location: ?url=admin/khuyen-mai');
    }

    // Quản lý sản phẩm khuyến mãi
    public function manageKhuyenMaiProducts($id) {
        $this->checkAdmin();
        $khuyen_mai = $this->modelKhuyenMai->getKhuyenMaiById($id);
        $products_in_promotion = $this->modelKhuyenMai->getProductsByKhuyenMai($id);
        $products_not_in_promotion = $this->modelKhuyenMai->getProductsNotInKhuyenMai($id);
        require_once './views/admin/khuyen_mai/manage_products.php';
    }

    public function addProductToKhuyenMai() {
        $this->checkAdmin();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $san_pham_id = $_POST['san_pham_id'];
            $khuyen_mai_id = $_POST['khuyen_mai_id'];
            
            $this->modelKhuyenMai->addProductToKhuyenMai($san_pham_id, $khuyen_mai_id);
            header('Location: ?url=admin/khuyen-mai/manage-products/' . $khuyen_mai_id);
        }
    }

    public function removeProductFromKhuyenMai() {
        $this->checkAdmin();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $san_pham_id = $_POST['san_pham_id'];
            $khuyen_mai_id = $_POST['khuyen_mai_id'];
            
            $this->modelKhuyenMai->removeProductFromKhuyenMai($san_pham_id, $khuyen_mai_id);
            header('Location: ?url=admin/khuyen-mai/manage-products/' . $khuyen_mai_id);
        }
    }

}
?>
