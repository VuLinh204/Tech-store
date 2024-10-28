<?php
require_once '../config/db.php';  // Kết nối đến cơ sở dữ liệu
require_once '../controllers/ProductController.php';  // Kết nối đến controller

// Khởi tạo đối tượng Database và lấy kết nối
$database = new Database();
$pdo = $database->getConnection();  // Lấy kết nối

$category_id = isset($_GET['category_id']) ? intval($_GET['category_id']) : null;
$productController = new ProductController($pdo);  // Khởi tạo ProductController với kết nối PDO
$productController->getProducts($category_id);  // Lấy sản phẩm
