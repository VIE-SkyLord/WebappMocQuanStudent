<!-- change_password.php -->

<?php
function verifyPassword($password, $hashed_password) {
    // So sánh mật khẩu đã được mã hóa với mật khẩu trong cơ sở dữ liệu
    return password_verify($password, $hashed_password);
}

// Kết nối đến cơ sở dữ liệu
include 'connect.php';
if ($conn) echo "Kết nối thành công";
else echo "Kết nối thất bại";
?>

<?php

if (isset($_POST['changepassword'])) {
    $oldpassword = $_POST['oldpassword'];
    $newpassword = $_POST['newpassword'];
    $confirmpassword = $_POST['confirmpassword'];
    //$permission = $_SESSION['permission'];

    // Kiểm tra mật khẩu cũ có đúng không
    $sql = "SELECT mat_khau FROM taikhoan WHERE id_tai_khoan = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row !== false && verifyPassword($oldpassword, $row['mat_khau']) && $newpassword === $confirmpassword) {
            // Cập nhật mật khẩu mới
            $update_sql = "UPDATE taikhoan SET mat_khau = :newpassword WHERE id_tai_khoan = :id";
            $stmt = $conn->prepare($update_sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindValue(':newpassword', password_hash($newpassword, PASSWORD_DEFAULT));

            if ($stmt->execute()) {
                echo '<p class="text-danger">Đổi mật khẩu thành công!</p>';

            } else {
                echo '<p class="text-danger">Đổi mật khẩu thất bại, vui lòng kiểm tra lại mật khẩu cũ</p>';
            }
        } else {
            echo '<p class="text-danger">Đổi mật khẩu thất bại, vui lòng kiểm tra lại mật khẩu cũ</p>';
        }
    }
}

$conn = null; // Đóng kết nối
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <!--BOOTSTRAP5 CS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!--ICONS-->
    <script src="https://kit.fontawesome.com/f443c421d0.js" crossorigin="anonymous"></script>

    <!--BOOTSTRAP5 JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <?php include'session.php' ?>
    <?php include'header.php' ?>
    <?php include'checknav.php' ?>
    <?php
        $directnav($permission, $displayname);
    ?>

    <h2>Đổi mật khẩu</h2>
    <content>
        <div class="container bg-dark" style="padding: 10px">
            <form method="post">
                <table style="color: white; width: 100%" border="1">
                    <!--Mật khẩu-->
                    <div class="mb-3 mt-3">
                    <tr>
                        <th><label for="oldpassword">Mật khẩu cũ:</label></th>
                        <td><input type="password" class="form-control" style="width:100%" name="oldpassword" required><br></td>
                    </tr>
                    </div>
                    <!--mật khẩu mới-->
                    <div class="mb-3 mt-3">
                    <tr>
                        <th><label for="newpassword">Mật khẩu mới:</label></th>
                        <td><input type="password" class="form-control" style="width:100%" name="newpassword" required><br></td>
                    </tr>
                    </div>
                    <!--Nhập lại mật khẩu-->
                    <div class="mb-3 mt-3">
                    <tr>
                        <th><label for="confirmpassword">Nhập lại mật khẩu mới:</label></th>
                        <td><input type="password" class="form-control" style="width:100%" name="confirmpassword" required><br></td>
                    </tr>
                    </div>
                    <!--xác nhận-->
                    <tr>
                        <td></td>
                        <td class="float-end">
                            <a href="information.php"><input type="button" class="btn btn-primary" style="width:300px" name="returnindex" value="Về trang thông tin tài khoản"></a>
                            <input type="submit" class="btn btn-primary" style="width:200px" name="changepassword" value="Đổi mật khẩu">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </content>

    <?php include'footer.php' ?>
</body>
</html>

