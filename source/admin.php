<?php
    session_start();
    if(empty($_SESSION['username']))
    {
        header("location: login.php");
    }
    else
    {
        $displayname = $_SESSION['displayname'];
    }
?>

<?php
    include 'connect.php';
    if($conn) echo "Kết nối thành công";
    else echo "Kết nối thất bại";
?>

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Mộc quán Student</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--BOOTSTRAP5-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!--ICONS-->
    <script src="https://kit.fontawesome.com/f443c421d0.js" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>
    <!--HEADER-->
    <header>
        <!--LOGO AND NAME-->
        <table border="0" style="width:100%; height: 40px; background-color:forestgreen; border-color:white">
            <tr>
                <td style="width:auto; height: auto; text-align:left"><img src="../image/logo.jpg" style="height:100px; width:auto; margin-left:0px" alt="brand-logo" /></td>
                <td><h1 style="text-align:center">Coffee Mộc Quán Student</h1></td>
            </tr>
        </table>
    </header>

    <!--CONTENT-->
    <!--NAV BAR-->
    <nav class="navbar navbar-expand-sm bg-danger navbar-dark">
        <div class="container-fluid">
            <ul class="navbar-nav">
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
                        <div class="dropdown" style="padding:5px">
                          <a class="nav-brand text-light" data-bs-toggle="dropdown" href=""><i class="fa-regular fa-user"></i></a>
                          <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="information.php">Thông tin cá nhân</a></li>
                            <li><a class="dropdown-item" href="mycart.php">Giỏ hàng của tôi</a></li>
                            <li><a class="dropdown-item" href="purchasehistory.php">Lịch sử mua hàng</a></li>
                            <li><a class="dropdown-item text-danger" href="logout.php">Đăng xuất</a></li>
                          </ul>
                        </div>
                    </td>
                    <td>
                        <h3 style="font-size:20px; color:white; width:250px; font-size:14px">Xin chào! <?php echo $displayname ?>.</h3>
                    </td>
                </tr>
            </table>
        </div>
    </nav>

    <!--FOOTER-->
    <footer class="container-fluid" style="background-color:forestgreen;">
        <p style="padding: 5px">Coffeemocquanstudent@gmail.com</p>
    </footer>
</body>
</html>