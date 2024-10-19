<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');
header('Content-Type: application/json');

// Kết nối database
$conn = new mysqli('localhost', 'root', '', 'user');
if ($conn->connect_error) {
    die(json_encode(['error' => 'Database connection failed']));
}

// Kiểm tra thư mục upload ảnh
$upload_dir = 'uploads/';
if (!is_dir($upload_dir)) {
    mkdir($upload_dir, 0777, true);
}

// Lấy dữ liệu từ React và file ảnh
$username = $_POST['username'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$phone = $_POST['phone'];
$address = $_POST['address'];
$image = null;

// Xử lý file ảnh nếu có
if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
    $image_name = uniqid() . '-' . basename($_FILES['image']['name']);
    $image_path = $upload_dir . $image_name;

    if (move_uploaded_file($_FILES['image']['tmp_name'], $image_path)) {
        $image = $image_path;
    } else {
        echo json_encode(['error' => 'Failed to upload image']);
        exit();
    }
}

// Kiểm tra username hoặc email trùng
$check_sql = "SELECT * FROM users WHERE username = ? OR email = ?";
$stmt = $conn->prepare($check_sql);
$stmt->bind_param('ss', $username, $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo json_encode(['error' => 'Username or email already exists']);
    exit();
}

// Thêm người dùng mới vào database
$insert_sql = "INSERT INTO users (username, email, password, phone, address, image) VALUES (?, ?, ?, ?, ?, ?)";
$insert_stmt = $conn->prepare($insert_sql);
$insert_stmt->bind_param('ssssss', $username, $email, $password, $phone, $address, $image);

if ($insert_stmt->execute()) {
    echo json_encode(['message' => 'User added successfully']);
} else {
    echo json_encode(['error' => 'Failed to add user']);
}

$conn->close();
?>
