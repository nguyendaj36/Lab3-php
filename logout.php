<?php
// logout.php
session_start();
session_destroy(); // Xóa sạch session
header("Location: login.php"); // Quay về trang login
exit;
?>