<?php
// cart.php
session_start();

// Khởi tạo giỏ hàng nếu chưa có
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Xử lý khi bấm nút "Thêm vào giỏ"
if (isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];
    // Thêm ID sản phẩm vào mảng session
    $_SESSION['cart'][] = $product_id;
}

// Danh sách sản phẩm giả định (Hardcode)
$products = [
    1 => "iPhone 15",
    2 => "Samsung S24",
    3 => "MacBook Air"
];
?>

<!DOCTYPE html>
<html>
<head><title>Giỏ hàng Session</title></head>
<body>
    <h2>Danh sách sản phẩm</h2>
    <ul>
        <?php foreach ($products as $id => $name): ?>
            <li>
                <?= $name ?> 
                <form method="POST" style="display:inline;">
                    <input type="hidden" name="product_id" value="<?= $id ?>">
                    <button type="submit" name="add_to_cart">Thêm vào giỏ</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>

    <hr>

    <h2>Giỏ hàng của bạn (IDs)</h2>
    <pre>
    <?php 
    if (empty($_SESSION['cart'])) {
        echo "Giỏ hàng trống.";
    } else {
        print_r($_SESSION['cart']); 
        // Nếu muốn hiển thị tên, bạn có thể loop qua mảng cart và map với $products
    }
    ?>
    </pre>
    
    <p><a href="dashboard.php">Quay lại Dashboard</a></p>
</body>
</html>