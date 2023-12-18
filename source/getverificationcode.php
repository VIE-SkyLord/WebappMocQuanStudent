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

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Lấy mã xác nhận</title>

    <!-- BOOTSTRAP5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- ICONS -->
    <script src="https://kit.fontawesome.com/f443c421d0.js" crossorigin="anonymous"></script>

    <!-- BOOTSTRAP5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <header style="text-align: center">
        <h1><b>Lấy mã xác nhận</b></h1>
    </header>

    <content>
        <div class="container bg-dark" style="padding: 10px">
            <form method="post" onsubmit="return handleSubmit(this)">
                <table style="color: white; width: 100%" border="1">
                    <div class="mb-3 mt-3">
                        <tr>
                            <th style="width: 20%"><label for="email" class="form-label">Email:</label></th>
                            <td style="width: 100%"><input type="text" class="form-control" style="width:100%" name="email" id="email"></td>
                            <td class="float-end"><input type="submit" class="btn btn-primary" style="width:200px" name="sendemail" value="Gửi mã"></td>
                        </tr>
                    </div>
                </table>
            </form>
            <form method="post" onsubmit="return handleSubmit(this)">
                <table style="color: white; width: 100%" border="1">
                    <div class="mb-3 mt-3">
                        <tr>
                            <th style="width: 20%"><label for="phonenumber" class="form-label">Số điện thoại:</label></th>
                            <td style="width: 100%"><input type="text" class="form-control" style="width:100%" name="phonenumber" id="phonenumber"></td>
                            <td class="float-end"><input type="submit" class="btn btn-primary" style="width:200px" name="sendphonenumber" value="Gửi mã"></td>
                        </tr>
                    </div>
                </table>
            </form>
            <form method="post" onsubmit="return handleSubmit(this)">
                <table style="color: white; width: 100%" border="1">
                    <div class="mb-3 mt-3">
                        <tr>
                            <th style="width: 20%"><label for="verificationcode" class="form-label">Mã xác nhận:</label></th>
                            <td style="width: 100%"><input type="text" class="form-control" style="width:100%" name="verificationcode" id="verificationcode"></td>
                            <td class="float-end"><input type="submit" class="btn btn-primary" style="width:200px" name="sendverificationcode" value="Xác nhận"></td>
                        </tr>
                    </div>
                </table>
            </form>
            <table>
                <tr>
                     <td><a href="index.php"><input type="button" class="btn btn-primary" style="width:200px" name="returnindex" value="Về trang chủ"></a></td>
                     <td><a href="information.php"><input type="button" class="btn btn-primary" style="width:300px" name="returnindex" value="Về trang thông tin tài khoản"></a></td>
                </tr>
            </table>
        </div>
    </content>

    <script>
        function handleSubmit(form) {
            var email = form.elements["email"].value;
            var phonenumber = form.elements["phonenumber"].value;

            // Kiểm tra và xử lý logic
            if (email && !phonenumber) {
                // Gửi mã qua email
                console.log('Gửi mã qua email:', email);
            } else if (!email && phonenumber) {
                // Gửi mã qua số điện thoại
                console.log('Gửi mã qua số điện thoại:', phonenumber);
            } else if (email && phonenumber) {
                // Hiển thị lựa chọn cho người dùng
                var choice = confirm("Bạn muốn gửi mã qua email hay số điện thoại?");
                if (choice) {
                    // Gửi mã qua email
                    console.log('Gửi mã qua email:', email);
                } else {
                    // Gửi mã qua số điện thoại
                    console.log('Gửi mã qua số điện thoại:', phonenumber);
                }
            } else {
                // Thông báo lỗi khi không có thông tin nào được nhập
                alert("Vui lòng nhập email hoặc số điện thoại.");
            }

            // Gửi dữ liệu và xử lý tiếp theo nếu cần
            // ...

            return false; // Để ngăn form submit mặc định
        }
    </script>
</body>
</html>
