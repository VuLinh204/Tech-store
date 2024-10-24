// backend/routes/categoryRoutes.js
const express = require("express");
const router = express.Router();
const CategoryController = require("../controllers/CategoryController");

// Route lấy tất cả danh mục
router.get("/categories", CategoryController.getAllCategories);

// Route thêm danh mục mới
router.post("/categories", CategoryController.createCategory);

module.exports = router;
