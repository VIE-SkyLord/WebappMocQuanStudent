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

    <!--BOOTSTRAP5 CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!--ICONS-->
    <script src="https://kit.fontawesome.com/f443c421d0.js" crossorigin="anonymous"></script>

    <!--BOOTSTRAP5 JS-->
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
                    <a class="nav-link active" href="mycart.php">Giỏ hàng của tôi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="table.php">Đặt bàn ăn</a>
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
    <div style="background-color:antiquewhite; height:auto">
        <p>Đây là nội dung</p>
        <!-- Carousel -->
        <div id="demo" class="carousel slide container" data-bs-ride="carousel">

            <!-- Indicators/dots -->
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
            </div>

            <!-- The slideshow/carousel -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="../image/food/banhgaotoboki.jpg" alt="Bánh gạo toboki" class="d-block w-100">
                    <div class="carousel-caption">
                        <h3 style="background-color:black">Bánh gạo toboki</h3>
                        <p class="btn btn-info">30.000 VND/ 1 Đĩa     <a href="" class="btn btn-danger">Chi tiết</a></p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="../image/food/xucxichxienran.jpg" alt="Xúc xích xiên rán" class="d-block w-100">
                    <div class="carousel-caption">
                        <h3 style="background-color:black">Xúc xích xiên rán</h3>
                        <p class="btn btn-info">35.000 VND/ 1 Đĩa 5 cái     <a href="" class="btn btn-danger">Chi tiết</a></p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="../image/food/shusichien.jpg" alt="Shusi chiên xù" class="d-block w-100">
                    <div class="carousel-caption">
                        <h3 style="background-color:black">Shusi chiên xù</h3>
                        <p class="btn btn-info">50.000 VND/ 1 Đĩa 10 cái     <a href="" class="btn btn-danger">Chi tiết</a></p>
                    </div>
                </div>
            </div>

            <!-- Left and right controls/icons -->
            <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
        <div class="container" style="padding:10px">
            <!--IFRAME MENU-->

            <!--<iframe src="menu.php" style="overflow-x: auto; width:100%; height:2500px" scrolling="no"></iframe>-->
            <?php include 'menu.php' ?>

        </div>
    </div>

    <!--FOOTER-->
    <footer class="container-fluid" style="background-color:forestgreen;">
        <p style="padding: 5px">Coffeemocquanstudent@gmail.com</p>
    </footer>
</body>
</html>