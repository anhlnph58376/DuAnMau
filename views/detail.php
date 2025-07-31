<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Itim&display=swap" rel="stylesheet">
    <style>
        *{
            padding: 0;
            margin: 0;
            font-family: 'Itim', cursive;
        }
        .main{
            padding: 0 100px;
        }
    </style>
</head>
<body>
    <div class="main">
        <?php require_once "./views/header.php"; ?>
        <div class="product">
            <h2><?= $detailList['ten'] ?></h2>
            <img src="<?= BASE_UPLOAD . $detailList['hinh_anh'] ?>" alt="">
            <p><?= $detailList['gia'] ?> VNĐ</p>
            <button type="submit">Thêm vào giỏ hàng</button>
            <h4>Chi tiết sản phẩm</h4>
            <p>Số lượng trong kho: <?= $detailList['so_luong_kho'] ?></p>
            <p>Nồng độ: <?= $detailList['nong_do_con'] ?>%</p>
            <p>Sản xuất năm <?= $detailList['nam_san_xuat'] ?></p>
            <p>Loại rượu: <?= $detailList['loai_id'] ?></p>
            <p>Quốc gia: <?= $detailList['quoc_gia_id'] ?></p>
            <p>Thương hiệu: <?= $detailList['hang_id'] ?></p>
            <p><?= $detailList['mo_ta'] ?></p>
        </div>
        <?php require_once "./views/footer.php"; ?>
    </div>
</body>
</html>