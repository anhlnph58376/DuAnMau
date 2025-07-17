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
        $sql = "SELECT * FROM ruouvang";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $ruouvangList = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $ruouvangList;
    }

    public function getAllRuoucacnuoc()
    {
        $sql = "SELECT * FROM ruoucacnuoc";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $ruoucacnuocList = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $ruoucacnuocList;
    }
}
