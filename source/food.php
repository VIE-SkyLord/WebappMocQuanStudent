<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title></title>
</head>
<body>
    <?php include 'header.php' ?>
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

                header("location: index.php");
            }
            else {
                echo "Đăng nhập thất bại";
            }
        }
    ?>
    <?php include 'pre-menu.php' ?>
    <?php include 'footer.php' ?>
</body>
</html>