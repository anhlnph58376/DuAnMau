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
                san_pham_khuyen_mai spkm ON sp.id = spkm.san_pham_id
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
            FROM san_pham_khuyen_mai spkm
            JOIN san_pham sp ON sp.id = spkm.san_pham_id
            JOIN khuyen_mai km ON km.id = spkm.khuyen_mai_id
            WHERE km.ngay_bat_dau <= :today AND km.ngay_ket_thuc >= :today
        ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':today' => $today]);
        return $stmt->fetchAll();
    }

    public function searchProducts($keyword)
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
                sp.ten LIKE :keyword
        ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':keyword' => '%' . $keyword . '%']);
        return $stmt->fetchAll();
    }

    public function getRuouManhHighAlcohol()
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
                sp.nong_do_con > 12
        ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Tìm kiếm sản phẩm nâng cao
    public function searchProductsAdvanced($keyword, $loai_id = null, $hang_id = null, $quoc_gia_id = null)
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
            WHERE 1=1
        ";
        
        $params = [];
        
        if (!empty($keyword)) {
            $sql .= " AND sp.ten LIKE :keyword";
            $params[':keyword'] = '%' . $keyword . '%';
        }
        
        if (!empty($loai_id)) {
            $sql .= " AND sp.loai_id = :loai_id";
            $params[':loai_id'] = $loai_id;
        }
        
        if (!empty($hang_id)) {
            $sql .= " AND sp.hang_id = :hang_id";
            $params[':hang_id'] = $hang_id;
        }
        
        if (!empty($quoc_gia_id)) {
            $sql .= " AND sp.quoc_gia_id = :quoc_gia_id";
            $params[':quoc_gia_id'] = $quoc_gia_id;
        }
        
        $sql .= " ORDER BY sp.ten ASC";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }

    // Đếm tổng số sản phẩm
    public function countAllProducts()
    {
        $sql = "SELECT COUNT(*) as total FROM san_pham";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetch()['total'];
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

    // Thống kê sản phẩm theo hãng
    public function getProductStatsByBrand()
    {
        $sql = "SELECT hr.ten_hang, COUNT(sp.id) as so_luong_san_pham
                FROM hang_ruou hr
                LEFT JOIN san_pham sp ON hr.id = sp.hang_id
                GROUP BY hr.id, hr.ten_hang
                ORDER BY so_luong_san_pham DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Thống kê sản phẩm theo quốc gia
    public function getProductStatsByCountry()
    {
        $sql = "SELECT qg.ten_quoc_gia, COUNT(sp.id) as so_luong_san_pham
                FROM quoc_gia qg
                LEFT JOIN san_pham sp ON qg.id = sp.quoc_gia_id
                GROUP BY qg.id, qg.ten_quoc_gia
                ORDER BY so_luong_san_pham DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
