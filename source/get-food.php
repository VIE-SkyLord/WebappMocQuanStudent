<?php
// Kết nối đến cơ sở dữ liệu
include 'connect.php';

// Kiểm tra kết nối
if (!$conn) {
    die("Kết nối thất bại: " . $conn->errorInfo()[2]);
}

// Truy vấn để lấy dữ liệu từ bảng 'monan'
$sql = "SELECT * FROM monan";
$stmt = $conn->prepare($sql);
$query = $stmt->execute();

// Kiểm tra và hiển thị dữ liệu trong datagridview
if ($query) {
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($result) > 0) {
        echo '<table class="table">';
        echo '<thead><tr><th>ID</th><th>Tên món ăn</th><th>Loai mon</th><th>Kich co</th><th>Hinh anh</th><th>Giá</th><th>Don vi tinh</th><th>Tinh trang</th><th>Thao tac</th></tr></thead>';
        echo '<tbody>';
        foreach ($result as $row) {
            echo '<tr>';
            echo '<td>' . $row['id_mon_an'] . '</td>';
            echo '<td>' . $row['ten_mon_an'] . '</td>';
            echo '<td>' . $row['id_loai_mon_an'] . '</td>';
            echo '<td>' . $row['id_kich_co'] . '</td>';
        
            // Hiển thị hình ảnh với base64_encode
            echo '<td><img src="data:image/jpeg;base64,' . base64_encode($row['hinh_anh']) . '" alt="Hình ảnh món ăn" style="width: 100px;"></td>';
        
            echo '<td>' . $row['gia_ca'] . '</td>';
            echo '<td>' . $row['id_don_vi_tinh'] . '</td>';
            echo '<td>' . $row['id_tinh_trang'] . '</td>';
        
            // Button Sửa
            echo '<td><button type="button" class="btn btn-primary edit-item" data-id="' . $row['id_mon_an'] . '" data-toggle="modal" data-target="#editModal">Sửa</button></td>';
        
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
    } else {
        echo "0 kết quả";
    }
} else {
    echo "Lỗi truy vấn: " . $stmt->errorInfo()[2];
}

// Đóng kết nối
$conn = null;
?>
