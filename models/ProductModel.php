<?php 
// Có class chứa các function thực thi tương tác với cơ sở dữ liệu 
class ProductModel 
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }

    // Viết truy vấn danh sách rượu vang
    public function getAllRuouvang()
    {
        $sql = "SELECT * FROM san_pham";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $ruouvangList = $stmt->fetchAll();
        return $ruouvangList;
    }

    function getDetail($id)  {
        $sql = "select * from san_pham where id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id'=>$id]);
        $detailList = $stmt->fetch();
        return $detailList;
    }
}