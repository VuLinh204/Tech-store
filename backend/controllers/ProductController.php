<?php
require_once '../models/ProductModel.php';

class ProductController
{
    private $productModel;

    // Nhận $pdo từ bên ngoài để khởi tạo ProductModel
    public function __construct($pdo)
    {
        $this->productModel = new Product($pdo);  // Truyền $pdo vào ProductModel
    }

    public function getProducts($category_id = null)
    {
        try {
            $products = $this->productModel->getAll($category_id);
            header('Content-Type: application/json; charset=UTF-8');
            echo json_encode($products);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(["error" => "Lỗi: " . $e->getMessage()]);
        }
    }
}
