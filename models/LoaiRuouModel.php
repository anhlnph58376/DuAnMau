<?php
class LoaiRuouModel
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM loai_ruou";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM loai_ruou WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }

    public function add($ten_loai)
    {
        $sql = "INSERT INTO loai_ruou (ten_loai) VALUES (:ten_loai)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([':ten_loai' => $ten_loai]);
    }

    public function update($id, $ten_loai)
    {
        $sql = "UPDATE loai_ruou SET ten_loai = :ten_loai WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([':id' => $id, ':ten_loai' => $ten_loai]);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM loai_ruou WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }
}
