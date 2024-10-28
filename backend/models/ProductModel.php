<?php
require_once '../config/db.php';

class Product
{
    private $pdo;

    // Constructor nhận $pdo từ bên ngoài
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAll($category_id = null)
    {
        if ($category_id) {
            $stmt = $this->pdo->prepare("SELECT * FROM product WHERE deleted_at IS NULL AND category_id = :category_id");
            $stmt->bindParam(':category_id', $category_id, PDO::PARAM_INT);
        } else {
            $stmt = $this->pdo->prepare("SELECT * FROM product WHERE deleted_at IS NULL");
        }

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
