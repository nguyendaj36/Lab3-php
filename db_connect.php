<?php
$host = 'localhost';
$dbname = 'buoi2_php';
$username = 'root'; // Mặc định của XAMPP/WAMP
$password = '';     // Mặc định thường để trống

try {
    // Tạo kết nối PDO
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    
    // Thiết lập chế độ báo lỗi (Exception)
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Nếu kết nối thành công, không echo gì cả (theo yêu cầu đề bài)
    
} catch (PDOException $e) {
    // Bắt lỗi và hiển thị thông báo thân thiện
    // echo "Lỗi: " . $e->getMessage(); // Dòng này dành cho Dev xem
    die("Hệ thống đang bảo trì, vui lòng quay lại sau");
}
?>
