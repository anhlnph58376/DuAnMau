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
        $ruoucacnuocList = $this->modelProduct->getAllRuoucacnuoc();
        require_once './views/trangchu.php';
    }
}
