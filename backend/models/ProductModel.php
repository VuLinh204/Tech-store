<?php
require_once '../config/database.php';
require_once 'Validate_data.php';

class ProductModel extends Database
{
    //Lấy thông tin sản phẩm
    public function getAllProduct()
    {
        $query = "SELECT p.id, p.name, p.price, p.description, p.thumbnail, c.name AS category_name FROM product p LEFT JOIN category c on p.category_id = c.id";

        if ($stmt = self::$connection->prepare($query)) {
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result) {
                return json_encode($result->fetch_all(MYSQLI_ASSOC), JSON_UNESCAPED_UNICODE);
            } else {
                return json_encode([]);
            }

        } else {
            // Xử lý khi không chuẩn bị được câu lệnh
            return json_encode(["error" => "Could not prepare statement"]);
        }
    }

    //Thêm sản phẩm
    public function createProduct($product)
    {
        if (empty($name))
            return ["Tên sản phẩm không được để trống."];
        if (strlen($name) < 3)
            return ["Tên sản phẩm phải có ít nhất 3 ký tự."];
        if (strlen($name) > 100)
            return ["Tên sản phẩm không vượt quá 100 ký tự."];
        if (!preg_match('/^[a-zA-Z0-9\s]+$/u', $name))
            return ["Tên sản phẩm chứa ký tự không hợp lệ."];
        $query = "INSERT INTO product (name, price, description, thumbnail, category_id) VALUE(?,?,?,?,?)";
        if ($stmt = self::$connection->prepare($query)) {
            $stmt->bind_param("sissi", $product->name, $product->price, $product->description, $product->thumbnail, $product->category_id);
            if ($stmt->execute()) {
                return ["status" => "success", "message" => "Sản phẩm đã được thêm thành công"];
            } else {
                return ["status" => "error", "message" => "Thêm sản phẩm thất bại" . $stmt->error];
            }
        } else {
            return ["status" => "error", "message" => "Lỗi chuẩn bị câu lệnh: " . self::$connection->error];
        }
    }

    //Sửa sản phẩm
    public function updateProduct($product)
    {
        $query = "UPDATE product SET name = ?, price = ?, description = ?, thumnail = ?, category_id = ? WHERE id = ?";
        if ($stmt = self::$connection->prepare($query)) {
            $stmt->bind_param("sissii", $product->name, $product->price, $product->description, $product->thumbnail, $product->category_id, $product->id);
            if ($stmt->execute()) {
                return ["status" => "success", "message" => "Sản phẩm đã được cập nhật thành công"];
            } else {
                return ["status" => "error", "message" => "Thêm sản phẩm cập nhật thất bại" . $stmt->error];
            }
        } else {
            return ["status" => "error", "message" => "Lỗi chuẩn bị câu lệnh: " . self::$connection->error];
        }
    }

    //Xóa sản phẩm
    public function deleteProduct($id)
    {
        // // Kiểm tra xem sản phẩm có tồn tại không
        // $this->id = $id; // Gán ID cho thuộc tính id của đối tượng
        // if (!$this->exists()) {
        //     return ["status" => "error", "message" => "Sản phẩm không tồn tại"];
        // }
        $query = "DELETE FROM product WHERE id = ?";
        if ($stmt = self::$connection->prepare($query)) {
            $stmt->bind_param("i", $id);
            if ($stmt->execute()) {
                return ["status" => "success", "message" => "Xóa sản phẩm thành công"];
            } else {
                return ["status" => "error", "message" => "Xóa sản phẩm thất bại"];
            }
        }

    }

}

