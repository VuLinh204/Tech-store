// backend/controllers/categoryController.js
const Category = require("../models/CategoryModel");

// Lấy tất cả danh mục
exports.getAllCategories = async (req, res) => {
  try {
    const categories = await Category.findAll();
    res.json(categories);
  } catch (error) {
    res.status(500).json({ error: "Lỗi khi lấy danh mục" });
  }
};

// Thêm danh mục mới
exports.createCategory = async (req, res) => {
  try {
    const { name } = req.body;
    const newCategory = await Category.create({ name });
    res.json(newCategory);
  } catch (error) {
    res.status(500).json({ error: "Lỗi khi tạo danh mục" });
  }
};
