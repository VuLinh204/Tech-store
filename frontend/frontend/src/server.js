const express = require("express");
const mysql = require("mysql");
const cors = require("cors");

const app = express();
app.use(cors());
app.use(express.json());

// Kết nối tới MySQL server (không chỉ định database)
const db = mysql.createConnection({
  host: "localhost",
  user: "root",
  password: "", // nếu có mật khẩu thì điền vào đây
});

// Kết nối tới MySQL
db.connect((err) => {
  if (err) {
    console.log("Kết nối thất bại: ", err);
  } else {
    console.log("Kết nối thành công!");

    // Tạo database nếu chưa tồn tại
    db.query("CREATE DATABASE IF NOT EXISTS my_database", (err, result) => {
      if (err) {
        console.log("Lỗi khi tạo database: ", err);
      } else {
        console.log("Database đã được tạo hoặc đã tồn tại!");

        // Kết nối lại với database vừa tạo
        db.changeUser({ database: "my_database" }, (err) => {
          if (err) {
            console.log("Không thể chuyển đổi sang database: ", err);
          } else {
            console.log("Đã chuyển sang database my_database!");

            // Tạo bảng nếu chưa tồn tại
            const createTableQuery = `
              CREATE TABLE IF NOT EXISTS users (
                id INT AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(255) NOT NULL,
                email VARCHAR(255) NOT NULL
              )
            `;
            db.query(createTableQuery, (err, result) => {
              if (err) {
                console.log("Lỗi khi tạo bảng: ", err);
              } else {
                console.log("Bảng users đã được tạo hoặc đã tồn tại!");
              }
            });
          }
        });
      }
    });
  }
});

// Định nghĩa các API, ví dụ API lấy danh sách người dùng
app.get("/users", (req, res) => {
  db.query("SELECT * FROM users", (err, result) => {
    if (err) {
      res.send({ err: err });
    } else {
      res.send(result);
    }
  });
});

// Chạy server
app.listen(3001, () => {
  console.log("Server đang chạy ở cổng 3001");
});
