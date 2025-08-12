<?php
require_once './models/CommentModel.php';
// có class chứa các function thực thi xử lý logic
class ProductController
{
    public $modelProduct;
    public $modelComment;

    public function __construct()
    {
        $this->modelProduct = new ProductModel();
        $this->modelComment = new CommentModel();
    }

    public function Home()
    {
        $keyword = $_GET['keyword'] ?? null;
        $searchResults = [];
        
        if ($keyword) {
            $searchResults = $this->modelProduct->searchProducts($keyword);
        }
        
        $ruouvangList = $this->modelProduct->getAllProduct();
        require_once './views/trangchu.php';
    }

    public function Detail(){
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $detailList = $this->modelProduct->getDetail($id);
            $comments = $this->modelComment->getCommentsByProductId($id);
            require_once './views/detail.php';
        }
    }

    public function RuouVang()
    {
        $keyword = $_GET['keyword'] ?? null;
        if ($keyword) {
            $ruouvangList = $this->modelProduct->searchProducts($keyword);
        } else {
            $ruouvangList = $this->modelProduct->getAllProduct();
        }
        require_once './views/ruouvang.php';
    }

    public function KhuyenMai()
    {
        $keyword = $_GET['keyword'] ?? null;
        if ($keyword) {
            $ruouvangList = $this->modelProduct->searchProducts($keyword);
        } else {
            $ruouvangList = $this->modelProduct->getAllKhuyenMai();
        }
        require_once './views/khuyenmai.php';
    }

    public function RuouManh()
    {
        $keyword = $_GET['keyword'] ?? null;
        if ($keyword) {
            $ruouvangList = $this->modelProduct->searchProducts($keyword);
        } else {
            $ruouvangList = $this->modelProduct->getRuouManhHighAlcohol();
        }
        require_once './views/ruoumanh.php';
    }

    public function addComment()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['user'])) {
            $id = $_POST['san_pham_id'];
            $user_id = $_SESSION['user']['id'];
            $noi_dung = $_POST['noi_dung'];

            $this->modelComment->addComment($id, $user_id, $noi_dung);
            header('Location: ?url=detail&id=' . $id);
        } else {
            // Chuyển hướng đến trang đăng nhập nếu người dùng chưa đăng nhập
            header('Location: ?url=login');
        }
    }

    public function search()
    {
        $keyword = $_GET['keyword'] ?? null;
        $searchResults = [];
        
        if ($keyword) {
            $searchResults = $this->modelProduct->searchProducts($keyword);
        }
        
        $ruouvangList = $this->modelProduct->getAllProduct();
        require_once './views/trangchu.php';
    }
}
