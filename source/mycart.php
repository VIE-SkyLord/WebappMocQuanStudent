<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title></title>
    <?php include 'bootstrap.php' ?>
</head>
<body>
    <?php include 'session.php' ?>
    <?php include 'header.php' ?>
    <?php include 'checknav.php' ?>
    <?php $directnav($permission,$displayname); ?>
    <!--Content-->
    <?php include 'footer.php' ?>
</body>
</html>