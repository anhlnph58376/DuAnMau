<?php
class HangRuouModel
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM hang_ruou";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM hang_ruou WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }

    public function add($ten_hang)
    {
        $sql = "INSERT INTO hang_ruou (ten_hang) VALUES (:ten_hang)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([':ten_hang' => $ten_hang]);
    }

    public function update($id, $ten_hang)
    {
        $sql = "UPDATE hang_ruou SET ten_hang = :ten_hang WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([':id' => $id, ':ten_hang' => $ten_hang]);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM hang_ruou WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }
}
