<?php
// Có class chứa các function thực thi tương tác với cơ sở dữ liệu
class UserModel
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }

    // Hàm kiểm tra đăng nhập
    public function checkLogin($ten_dang_nhap, $mat_khau)
    {
        $sql = "SELECT * FROM nguoi_dung WHERE ten_dang_nhap = :ten_dang_nhap";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':ten_dang_nhap' => $ten_dang_nhap]);
        $user = $stmt->fetch();

        if ($user && ($mat_khau == $user['mat_khau'] || password_verify($mat_khau, $user['mat_khau']))) {
            // Nếu người dùng đăng nhập bằng mật khẩu văn bản gốc, hãy cập nhật nó thành mật khẩu băm
            if ($mat_khau == $user['mat_khau']) {
                $hashedPassword = password_hash($mat_khau, PASSWORD_DEFAULT);
                $updateSql = "UPDATE nguoi_dung SET mat_khau = :mat_khau WHERE id = :id";
                $updateStmt = $this->conn->prepare($updateSql);
                $updateStmt->execute([':mat_khau' => $hashedPassword, ':id' => $user['id']]);
            }
            return $user;
        }

        return null;
    }

    // Hàm đăng ký
    public function register($ten_dang_nhap, $mat_khau, $email, $sdt, $dia_chi)
    {
        // Kiểm tra xem người dùng hoặc email đã tồn tại chưa
        $sql = "SELECT * FROM nguoi_dung WHERE ten_dang_nhap = :ten_dang_nhap OR email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':ten_dang_nhap' => $ten_dang_nhap, ':email' => $email]);
        if ($stmt->fetch()) {
            return false; // Người dùng hoặc email đã tồn tại
        }

        // Thêm người dùng mới
        $hashedPassword = password_hash($mat_khau, PASSWORD_DEFAULT);
        $sql = "INSERT INTO nguoi_dung (ten_dang_nhap, mat_khau, email, sdt, dia_chi) VALUES (:ten_dang_nhap, :mat_khau, :email, :sdt, :dia_chi)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            ':ten_dang_nhap' => $ten_dang_nhap,
            ':mat_khau' => $hashedPassword,
            ':email' => $email,
            ':sdt' => $sdt,
            ':dia_chi' => $dia_chi
        ]);
    }

    // Lấy tất cả người dùng
    public function getAllUsers()
    {
        $sql = "SELECT * FROM nguoi_dung";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Xóa người dùng
    public function deleteUser($id)
    {
        $sql = "DELETE FROM nguoi_dung WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }

    // Lấy người dùng theo ID
    public function getUserById($id)
    {
        $sql = "SELECT * FROM nguoi_dung WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }

    // Cập nhật người dùng
    public function updateUser($id, $ten_dang_nhap, $email, $sdt, $dia_chi, $vai_tro)
    {
        $sql = "UPDATE nguoi_dung SET 
                    ten_dang_nhap = :ten_dang_nhap, 
                    email = :email, 
                    sdt = :sdt, 
                    dia_chi = :dia_chi, 
                    vai_tro = :vai_tro 
                WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            ':id' => $id,
            ':ten_dang_nhap' => $ten_dang_nhap,
            ':email' => $email,
            ':sdt' => $sdt,
            ':dia_chi' => $dia_chi,
            ':vai_tro' => $vai_tro
        ]);
    }

    // Thêm người dùng
    public function addUser($ten_dang_nhap, $mat_khau, $email, $sdt, $dia_chi, $vai_tro)
    {
        $hashedPassword = password_hash($mat_khau, PASSWORD_DEFAULT);
        $sql = "INSERT INTO nguoi_dung (ten_dang_nhap, mat_khau, email, sdt, dia_chi, vai_tro) 
                VALUES (:ten_dang_nhap, :mat_khau, :email, :sdt, :dia_chi, :vai_tro)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            ':ten_dang_nhap' => $ten_dang_nhap,
            ':mat_khau' => $hashedPassword,
            ':email' => $email,
            ':sdt' => $sdt,
            ':dia_chi' => $dia_chi,
            ':vai_tro' => $vai_tro
        ]);
    }
}
