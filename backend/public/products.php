<?php
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *"); // Cho phép CORS

// Kết nối tới database
include 'db_connection.php';

// Truy vấn lấy sản phẩm
$sql = "SELECT id, name, price, description, thumbnail, category_id, created_at, updated_at, deleted_at FROM products WHERE deleted_at = 0";  // Lấy các sản phẩm chưa xóa
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $products = [];

    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }

    echo json_encode(["status" => "success", "data" => $products]);
} else {
    echo json_encode(["status" => "error", "message" => "No products found"]);
}

$conn->close();
