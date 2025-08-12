<?php 
// Model quản lý khuyến mãi
class KhuyenMaiModel 
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }

    // Lấy tất cả khuyến mãi
    public function getAllKhuyenMai()
    {
        $sql = "SELECT * FROM khuyen_mai ORDER BY ngay_bat_dau DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Lấy khuyến mãi theo ID
    public function getKhuyenMaiById($id)
    {
        $sql = "SELECT * FROM khuyen_mai WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }

    // Thêm khuyến mãi mới
    public function addKhuyenMai($ten, $mo_ta, $giam_phan_tram, $ngay_bat_dau, $ngay_ket_thuc)
    {
        $sql = "INSERT INTO khuyen_mai (ten, mo_ta, giam_phan_tram, ngay_bat_dau, ngay_ket_thuc) 
                VALUES (:ten, :mo_ta, :giam_phan_tram, :ngay_bat_dau, :ngay_ket_thuc)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            ':ten' => $ten,
            ':mo_ta' => $mo_ta,
            ':giam_phan_tram' => $giam_phan_tram,
            ':ngay_bat_dau' => $ngay_bat_dau,
            ':ngay_ket_thuc' => $ngay_ket_thuc
        ]);
    }

    // Cập nhật khuyến mãi
    public function updateKhuyenMai($id, $ten, $mo_ta, $giam_phan_tram, $ngay_bat_dau, $ngay_ket_thuc)
    {
        $sql = "UPDATE khuyen_mai 
                SET ten = :ten, 
                    mo_ta = :mo_ta, 
                    giam_phan_tram = :giam_phan_tram, 
                    ngay_bat_dau = :ngay_bat_dau, 
                    ngay_ket_thuc = :ngay_ket_thuc 
                WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            ':id' => $id,
            ':ten' => $ten,
            ':mo_ta' => $mo_ta,
            ':giam_phan_tram' => $giam_phan_tram,
            ':ngay_bat_dau' => $ngay_bat_dau,
            ':ngay_ket_thuc' => $ngay_ket_thuc
        ]);
    }

    // Xóa khuyến mãi
    public function deleteKhuyenMai($id)
    {
        // Xóa các liên kết sản phẩm khuyến mãi trước
        $sql1 = "DELETE FROM sp_khuyen_mai WHERE khuyen_mai_id = :id";
        $stmt1 = $this->conn->prepare($sql1);
        $stmt1->execute([':id' => $id]);

        // Xóa khuyến mãi
        $sql2 = "DELETE FROM khuyen_mai WHERE id = :id";
        $stmt2 = $this->conn->prepare($sql2);
        return $stmt2->execute([':id' => $id]);
    }

    // Lấy sản phẩm theo khuyến mãi
    public function getProductsByKhuyenMai($khuyen_mai_id)
    {
        $sql = "SELECT sp.*, spkm.khuyen_mai_id
                FROM san_pham sp
                INNER JOIN sp_khuyen_mai spkm ON sp.id = spkm.san_pham_id
                WHERE spkm.khuyen_mai_id = :khuyen_mai_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':khuyen_mai_id' => $khuyen_mai_id]);
        return $stmt->fetchAll();
    }

    // Thêm sản phẩm vào khuyến mãi (cho phép sản phẩm tham gia nhiều khuyến mãi)
    public function addProductToKhuyenMai($san_pham_id, $khuyen_mai_id)
    {
        // Kiểm tra xem sản phẩm đã có trong khuyến mãi này chưa
        $sql_check = "SELECT COUNT(*) FROM sp_khuyen_mai WHERE san_pham_id = :san_pham_id AND khuyen_mai_id = :khuyen_mai_id";
        $stmt_check = $this->conn->prepare($sql_check);
        $stmt_check->execute([':san_pham_id' => $san_pham_id, ':khuyen_mai_id' => $khuyen_mai_id]);
        if ($stmt_check->fetchColumn() > 0) {
            return false; // Sản phẩm đã có trong khuyến mãi này
        }

        $sql = "INSERT INTO sp_khuyen_mai (san_pham_id, khuyen_mai_id) VALUES (:san_pham_id, :khuyen_mai_id)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([':san_pham_id' => $san_pham_id, ':khuyen_mai_id' => $khuyen_mai_id]);
    }

    // Xóa sản phẩm khỏi khuyến mãi
    public function removeProductFromKhuyenMai($san_pham_id, $khuyen_mai_id)
    {
        $sql = "DELETE FROM sp_khuyen_mai WHERE san_pham_id = :san_pham_id AND khuyen_mai_id = :khuyen_mai_id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([':san_pham_id' => $san_pham_id, ':khuyen_mai_id' => $khuyen_mai_id]);
    }

    // Lấy tất cả sản phẩm chưa có trong khuyến mãi cụ thể
    public function getProductsNotInKhuyenMai($khuyen_mai_id)
    {
        $sql = "SELECT sp.*, lr.ten_loai, qg.ten_quoc_gia, hr.ten_hang
                FROM san_pham sp
                LEFT JOIN loai_ruou lr ON sp.loai_id = lr.id
                LEFT JOIN quoc_gia qg ON sp.quoc_gia_id = qg.id
                LEFT JOIN hang_ruou hr ON sp.hang_id = hr.id
                WHERE sp.id NOT IN (
                    SELECT san_pham_id FROM sp_khuyen_mai WHERE khuyen_mai_id = :khuyen_mai_id
                )";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':khuyen_mai_id' => $khuyen_mai_id]);
        return $stmt->fetchAll();
    }

    // Đếm số lượng loại sản phẩm
    public function countProductTypes()
    {
        $sql = "SELECT COUNT(DISTINCT loai_id) as total_types FROM san_pham WHERE loai_id IS NOT NULL";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetch()['total_types'];
    }

    // Thống kê sản phẩm theo loại
    public function getProductStatsByType()
    {
        $sql = "SELECT lr.ten_loai, COUNT(sp.id) as so_luong_san_pham
                FROM loai_ruou lr
                LEFT JOIN san_pham sp ON lr.id = sp.loai_id
                GROUP BY lr.id, lr.ten_loai
                ORDER BY so_luong_san_pham DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
?>
