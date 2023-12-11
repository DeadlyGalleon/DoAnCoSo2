<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tìm kiếm sản phẩm</title>
    <style>
        /* Định dạng CSS cho phần giao diện */
        #search-form {
            margin: 20px;
        }
        #search-input {
            padding: 8px;
            width: 300px;
        }
        #search-button {
            padding: 8px;
        }
        #search-results {
            margin: 20px;
        }
    </style>
</head>
<body>
    <h1>Tìm kiếm sản phẩm</h1>
    <form id="search-form" action="search.php" method="GET">
        <input type="text" id="search-input" name="search" placeholder="Nhập tên sản phẩm">
        <button type="submit" id="search-button">Tìm kiếm</button>
    </form>
    <div id="search-results">
        <!-- Kết quả tìm kiếm sẽ được hiển thị ở đây -->
    </div>
</body>
</html>


<?php
// Kết nối đến cơ sở dữ liệu MySQL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web_ban_hang_PHP";

// Tạo kết nối đến cơ sở dữ liệu
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
}

// Xử lý dữ liệu đầu vào từ thanh tìm kiếm
if (isset($_GET['search']) && !empty($_GET['search'])) {
    $searchTerm = $_GET['search'];

    // Truy vấn SQL để tìm kiếm sản phẩm theo tên
    $sql = "SELECT * FROM sanpham WHERE tensanpham LIKE '%$searchTerm%'";
    $result = $conn->query($sql);

    // Hiển thị kết quả tìm kiếm
    if ($result->num_rows > 0) {
        echo "<h2>Kết quả tìm kiếm cho: '$searchTerm'</h2>";
        echo "<ul>";
        while ($row = $result->fetch_assoc()) {
            echo "<li>" . $row["tensanpham"] . "</li>";
            // Hiển thị các thông tin khác của sản phẩm nếu cần thiết
        }
        echo "</ul>";
    } else {
        echo "Không tìm thấy sản phẩm có tên '$searchTerm'";
    }
}

// Đóng kết nối đến cơ sở dữ liệu
$conn->close();
?>

