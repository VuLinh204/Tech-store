<?php

namespace App\Controllers;

use App\Models\CategoryModel;

class CategoriesController
{
    private $categoryModel;

    public function __construct($db)
    {
        $this->categoryModel = new CategoryModel($db);
    }

    public function index()
    {
        // Lấy tất cả danh mục từ database
        $categories = $this->categoryModel->getAllCategories();

        // Đường dẫn file JSON
        $filePath = __DIR__ . '/../../public/categories.json';

        // Chuyển dữ liệu thành JSON và lưu vào file
        file_put_contents($filePath, json_encode($categories));

        // Có thể thêm thông báo ghi file thành công
        echo 'File categories.json đã được tạo thành công';
    }

    public function show($id)
    {
        $category = $this->categoryModel->getCategoryById($id);

        if ($category) {
            echo json_encode($category);
        } else {
            echo json_encode(['error' => 'Category not found']);
        }
    }

    public function create($request)
    {
        // Kiểm tra dữ liệu đầu vào
        if (empty($request['name']) || empty($request['thumbnail'])) {
            http_response_code(400);
            return json_encode(['error' => 'Invalid input']);
        }

        $data = [
            'name' => $request['name'],
            'thumbnail' => $request['thumbnail']
        ];

        $result = $this->categoryModel->createCategory($data);

        if ($result) {
            // Lấy dữ liệu mới sau khi thêm
            $this->index(); // Tạo lại file JSON mới

            http_response_code(201);
            return json_encode(['message' => 'Category created successfully']);
        } else {
            http_response_code(500);
            return json_encode(['error' => 'Failed to create category']);
        }
    }

    public function update($id, $request)
    {
        $data = [
            'name' => $request['name'],
            'thumbnail' => $request['thumbnail']
        ];

        $result = $this->categoryModel->updateCategory($id, $data);

        if ($result) {
            // Tạo lại file JSON sau khi cập nhật
            $this->index();
            return json_encode(['message' => 'Category updated successfully']);
        } else {
            return json_encode(['error' => 'Failed to update category']);
        }
    }

    public function delete($id)
    {
        $result = $this->categoryModel->deleteCategory($id);

        if ($result) {
            // Tạo lại file JSON sau khi xóa
            $this->index();
            return json_encode(['message' => 'Category deleted successfully']);
        } else {
            return json_encode(['error' => 'Failed to delete category']);
        }
    }
}
