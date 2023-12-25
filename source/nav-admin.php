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
                    <a class="nav-link active" href="account.php">Tài khoản</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="importmaterial.php">Nhập hàng</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="food.php">Món ăn </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="table.php">Bàn ăn </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="size.php">Kích cỡ </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="unit.php">Đơn vị tính </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="foodstatus.php">Trạng thái món ăn</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="permission.php">Quyền hạn</a>
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