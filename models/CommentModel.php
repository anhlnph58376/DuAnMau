<?php
class CommentModel
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }

    // Lấy tất cả bình luận
    public function getAllComments()
    {
        $sql = "SELECT bl.*, nd.ten_dang_nhap, sp.ten 
                FROM binh_luan bl
                JOIN nguoi_dung nd ON bl.user_id = nd.id
                JOIN san_pham sp ON bl.san_pham_id = sp.id
                ORDER BY bl.ngay_binh_luan DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Xóa bình luận
    public function deleteComment($id)
    {
        $sql = "DELETE FROM binh_luan WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }

    // Thêm bình luận
    public function addComment($san_pham_id, $user_id, $noi_dung)
    {
        $sql = "INSERT INTO binh_luan (san_pham_id, user_id, noi_dung) VALUES (:san_pham_id, :user_id, :noi_dung)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            ':san_pham_id' => $san_pham_id,
            ':user_id' => $user_id,
            ':noi_dung' => $noi_dung
        ]);
    }

    // Lấy bình luận theo ID sản phẩm
    public function getCommentsByProductId($san_pham_id)
    {
        $sql = "SELECT bl.*, nd.ten_dang_nhap 
                FROM binh_luan bl
                JOIN nguoi_dung nd ON bl.user_id = nd.id
                WHERE bl.san_pham_id = :san_pham_id
                ORDER BY bl.ngay_binh_luan DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':san_pham_id' => $san_pham_id]);
        return $stmt->fetchAll();
    }
}
