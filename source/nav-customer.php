<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title></title>
</head>
<body>
    <!--CONTENT-->
    <!--NAV BAR-->
    <nav class="navbar navbar-expand-sm bg-danger navbar-dark">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="index.php">Trang chủ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="information.php">Thông tin cá nhân</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="mycart.php">Giỏ hàng của tôi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="booking.php">Đặt bàn ăn</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="purchasehistory.php">Lịch sử mua hàng</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="logout.php">Đăng xuất</a>
                </li>      
            </ul>
        </div>
        <div class="float-sm-end">
            <table border="0">
                <tr>
                    <td>
                        <h3 style="font-size:20px; color:white; width:250px; font-size:14px">Xin chào! <?php echo $displayname ?>.</h3>
                    </td>
                </tr>
            </table>
        </div>
    </nav>
</body>
</html>