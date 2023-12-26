<?php
    include 'connect.php';
    include 'session.php';
    if($conn) echo "Kết nối thành công";
    else echo "Kết nối thất bại";
?>
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Mộc quán Student</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php include 'bootstrap.php' ?>

</head>
<body>

<body style="background-color:antiquewhite">
    <?php include 'header.php' ?>
    <?php include 'checknav.php' ?>
    <?php $directnav($permission,$displayname); ?>
    <div div id="content-container" height:auto">
        <?php include 'checkpage.php' ?>
        <?php $directpage($permission,'pre-menu.php','menu.php'); ?>
    </div>
    <?php include 'footer.php' ?>
</body>
</html>