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
    public function getAllProduct()
    {
        $sql = "
            SELECT
                sp.*,
                lr.ten_loai,
                qg.ten_quoc_gia,
                hr.ten_hang
            FROM
                san_pham sp
            LEFT JOIN
                loai_ruou lr ON sp.loai_id = lr.id
            LEFT JOIN
                quoc_gia qg ON sp.quoc_gia_id = qg.id
            LEFT JOIN
                hang_ruou hr ON sp.hang_id = hr.id
        ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getProductById($id)
    {
        $sql = "
            SELECT
                sp.*,
                lr.ten_loai,
                qg.ten_quoc_gia,
                hr.ten_hang
            FROM
                san_pham sp
            LEFT JOIN
                loai_ruou lr ON sp.loai_id = lr.id
            LEFT JOIN
                quoc_gia qg ON sp.quoc_gia_id = qg.id
            LEFT JOIN
                hang_ruou hr ON sp.hang_id = hr.id
            WHERE
                sp.id = :id
        ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }

    public function addProduct($ten, $mo_ta, $hinh_anh, $gia, $so_luong_kho, $nong_do_con, $nam_san_xuat, $hien_thi, $loai_id, $quoc_gia_id, $hang_id)
    {
        $sql = "
            INSERT INTO san_pham (ten, mo_ta, hinh_anh, gia, so_luong_kho, nong_do_con, nam_san_xuat, hien_thi, loai_id, quoc_gia_id, hang_id) 
            VALUES (:ten, :mo_ta, :hinh_anh, :gia, :so_luong_kho, :nong_do_con, :nam_san_xuat, :hien_thi, :loai_id, :quoc_gia_id, :hang_id)
        ";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            ':ten' => $ten, 
            ':mo_ta' => $mo_ta, 
            ':hinh_anh' => $hinh_anh, 
            ':gia' => $gia, 
            ':so_luong_kho' => $so_luong_kho, 
            ':nong_do_con' => $nong_do_con, 
            ':nam_san_xuat' => $nam_san_xuat, 
            ':hien_thi' => $hien_thi, 
            ':loai_id' => $loai_id, 
            ':quoc_gia_id' => $quoc_gia_id, 
            ':hang_id' => $hang_id
        ]);
    }

    public function updateProduct($id, $ten, $mo_ta, $hinh_anh, $gia, $so_luong_kho, $nong_do_con, $nam_san_xuat, $hien_thi, $loai_id, $quoc_gia_id, $hang_id)
    {
        $sql = "
            UPDATE san_pham 
            SET ten = :ten, 
                mo_ta = :mo_ta, 
                hinh_anh = :hinh_anh, 
                gia = :gia, 
                so_luong_kho = :so_luong_kho, 
                nong_do_con = :nong_do_con, 
                nam_san_xuat = :nam_san_xuat, 
                hien_thi = :hien_thi, 
                loai_id = :loai_id, 
                quoc_gia_id = :quoc_gia_id, 
                hang_id = :hang_id 
            WHERE id = :id
        ";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            ':id' => $id,
            ':ten' => $ten, 
            ':mo_ta' => $mo_ta, 
            ':hinh_anh' => $hinh_anh, 
            ':gia' => $gia, 
            ':so_luong_kho' => $so_luong_kho, 
            ':nong_do_con' => $nong_do_con, 
            ':nam_san_xuat' => $nam_san_xuat, 
            ':hien_thi' => $hien_thi, 
            ':loai_id' => $loai_id, 
            ':quoc_gia_id' => $quoc_gia_id, 
            ':hang_id' => $hang_id
        ]);
    }

    public function deleteProduct($id)
    {
        $sql = "DELETE FROM san_pham WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }

    function getDetail($id)  {
        $today = date('Y-m-d');
        $sql = "
            SELECT
                sp.*,
                km.giam_phan_tram,
                lr.ten_loai,
                qg.ten_quoc_gia,
                hr.ten_hang
            FROM
                san_pham sp
            LEFT JOIN
                sp_khuyen_mai spkm ON sp.id = spkm.san_pham_id
            LEFT JOIN
                khuyen_mai km ON km.id = spkm.khuyen_mai_id AND km.ngay_bat_dau <= :today AND km.ngay_ket_thuc >= :today
            LEFT JOIN
                loai_ruou lr ON sp.loai_id = lr.id
            LEFT JOIN
                quoc_gia qg ON sp.quoc_gia_id = qg.id
            LEFT JOIN
                hang_ruou hr ON sp.hang_id = hr.id
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
