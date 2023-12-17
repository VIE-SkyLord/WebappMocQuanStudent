<?php
    include 'connect.php';
    if($conn) echo "Kết nối thành công";
    else echo "Kết nối thất bại";

    $sql = "SELECT `monan`.`ten_mon_an`, `monan`.`hinh_anh`, `monan`.`gia_ca`, `donvitinh`.`ten_don_vi_tinh` FROM `monan` 
            INNER JOIN `donvitinh` ON `monan`.id_don_vi_tinh = donvitinh.id_don_vi_tinh
            WHERE `monan`.`id_loai_mon_an` = '1'
            ORDER BY `monan`.`gia_ca` ASC;";
        $stmt = $conn->prepare($sql);
        $query = $stmt->execute();
        $result = array();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            $result[] = $row;
        }

    $sql1 = "SELECT `monan`.`ten_mon_an`, `monan`.`hinh_anh`, `monan`.`gia_ca`, `donvitinh`.`ten_don_vi_tinh` FROM `monan` 
            INNER JOIN `donvitinh` ON `monan`.id_don_vi_tinh = donvitinh.id_don_vi_tinh
            WHERE `monan`.`id_loai_mon_an` = '2'
            ORDER BY `monan`.`gia_ca` ASC;";
        $stmt1 = $conn->prepare($sql1);
        $query1 = $stmt1->execute();
        $result1 = array();
        while($row = $stmt1->fetch(PDO::FETCH_ASSOC))
        {
            $result1[] = $row;
        }

    $sql2 = "SELECT `monan`.`ten_mon_an`, `monan`.`hinh_anh`, `monan`.`gia_ca`, `donvitinh`.`ten_don_vi_tinh` FROM `monan` 
            INNER JOIN `donvitinh` ON `monan`.id_don_vi_tinh = donvitinh.id_don_vi_tinh
            WHERE `monan`.`id_loai_mon_an` = '3'
            ORDER BY `monan`.`gia_ca` ASC;";
        $stmt2 = $conn->prepare($sql2);
        $query2 = $stmt2->execute();
        $result2 = array();
        while($row = $stmt2->fetch(PDO::FETCH_ASSOC))
        {
            $result2[] = $row;
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
    <?php foreach($result as $item): ?>
        <div class="card col-sm-3">
          <img class="card-img-top" src="data:image/jpeg;base64,<?php echo base64_encode( $item['hinh_anh'] )?>" style="width:100%; height:auto" alt="Card image">
          <div class="card-body">
             <h4 class="card-title"><?php echo $item['ten_mon_an'] ?></h4>
             <p class="card-text"><?php echo $item['gia_ca'].'VND /'.$item['ten_don_vi_tinh'] ?></p>
             <input type="number" id="myNumber" value="0" min="0" max="<?php echo $item['soluong'] ?>" style="width: 60px">
             <a href="#" class="btn btn-primary">Đặt món</a>
             <a href="#" class="btn btn-primary">Chi tiết</a>
          </div>
        </div>
    <?php endforeach ?>
    </div>


    <div class="row">
    <h1>Đồ ăn nhanh</h1>
    <?php foreach($result1 as $item): ?>
        <div class="card col-sm-3">
          <img class="card-img-top" src="data:image/jpeg;base64,<?php echo base64_encode( $item['hinh_anh'] )?>" style="width:100%; height:auto" alt="Card image">
          <div class="card-body">
             <h4 class="card-title"><?php echo $item['ten_mon_an'] ?></h4>
             <p class="card-text"><?php echo $item['gia_ca'].'VND /'.$item['ten_don_vi_tinh'] ?></p>
             <!--<input type="number" id="myNumber" value="0" min="0" max="<?php echo $item['soluong'] ?>" style="width: 60px">-->
             <a href="#" class="btn btn-primary">Thêm vào giỏ hàng</a>
             <a href="#" class="btn btn-primary">Đặt món</a>
          </div>
        </div>
    <?php endforeach ?>
    </div>

    <div class="row">
    <h1>Pizza</h1>
    <?php foreach($result2 as $item): ?>
        <div class="card col-sm-3">
          <img class="card-img-top" src="data:image/jpeg;base64,<?php echo base64_encode( $item['hinh_anh'] )?>" style="width:100%; height:auto" alt="Card image">
          <div class="card-body">
             <h4 class="card-title"><?php echo $item['ten_mon_an'] ?></h4>
             <p class="card-text"><?php echo $item['gia_ca'].' /'.$item['donvi'] ?></p>
             <input type="number" id="myNumber" value="0" min="0" max="<?php echo $item['soluong'] ?>" style="width: 60px">
             <a href="#" class="btn btn-primary">Đặt món</a>
             <a href="#" class="btn btn-primary">Chi tiết</a>
          </div>
        </div>
    <?php endforeach ?>
    </div>
</div>

</body>
</html>