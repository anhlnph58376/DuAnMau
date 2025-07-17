<?php
// Có class chứa các function thực thi tương tác với cơ sở dữ liệu 
class ProductModel
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }

    // Viết truy vấn danh sách sản phẩm 
    public function getAllRuouvang()
    {
        $sql = "SELECT * FROM ruouvang";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $ruouvangList = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $ruouvangList;
    }
}
