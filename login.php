<?php
// login.php
session_start(); // Khởi tạo session ngay đầu file
require 'db_connect.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // 1. Tìm user theo email
    $stmt = $conn->prepare("SELECT * FROM students WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // 2. Kiểm tra password hash
    if ($user && password_verify($password, $user['password'])) {
        // 3. Đăng nhập thành công -> Lưu session
        $_SESSION['user'] = $user['email'];
        $_SESSION['user_id'] = $user['id']; // Lưu thêm ID nếu cần
        
        // Chuyển hướng sang dashboard
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Sai email hoặc mật khẩu!";
    }
}
?>

<!DOCTYPE html>
<html>
<head><title>Đăng nhập</title></head>
<body>
    <h2>Đăng nhập</h2>
    <p style="color:red"><?= $error ?></p>
    <form method="POST" action="">
        Email: <input type="email" name="email" required><br><br>
        Mật khẩu: <input type="password" name="password" required><br><br>
        <button type="submit">Đăng nhập</button>
    </form>
</body>
</html>