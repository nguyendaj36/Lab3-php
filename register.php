<?php
// register.php
require 'db_connect.php'; // Gọi file kết nối bạn đã có

$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // 1. Mã hóa mật khẩu
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // 2. Lưu vào DB (Dùng PDO Prepare để chống SQL Injection)
    // Lưu ý: Mình để fullname/code là giá trị mặc định nếu bạn chưa sửa DB cho phép NULL
    $sql = "INSERT INTO students (email, password, fullname, student_code) VALUES (?, ?, 'New User', 'Unknown')";
    $stmt = $conn->prepare($sql);

    try {
        if ($stmt->execute([$email, $hashed_password])) {
            $message = "Đăng ký thành công! <a href='login.php'>Đăng nhập ngay</a>";
        }
    } catch (PDOException $e) {
        $message = "Lỗi: Email có thể đã tồn tại hoặc lỗi hệ thống.";
    }
}
?>

<!DOCTYPE html>
<html>
<head><title>Đăng ký</title></head>
<body>
    <h2>Đăng ký tài khoản</h2>
    <p style="color:green"><?= $message ?></p>
    <form method="POST" action="">
        Email: <input type="email" name="email" required><br><br>
        Mật khẩu: <input type="password" name="password" required><br><br>
        <button type="submit">Đăng ký</button>
    </form>
</body>
</html>