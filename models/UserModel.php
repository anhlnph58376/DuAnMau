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
    public function register($ten_dang_nhap, $mat_khau)
    {
        // Kiểm tra xem người dùng đã tồn tại chưa
        $sql = "SELECT * FROM nguoi_dung WHERE ten_dang_nhap = :ten_dang_nhap";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':ten_dang_nhap' => $ten_dang_nhap]);
        if ($stmt->fetch()) {
            return false; // Người dùng đã tồn tại
        }

        // Thêm người dùng mới
        $hashedPassword = password_hash($mat_khau, PASSWORD_DEFAULT);
        $sql = "INSERT INTO nguoi_dung (ten_dang_nhap, mat_khau) VALUES (:ten_dang_nhap, :mat_khau)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([':ten_dang_nhap' => $ten_dang_nhap, ':mat_khau' => $hashedPassword]);
    }
}
