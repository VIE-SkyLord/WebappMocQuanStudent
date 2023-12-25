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
    <?php include'header.php' ?>
    <?php include'nav-admin.php' ?>
    <div div id="content-container" style="background-color:antiquewhite; height:auto">
        <?php include 'menu.php' ?>
    </div>
    <?php include'footer.php' ?>
</body>
</html>