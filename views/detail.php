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
            margin-bottom: 50px;
        }
        .product {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-top: 20px;
        }
        .product img {
            width: 100%;
            height: 500px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .product h2 {
            grid-column: 1 / -1;
            margin-bottom: 10px;
            text-align: center;
        }
        .product p {
            margin: 15px 0;
        }
        .product del {
            color: #999;
        }
        .product strong {
            color: #d00;
            font-size: 1.2em;
        }
        .product form {
            margin-top: 10px;
            display: flex;
            align-items: center;
        }
        .product button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
            margin: 0 5px;
        }
        .product button:hover {
            background-color: #45a049;
        }
        .product input[type="number"] {
            padding: 10px;
            width: 60px;
        }
        .product h4 {
            grid-column: 1 / -1;
            margin-top: 20px;
            border-top: 1px solid #ddd;
            padding-top: 10px;
        }
        .product-details {
            grid-column: 1 / -1;
        }
        .product-image {
            grid-column: 1 / 2;
        }
        .product-info {
            grid-column: 2 / 3;
        }
    </style>
</head>
<body>
    <div class="main">
        <?php require_once "./views/header.php"; ?>
        <div class="product">
            <h2><?= $detailList['ten'] ?></h2>
            <div class="product-image">
                <img src="<?= BASE_UPLOAD . $detailList['hinh_anh'] ?>" alt="">
            </div>
            <div class="product-info">
                <?php if (!empty($detailList['giam_phan_tram'])) : ?>
                    <?php
                        $gia_goc = $detailList['gia'];
                        $giam_phan_tram = $detailList['giam_phan_tram'];
                        $gia_moi = $gia_goc - ($gia_goc * $giam_phan_tram / 100);
                    ?>
                    <p>
                        <del><?= number_format($gia_goc, 0, ',', '.') ?> VNĐ</del>
                        <strong><?= number_format($gia_moi, 0, ',', '.') ?> VNĐ</strong>
                        (Giảm <?= number_format($giam_phan_tram, 0) ?>%)
                    </p>
                <?php else : ?>
                    <p><?= number_format($detailList['gia'], 0, ',', '.') ?> VNĐ</p>
                <?php endif; ?>
                    <form action="index.php?url=add-to-cart" method="post">
                        <input type="hidden" name="product_id" value="<?= $detailList['id'] ?>">
                        <input type="hidden" name="product_name" value="<?= $detailList['ten'] ?>">
                        <input type="hidden" name="product_price" value="<?= isset($gia_moi) ? $gia_moi : $detailList['gia'] ?>">
                        <input type="hidden" name="product_image" value="<?= $detailList['hinh_anh'] ?>">
                        <input type="number" name="quantity" value="1" min="1">
                        <button type="submit" name="add_to_cart">Thêm vào giỏ hàng</button>
                        <button type="submit" name="buy_now">Mua hàng</button>
                    </form>
            </div>

            <div class="product-details">
                <h4>Chi tiết sản phẩm</h4>
                <p>Số lượng trong kho: <?= $detailList['so_luong_kho'] ?></p>
                <p>Nồng độ: <?= $detailList['nong_do_con'] ?>%</p>
                <p>Sản xuất năm: <?= $detailList['nam_san_xuat'] ?></p>
                <p>Loại rượu: <?= $detailList['loai_id'] ?></p>
                <p>Quốc gia: <?= $detailList['quoc_gia_id'] ?></p>
                <p>Thương hiệu: <?= $detailList['hang_id'] ?></p>
                <p>Mô tả: <?= $detailList['mo_ta'] ?></p>
            </div>
        </div>
        <?php require_once "./views/footer.php"; ?>
    </div>
</body>
</html>
