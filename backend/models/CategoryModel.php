<?php
require_once '../config/db.php';

class Category
{
  private $conn;
  private $table = 'category';

  public function __construct()
  {
    $database = new Database();
    $this->conn = $database->getConnection();
  }

  // Lấy tất cả danh mục
  public function getAllCategories()
  {
    $query = "SELECT * FROM {$this->table}";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  // Tạo danh mục mới
  public function createCategory($name, $thumbnail)
  {
    $query = "INSERT INTO {$this->table} (name, thumbnail) VALUES (:name, :thumbnail)";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(":name", $name);
    $stmt->bindParam(":thumbnail", $thumbnail);
    return $stmt->execute();
  }

  // Cập nhật danh mục
  public function updateCategory($id, $name, $thumbnail)
  {
    $query = "UPDATE {$this->table} SET name = :name, thumbnail = :thumbnail WHERE id = :id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(":name", $name);
    $stmt->bindParam(":thumbnail", $thumbnail);
    $stmt->bindParam(":id", $id);
    return $stmt->execute();
  }

  // Xóa danh mục
  public function deleteCategory($id)
  {
    $query = "DELETE FROM {$this->table} WHERE id = :id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(":id", $id);
    return $stmt->execute();
  }
}
