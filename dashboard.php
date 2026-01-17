<?php
// dashboard.php
session_start();

// 1. Kiểm tra nếu chưa đăng nhập thì đá về login
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head><title>Dashboard</title></head>
<body>
    <h1>Trang quản trị</h1>
    <p>Xin chào, <strong><?= htmlspecialchars($_SESSION['user']) ?></strong>!</p>
    
    <p><a href="cart.php">Đi tới giỏ hàng (Bài 4)</a></p>
    
    <a href="logout.php">Đăng xuất</a>
</body>
</html>