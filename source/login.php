<?php
function verifyPassword($password, $hashed_password) {
    // So sánh mật khẩu đã được mã hóa với mật khẩu trong cơ sở dữ liệu
    return password_verify($password, $hashed_password);
}
?>
<?php
    session_start();
    include 'connect.php';
    if($conn) echo "Kết nối thành công";
    else echo "Kết nối thất bại";
    if(isset($_POST['login']))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Sử dụng prepared statements để tránh SQL Injection
        $sql = "SELECT * FROM taikhoan WHERE ten_dang_nhap = :username";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':username', $username);
        $query = $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if($row && verifyPassword($password, $row['mat_khau']))
        {
            $_SESSION['id'] = $row['id_tai_khoan'];
            $_SESSION['username'] = $row['ten_dang_nhap'];
            $_SESSION['displayname'] = $row['ten_hien_thi'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['phonenumber'] = $row['so_dien_thoai'];
            $_SESSION['permission'] = $row['id_quyen_han'];
            $_SESSION['password'] = $row['mat_khau'];

            //kiểm tra quyền hạn
            $permision =  $_SESSION['permission'];
            if($permision == 1){
                header("location: admin.php");
            }
            if($permision == 2){
                header("location: index.php");
            }
        }
        else {
            echo "Đăng nhập thất bại";
        }
    }
?>


<!DOCTYPE html>
<html>
<head>
    <title>Đăng nhập</title>

    <!--BOOTSTRAP5-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <header style="text-align: center">
        <h1><b>Đăng nhập</b></h1>
    </header>

    <content>
        <div class="container bg-dark" style="padding: 10px">
            <form method="post">
                <table style="color: white; width: 100%" border="1">
                    <div class="mb-3 mt-3">
                    <tr>
                        <th><label for="username" class="form-label">Tên đăng nhập:</label></th>
                        <td><input type="text" class="form-control" style="width:100%" name="username" id="username"></td>
                    </tr>
                    </div>
                    <div class="mb-3 mt-3">
                    <tr>
                        <th><label for="password" class="form-label">Mật khẩu:</label></th>
                        <td><input type="password" class="form-control" style="width:100%" name="password" id="password"></td>
                    </tr>
                    </div>
                    <tr>
                        <td></td>
                        <td class="float-end"><input type="submit" class="btn btn-primary" style="width:200px" name="login" value="Đăng nhập"></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: center"><a href="register.php">Chưa có tài khoản? Đăng ký ngay!</a>
                    </tr>
                </table>
            </form>
        </div>
    </content>
</body>
</html>
