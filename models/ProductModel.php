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
        $today = date('Y-m-d');
        $sql = "
            SELECT
                sp.*,
                km.giam_phan_tram
            FROM
                san_pham sp
            LEFT JOIN
                sp_khuyen_mai spkm ON sp.id = spkm.san_pham_id
            LEFT JOIN
                khuyen_mai km ON km.id = spkm.khuyen_mai_id AND km.ngay_bat_dau <= :today AND km.ngay_ket_thuc >= :today
            WHERE
                sp.id = :id
        ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id' => $id, ':today' => $today]);
        $detailList = $stmt->fetch();
        return $detailList;
    }

        public function getAllKhuyenMai()
    {
        $today = date('Y-m-d');
        $sql = "
            SELECT sp.*, km.giam_phan_tram
            FROM sp_khuyen_mai spkm
            JOIN san_pham sp ON sp.id = spkm.san_pham_id
            JOIN khuyen_mai km ON km.id = spkm.khuyen_mai_id
            WHERE km.ngay_bat_dau <= :today AND km.ngay_ket_thuc >= :today
        ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':today' => $today]);
        return $stmt->fetchAll();
    }

}
