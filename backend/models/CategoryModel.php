<?php

namespace App\Models;

use PDO;

class CategoryModel
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getAllCategories()
    {
        $stmt = $this->db->query("SELECT * FROM category");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCategoryById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM category WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createCategory($data)
    {
        $stmt = $this->db->prepare("INSERT INTO category (name, thumbnail) VALUES (:name, :thumbnail)");
        return $stmt->execute($data); // Kiểm tra xem hàm này trả về true hay false
    }


    public function updateCategory($id, $data)
    {
        $stmt = $this->db->prepare("UPDATE category SET name = :name, thumbnail = :thumbnail WHERE id = :id");
        return $stmt->execute(array_merge($data, ['id' => $id]));
    }

    public function deleteCategory($id)
    {
        $stmt = $this->db->prepare("DELETE FROM category WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}
