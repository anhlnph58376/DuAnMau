<?php
// có class chứa các function thực thi xử lý logic
class ProductController
{
    public $modelProduct;

    public function __construct()
    {
        $this->modelProduct = new ProductModel();
    }

    public function Home()
    {
        $ruouvangList = $this->modelProduct->getAllRuouvang();
        require_once './views/trangchu.php';
    }

    public function Detail(){
        if (isset($_GET['id'])) {
            $detailList = $this->modelProduct->getDetail($_GET['id']);
            require_once './views/detail.php';
        }
    }

    public function RuouVang()
    {
        $ruouvangList = $this->modelProduct->getAllRuouvang();
        require_once './views/ruouvang.php';
    }

    public function KhuyenMai()
    {
        $ruouvangList = $this->modelProduct->getAllKhuyenMai();
        require_once './views/khuyenmai.php';
    }

    public function RuouManh()
    {
        $ruouvangList = $this->modelProduct->getAllRuouvang();
        require_once './views/ruoumanh.php';
    }
}
