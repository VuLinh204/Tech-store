
<?php
include 'db.php';

// Thiết lập tiêu đề CORS
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id'])) {
        $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$_GET['id']]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        // Trả về mảng rỗng nếu không tìm thấy người dùng
        echo json_encode($user ? $user : []);
    } else {
        $stmt = $conn->prepare("SELECT * FROM users");
        $stmt->execute();
        // Trả về mảng người dùng
        echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    
    // Kiểm tra và upload file ảnh
    $targetFile = null;
    if (isset($_FILES['image'])) {
        $imageName = $_FILES['image']['name'];
        $targetDirectory = "uploads/"; // Đường dẫn đến thư mục uploads
        $targetFile = $targetDirectory . basename($imageName);
        
        // Kiểm tra và tạo thư mục uploads nếu chưa tồn tại
        if (!is_dir($targetDirectory)) {
            mkdir($targetDirectory, 0755, true);
        }
        
        // Di chuyển file upload vào thư mục uploads
        if (!move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
            echo json_encode(['message' => 'File upload failed']);
            exit();
        }
    }

    // Lưu thông tin người dùng vào database
    $stmt = $conn->prepare("INSERT INTO users (username, email, phone, password, address, image) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([
        $data['username'], 
        $data['email'], 
        $data['phone'], 
        password_hash($data['password'], PASSWORD_DEFAULT), // Mã hóa mật khẩu
        $data['address'], 
        $targetFile ? $targetFile : null // Lưu đường dẫn tới ảnh đã upload, hoặc null nếu không có ảnh
    ]);
    echo json_encode(['message' => 'User created successfully']);
}

if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    $data = json_decode(file_get_contents('php://input'), true);
    $stmt = $conn->prepare("UPDATE users SET username = ?, email = ?, phone = ?, address = ?, image = ? WHERE id = ?");
    $stmt->execute([
        $data['username'], $data['email'], $data['phone'], $data['address'], $data['image'], $data['id']
    ]);
    echo json_encode(['message' => 'User updated successfully']);
}

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $id = $_GET['id'];
    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->execute([$id]);
    echo json_encode(['message' => 'User deleted successfully']);
}
?>
