<?php
    session_start();
    if(empty($_SESSION['username']))
    {
        header("location: login.php");
    }
    else
    {
        $id = $_SESSION['id'];
        $displayname = $_SESSION['displayname'];
        $username = $_SESSION['username'];
        $email = $_SESSION['email'];
        $phonenumber = $_SESSION['phonenumber'];
    }
?>

<?php
    include 'connect.php';
    if ($conn) {
        echo "Kết nối thành công";
    } else {
        echo "Kết nối thất bại";
    }

    if (isset($_POST['changeinformation'])) {
        $displayname = $_POST['displayname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phonenumber = $_POST['phonenumber'];
        $id = $_SESSION['id'];

        // Sử dụng prepared statements để tránh SQL Injection
        $sql = "UPDATE `taikhoan` SET `ten_hien_thi` = :displayname, `ten_dang_nhap` = :username, `email` = :email, `so_dien_thoai` = :phonenumber WHERE `taikhoan`.`id_tai_khoan` = :id;";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':displayname', $displayname);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phonenumber', $phonenumber);
        $stmt->bindParam(':id', $id); 
        $query = $stmt->execute();
        
        // Kiểm tra số dòng bị ảnh hưởng
        $rowsAffected = $stmt->rowCount();

        // Cập nhật lại phiên
        if ($rowsAffected > 0) {
            // Session đã được cập nhật bởi câu truy vấn UPDATE, không cần fetch dữ liệu
            echo "Cập nhật thông tin tài khoản thành công";
        } else {
            echo "Cập nhật thông tin tài khoản thất bại";
        }
    }
?>


<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Thông tin tài khoản</title>
    <!--BOOTSTRAP5-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!--ICONS-->
    <script src="https://kit.fontawesome.com/f443c421d0.js" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <header style="text-align: center">
        <h1><b>Thông tin tài khoản</b></h1>
    </header>

    <content>
        <div class="container bg-dark" style="padding: 10px">
            <form method="post">
                <table style="color: white; width: 100%" border="1">
                    <!--ID-->
                    <!--
                    <div class="mb-3 mt-3">
                    <tr>
                        <th><label for="id" class="form-label">ID:</label></th>
                        <td><input type="text" class="form-control" style="width:100%" name="id" id="id" value="<?php echo $id ?>"></td>
                    </tr>
                    </div>
                    -->
                    <!--Nhập tên người dùng-->
                    <div class="mb-3 mt-3">
                    <tr>
                        <th><label for="displayname" class="form-label">Tên hiển thị:</label></th>
                        <td><input type="text" class="form-control" style="width:100%" name="displayname" id="displayname" value="<?php echo $displayname ?>"></td>
                    </tr>
                    </div>
                    <!--Nhập tên đăng nhập-->
                    <div class="mb-3 mt-3">
                    <tr>
                        <th><label for="username" class="form-label">Tên đăng nhập:</label></th>
                        <td><input type="text" class="form-control" style="width:100%" name="username" id="username" value="<?php echo $username ?>"></td>
                    </tr>
                    </div>
                    <!--Nhập Email-->
                    <div class="mb-3 mt-3">
                    <tr>
                        <th><label for="email" class="form-label">Email:</label></th>
                        <td><input type="email" class="form-control" style="width:100%" name="email" id="email" value = "<?php echo $email ?>"></td>
                    </tr>
                    </div>
                    <!--Nhập SDT-->
                    <div class="mb-3 mt-3">
                        <tr>
                            <th><label for="phonenumber" class="form-label">Số điện thoại:</label></th>
                            <td><input type="tel" class="form-control" style="width:100%" name="phonenumber" id="phonenumber" value = "<?php echo $phonenumber ?>"></td>
                        </tr>
                    </div>
                    <!--xác nhận-->
                    <tr>
                        <td></td>
                        <td class="float-end">
                            <a href="index.php"><input type="button" class="btn btn-primary" style="width:200px" name="returnindex" value="Về trang chủ"></a>
                            <input type="submit" class="btn btn-primary" style="width:200px" name="changeinformation" value="Thay đổi thông tin">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: center"><a href="changepassword.php">Đổi mật khẩu</a>
                    </tr>
                </table>
            </form>
        </div>
    </content>
</body>
</html>