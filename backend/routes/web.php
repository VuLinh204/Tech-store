<?php

use App\Controllers\CategoriesController;

// Định nghĩa các route cho các phương thức GET, POST, PUT, DELETE
$router->get('/categories', [CategoriesController::class, 'index']);      // Lấy tất cả danh mục
$router->get('/categories/{id}', [CategoriesController::class, 'show']);  // Lấy danh mục theo id
$router->post('/categories', [CategoriesController::class, 'create']);    // Tạo mới danh mục
$router->put('/categories/{id}', [CategoriesController::class, 'update']); // Cập nhật danh mục
$router->delete('/categories/{id}', [CategoriesController::class, 'delete']); // Xóa danh mục
$router->options('/categories', [CategoriesController::class, 'handleOptions']); // Xử lý CORS
