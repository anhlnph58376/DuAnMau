<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php require_once "./views/header.php"; ?>
    <div class="product">
        <h2><?= $detailList['ten'] ?></h2>
        <img src="<?= BASE_UPLOAD . $detailList['hinh_anh'] ?>" alt="">
        <p><?= $detailList['gia'] ?> VNĐ</p>
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
</body>
</html>