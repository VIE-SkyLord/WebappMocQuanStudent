<?php
function hashPassword($password) {
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    return $hashed_password;
}
?>
<?php
function isValidPhoneNumber($phonenumber) {
    // Kiểm tra số điện thoại: độ dài và định dạng có thể được kiểm tra tùy thuộc vào quy định của bạn
    // Ví dụ: độ dài 10 chữ số
    return preg_match("/^[0-9]{10}$/", $phonenumber);
}
?>
<?php
session_start();
include 'connect.php';

if ($conn) {
    echo "Kết nối thành công";
} else {
    echo "Kết nối thất bại";
}

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];
    $displayname = $_POST['displayname'];
    $email = $_POST['email'];
    $phonenumber = $_POST['phonenumber'];

    // Kiểm tra tên đăng nhập
    if (empty($username)) {
        echo '<p class="text-danger">Đăng ký thất bại, tên đăng nhập không được để trống</p>';
    }
    // Kiểm tra số điện thoại
    else if (!isValidPhoneNumber($phonenumber)) {
        echo '<p class="text-danger">Đăng ký thất bại, số điện thoại không hợp lệ</p>';
    }
    // Kiểm tra email
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo '<p class="text-danger">Đăng ký thất bại, email không hợp lệ</p>';
    }
    // Kiểm tra mật khẩu
    else if ($password != $repassword) {
        echo '<p class="text-danger">Đăng ký thất bại, vui lòng kiểm tra lại mật khẩu</p>';
    } else {
        // Kiểm tra xem tên người dùng đã tồn tại trong cơ sở dữ liệu hay chưa
        $sql = "SELECT * FROM taikhoan WHERE ten_dang_nhap = '$username'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            echo '<p class="text-danger">Đăng ký thất bại, tên đăng nhập đã tồn tại</p>';
        } else {
            // Nếu tên người dùng chưa tồn tại, tiến hành đăng ký
            $hashPassword = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `taikhoan` (`ten_hien_thi`, `ten_dang_nhap`, `mat_khau`, `email`, `so_dien_thoai`, `id_quyen_han`, `ma_xac_nhan`) VALUES ('$displayname', '$username', '$hashPassword', '$email', '$phonenumber', '2', '')";
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            // Truy xuất thông tin người mới đăng ký
            $sql = "SELECT * FROM taikhoan WHERE ten_dang_nhap = '$username'";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // Lưu kết quả truy vấn vào phiên
            $_SESSION['id'] = $row['id_tai_khoan'];
            $_SESSION['username'] = $row['ten_dang_nhap'];
            $_SESSION['displayname'] = $row['ten_hien_thi'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['phonenumber'] = $row['so_dien_thoai'];
            $_SESSION['permission'] = $row['id_quyen_han'];
            header("location: index.php");
        }
    }
}
?>



<!DOCTYPE html>
<html>
<head>
    <title>Đăng ký</title>

    <!--BOOTSTRAP5-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <header style="text-align: center">
        <h1><b>Đăng ký</b></h1>
    </header>

    <content>
        <div class="container bg-dark" style="padding: 10px">
            <form method="post">
                <table style="color: white; width: 100%" border="1">
                    <!--Nhập tên người dùng-->
                    <div class="mb-3 mt-3">
                    <tr>
                        <th><label for="displayname" class="form-label">Tên hiển thị:</label></th>
                        <td><input type="text" class="form-control" style="width:100%" name="displayname" id="displayname"></td>
                    </tr>
                    </div>
                    <!--Nhập tên đăng nhập-->
                    <div class="mb-3 mt-3">
                    <tr>
                        <th><label for="username" class="form-label">Tên đăng nhập:</label></th>
                        <td><input type="text" class="form-control" style="width:100%" name="username" id="username"></td>
                    </tr>
                    </div>
                    <!--Nhập mật khẩu-->
                    <div class="mb-3 mt-3">
                    <tr>
                        <th><label for="password" class="form-label">Mật khẩu:</label></th>
                        <td><input type="password" class="form-control" style="width:100%" name="password" id="password"></td>
                    </tr>
                    </div>
                    <!--Nhập lại mật khẩu-->
                    <div class="mb-3 mt-3">
                    <tr>
                        <th><label for="repassword" class="form-label">Nhập lại mật khẩu:</label></th>
                        <td><input type="password" class="form-control" style="width:100%" name="repassword" id="repassword"></td>
                    </tr>
                    </div>
                    <!--Nhập Email-->
                    <div class="mb-3 mt-3">
                    <tr>
                        <th><label for="email" class="form-label">Email:</label></th>
                        <td><input type="email" class="form-control" style="width:100%" name="email" id="email"></td>
                    </tr>
                    </div>
                    <!--Nhập SDT-->
                    <div class="mb-3 mt-3">
                        <tr>
                            <th><label for="phonenumber" class="form-label">Số điện thoại:</label></th>
                            <td><input type="tel" class="form-control" style="width:100%" name="phonenumber" id="phonenumber"></td>
                        </tr>
                    </div>
                    <!--xác nhận-->
                    <tr>
                        <td></td>
                        <td class="float-end"><input type="submit" class="btn btn-primary" style="width:200px" name="register" value="Đăng ký"></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: center"><a href="login.php">Đã có tài khoản? Đăng nhập ngay!</a>
                    </tr>
                </table>
            </form>
        </div>
    </content>
</body>
</html>
