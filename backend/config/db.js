// backend/config/db.js
const { Sequelize } = require("sequelize");

// Tạo kết nối với database MySQL
const sequelize = new Sequelize("database_name", "username", "password", {
  host: "localhost",
  port: 3307, // Cổng bạn đang dùng
  dialect: "mysql",
});

module.exports = sequelize;
