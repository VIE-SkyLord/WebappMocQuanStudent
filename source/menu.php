<?php
    include 'connect.php';
    if($conn) echo "Kết nối thành công";
    else echo "Kết nối thất bại";

    $sql_coffee = "SELECT `monan`.`ten_mon_an`, `monan`.`hinh_anh`, `kichco`.`ten_kich_co`, `monan`.`gia_ca`, `donvitinh`.`ten_don_vi_tinh`, `tinhtrangmon`.`ten_tinh_trang_mon_an` FROM `monan` 
            INNER JOIN `donvitinh` ON `monan`.id_don_vi_tinh = donvitinh.id_don_vi_tinh
            INNER JOIN `tinhtrangmon` ON `monan`.`id_tinh_trang` = `tinhtrangmon`.`id_tinh_trang_mon_an`
            INNER JOIN `kichco` ON `monan`.`id_kich_co` = `kichco`.`id_kich_co`
            WHERE `monan`.`id_loai_mon_an` = '1'
            ORDER BY `monan`.`gia_ca` ASC;";
        $stmt_coffee = $conn->prepare($sql_coffee);
        $query_coffee = $stmt_coffee->execute();
        $result_coffee = array();
        while($row_coffee = $stmt_coffee->fetch(PDO::FETCH_ASSOC))
        {
            $result_coffee[] = $row_coffee;
        }

    $sql_fastfood = "SELECT `monan`.`ten_mon_an`, `monan`.`hinh_anh`, `kichco`.`ten_kich_co`, `monan`.`gia_ca`, `donvitinh`.`ten_don_vi_tinh`, `tinhtrangmon`.`ten_tinh_trang_mon_an` FROM `monan` 
            INNER JOIN `donvitinh` ON `monan`.id_don_vi_tinh = donvitinh.id_don_vi_tinh
            INNER JOIN `tinhtrangmon` ON `monan`.`id_tinh_trang` = `tinhtrangmon`.`id_tinh_trang_mon_an`
            INNER JOIN `kichco` ON `monan`.`id_kich_co` = `kichco`.`id_kich_co`
            WHERE `monan`.`id_loai_mon_an` = '2'
            ORDER BY `monan`.`gia_ca` ASC;";
        $stmt_fastfood = $conn->prepare($sql_fastfood);
        $query_fastfood = $stmt_fastfood->execute();
        $result_fastfood = array();
        while($row_fastfood = $stmt_fastfood->fetch(PDO::FETCH_ASSOC))
        {
            $result_fastfood[] = $row_fastfood;
        }

    $sql_pizza = "SELECT `monan`.`ten_mon_an`, `monan`.`hinh_anh`, `kichco`.`ten_kich_co`, `monan`.`gia_ca`, `donvitinh`.`ten_don_vi_tinh`, `tinhtrangmon`.`ten_tinh_trang_mon_an` FROM `monan` 
            INNER JOIN `donvitinh` ON `monan`.id_don_vi_tinh = donvitinh.id_don_vi_tinh
            INNER JOIN `tinhtrangmon` ON `monan`.`id_tinh_trang` = `tinhtrangmon`.`id_tinh_trang_mon_an`
            INNER JOIN `kichco` ON `monan`.`id_kich_co` = `kichco`.`id_kich_co`
            WHERE `monan`.`id_loai_mon_an` = '3'
            ORDER BY `monan`.`gia_ca` ASC;";
        $stmt_pizza = $conn->prepare($sql_pizza);
        $query_pizza = $stmt_pizza->execute();
        $result_pizza = array();
        while($row_pizza = $stmt_pizza->fetch(PDO::FETCH_ASSOC))
        {
            $result_pizza[] = $row_pizza;
        }
?>
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Menu</title>
    <meta name="viewport" conten_mon_ant="width=device-width, initial-scale=1">

    <!--BOOTSTRAP5-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

    <!--ICONS-->
    <script src="https://kit.fontawesome.com/f443c421d0.js" crossorigin="anonymous"></script>

</head>
<body>
    <div class="row">
    <h1>Cà phê</h1>
    <?php foreach($result_coffee as $item): ?>
        <div class="card col-sm-4">
          <img class="card-img-top" src="data:image/jpeg;base64,<?php echo base64_encode( $item['hinh_anh'] )?>" style="width:100%; height:auto" alt="Card image">
          <div class="card-body">
             <h4 class="card-title"><?php echo $item['ten_mon_an'] ?></h4>
             <p class="card-text"><?php echo 'Kích cỡ: '.$item['ten_kich_co'] ?></p>
             <p class="card-text"><?php echo $item['gia_ca'].'VND /'.$item['ten_don_vi_tinh'] ?></p>
             <p class="card-text text-dark"><?php echo $item['ten_tinh_trang_mon_an'] ?></p>
             <input type="number" id="myNumber" value="0" min="0" max="100" style="width: 60px">
             <a href="#" class="btn btn-primary">Thêm vào giỏ hàng</a>
             <a href="#" class="btn btn-primary">Thêm vào bàn ăn</a>
          </div>
        </div>
    <?php endforeach ?>
    </div>


    <div class="row">
    <h1>Đồ ăn nhanh</h1>
    <?php foreach($result_fastfood as $item): ?>
        <div class="card col-sm-4">
          <img class="card-img-top" src="data:image/jpeg;base64,<?php echo base64_encode( $item['hinh_anh'] )?>" style="width:100%; height:auto" alt="Card image">
          <div class="card-body">
             <h4 class="card-title"><?php echo $item['ten_mon_an'] ?></h4>
             <p class="card-text"><?php echo 'Kích cỡ: '.$item['ten_kich_co'] ?></p>
             <p class="card-text"><?php echo $item['gia_ca'].'VND /'.$item['ten_don_vi_tinh'] ?></p>
             <p class="card-text text-dark"><?php echo $item['ten_tinh_trang_mon_an'] ?></p>
             <input type="number" id="myNumber" value="0" min="0" max="100" style="width: 60px">
             <a href="#" class="btn btn-primary">Thêm vào giỏ hàng</a>
             <a href="#" class="btn btn-primary">Thêm vào bàn ăn</a>
          </div>
        </div>
    <?php endforeach ?>
    </div>

    <div class="row">
    <h1>Pizza</h1>
    <?php foreach($result_pizza as $item): ?>
        <div class="card col-sm-4">
          <img class="card-img-top" src="data:image/jpeg;base64,<?php echo base64_encode( $item['hinh_anh'] )?>" style="width:100%; height:auto" alt="Card image">
          <div class="card-body">
             <h4 class="card-title"><?php echo $item['ten_mon_an'] ?></h4>
             <p class="card-text"><?php echo 'Kích cỡ: '.$item['ten_kich_co'] ?></p>
             <p class="card-text"><?php echo $item['gia_ca'].' /'.$item['ten_don_vi_tinh'] ?></p>
             <p class="card-text text-dark"><?php echo $item['ten_tinh_trang_mon_an'] ?></p>
             <input type="number" id="myNumber" value="0" min="0" max="100" style="width: 60px">
             <a href="#" class="btn btn-primary">Thêm vào giỏ hàng</a>
             <a href="#" class="btn btn-primary">Thêm vào bàn ăn</a>
          </div>
        </div>
    <?php endforeach ?>
    </div>
</div>

</body>
</html>