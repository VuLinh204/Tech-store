<?php
require_once '../config/database.php';
require_once 'Validate_data.php';

class ProductModel extends Database
{
    //Lấy thông tin sản phẩm
    public function getAllProduct()
    {
        $query = "SELECT p.id, p.name, p.price, p.description, p.quantity,
                         GROUP_CONCAT(cl.name SEPARATOR ', ') as color, p.discount_percent,
                         p.thumbnail, c.name AS category_name FROM product p
                  LEFT JOIN category c on p.category_id = c.id
                  LEFT JOIN product_color pc on p.id = pc.product_id
                  LEFT JOIN color cl on pc.color_id = cl.id
                  GROUP BY p.id";

        try {
            $stmt = self::$connection->prepare($query);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result) {
                $products = $result->fetch_all(MYSQLI_ASSOC);

                foreach ($products as &$product) {
                    if (empty($product['color'])) {
                        $product['color'] = [];
                    } else {
                        // Tách chuỗi màu sắc thành mảng
                        $product['color'] = explode(', ', $product['color']);
                    }
                }
                return json_encode($products, JSON_UNESCAPED_UNICODE);
            } else {
                return json_encode([]);
            }
        } catch (Exception $e) {
            return json_encode(["status" => "error", "message" => $e->getMessage()]);
        }
    }


    //Validate product
    private function validateProduct($product)
    {
        $errors = [];

        // Kiểm tra tên sản phẩm
        if (empty($product->name)) {
            $errors[] = "Tên sản phẩm không được để trống.";
        } elseif (strlen($product->name) < 3) {
            $errors[] = "Tên sản phẩm phải có ít nhất 3 ký tự.";
        } elseif (strlen($product->name) > 100) {
            $errors[] = "Tên sản phẩm không vượt quá 100 ký tự.";
        } elseif (!preg_match('/^[a-zA-Z0-9\s]+$/u', $product->name)) {
            $errors[] = "Tên sản phẩm chứa ký tự không hợp lệ.";
        }

        // Kiểm tra mô tả sản phẩm
        if (empty($product->description)) {
            $errors[] = "Mô tả sản phẩm không được để trống.";
        }

        // Kiểm tra danh mục sản phẩm
        if (empty($product->category_id)) {
            $errors[] = "Vui lòng chọn danh mục cho sản phẩm.";
        }


        // Kiểm tra giá sản phẩm
        if (!is_numeric($product->price) || $product->price < 0) {
            $errors[] = "Giá sản phẩm phải là số dương hợp lệ.";
        }

        return $errors;
    }
    //Thêm sản phẩm
    public function createProduct($product)
    {
        //gọi hàm kiểm tra Lỗi
        $error = $this->validateProduct($product);
        if (!empty($error)) {
            return ['status' => 'error', 'errors' => $error];
        }

        $query = "INSERT INTO product (name, description, category_id, price, quantity, discount_percent, thumbnail)
                VALUES(?,?,?,?,?,?,?)";
        try {
            $stmt = self::$connection->prepare($query);
            $stmt->bind_param(
                "ssidiis",
                $product->name,
                $product->description,
                $product->category_id,
                $product->price,
                $product->quantity,
                $product->discount_percent,
                $product->thumbnail
            );
            if ($stmt->execute()) {
                //lấy id sản phẩm vừa được thêm
                $productId = self::$connection->insert_id;
                ;
                $productColor = $product->color;
                if (!empty($productColor) && is_array($productColor)) {
                    foreach ($productColor as $colorName) {
                        $colorQuery = "SELECT id FROM color WHERE name = ?";
                        $colorStmt = self::$connection->prepare($colorQuery);
                        $colorStmt->bind_param("s", $colorName);
                        $colorStmt->execute();
                        $colorResult = $colorStmt->get_result();
                        print_r($colorResult);
                    }
                }
                return ["status" => "success", "message" => "Sản phẩm đã được thêm thành công"];
            } else {
                return ["status" => "error", "message" => "Thêm sản phẩm thất bại" . $stmt->error];
            }
        } catch (Exception $e) {
            return ["status" => "error", "message" => $e->getMessage()];
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

$product = new stdClass();
$product->name = "ip13";
$product->description = "Đây là ip 13";
$product->category_id = 1;
$product->price = 1300000.00;
$product->quantity = 10;
$product->discount_percent = 5;
$product->color = array("Trắng", "Hồng");
$product->thumbnail = "ip13.jpg";

$productModel = new ProductModel();
print_r($productModel->createProduct($product));

