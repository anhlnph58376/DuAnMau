<?php
class QuocGiaModel
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM quoc_gia";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM quoc_gia WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }

    public function add($ten_quoc_gia)
    {
        $sql = "INSERT INTO quoc_gia (ten_quoc_gia) VALUES (:ten_quoc_gia)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([':ten_quoc_gia' => $ten_quoc_gia]);
    }

    public function update($id, $ten_quoc_gia)
    {
        $sql = "UPDATE quoc_gia SET ten_quoc_gia = :ten_quoc_gia WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([':id' => $id, ':ten_quoc_gia' => $ten_quoc_gia]);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM quoc_gia WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }
}
