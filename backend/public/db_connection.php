<?php
$servername = "localhost";
$username = "root";  // Thay đổi nếu tên người dùng khác
$password = "";      // Thay đổi nếu có mật khẩu
$dbname = "mydatabase";  // Thay bằng tên cơ sở dữ liệu của bạn

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
