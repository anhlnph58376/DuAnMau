<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ cửa hàng rượu Việt</title>
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
        .main .container .product{
            display: flex;
            justify-content: space-between;
            text-align: center;
            padding: 10px 0 100px 0;
            flex-wrap: wrap;
            gap: 16px;
        }
        .main .container .product .product_item{
            width: 24%;
            border: 1px solid;
            border-radius: 5px;
            background-color: #c4c4c4;
        }
        .main .container .product .product_item .product_name a{
            text-align: right;
            font-size: 16px;
            text-decoration: none;
            color: black;
            font-weight: bold;
        }
        .main .container .product .product_item .product_img img{
            width: 60%;
            display: flex;
            justify-content: right;
            padding: 20px;
        }
        .main .container .product .product_item button{
            width: 40%;
            padding: 10px;
            margin: 10px 5px;
            border-radius: 5px;
            background-color: #605ee0;
            color: #f3f3fd;
            font-size: 16px;
            cursor: pointer;
        }
        .main .container h2{
            margin: 20px 0;
        }
        .notification {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #4CAF50;
            color: white;
            padding: 15px;
            border-radius: 5px;
            z-index: 1000;
            display: none;
        }
    </style>
</head>
<body>
    <div class="main">
        <?php require_once "./views/header.php"; ?>
        <div class="container">
            <?php if (isset($_GET['keyword']) && !empty($_GET['keyword'])): ?>
                <h2>Kết quả tìm kiếm cho: "<?= htmlspecialchars($_GET['keyword']) ?>"</h2>
                <?php if (!empty($searchResults)): ?>
                    <p style="color: #666; margin-bottom: 20px;">Tìm thấy <?= count($searchResults) ?> sản phẩm</p>
                <?php else: ?>
                    <p style="color: #666; margin-bottom: 20px;">Không tìm thấy sản phẩm nào</p>
                <?php endif; ?>
            <?php else: ?>
                <h2>Sản phẩm nổi bật</h2>
            <?php endif; ?>

            <div class="product">
                <?php 
                // Hiển thị kết quả tìm kiếm hoặc sản phẩm nổi bật
                $displayProducts = isset($searchResults) && !empty($searchResults) ? $searchResults : array_slice($ruouvangList, 0, 8);
                foreach($displayProducts as $item){ ?>
                    <div class="product_item">
                        <div class="product_img">
                            <img src="<?= BASE_UPLOAD . $item['hinh_anh'] ?>" alt="">
                        </div>
                        <br>
                        <div class="product_name">
                            <a href="index.php?url=detail&id=<?= $item['id'] ?>"><?= $item['ten'] ?></a>
                            <p><?= number_format($item['gia'], 0, ',', '.') ?> VND</p>
                        </div>
                        <form action="index.php?url=add-to-cart" method="post" style="display: inline;">
                            <input type="hidden" name="product_id" value="<?= $item['id'] ?>">
                            <input type="hidden" name="quantity" value="1">
                            <input type="hidden" name="redirect_to_cart" value="true">
                            <button type="submit" name="add_to_cart">Thêm vào giỏ hàng</button>
                            <button type="submit" name="buy_now">Mua hàng</button>
                        </form>
                    </div>
                <?php } ?>
                
                <?php if (isset($_GET['keyword']) && !empty($_GET['keyword']) && empty($searchResults)): ?>
                    <div style="width: 100%; text-align: center; padding: 50px;">
                        <i class="fas fa-search fa-3x" style="color: #ccc; margin-bottom: 20px;"></i>
                        <h3 style="color: #666;">Không tìm thấy sản phẩm nào</h3>
                        <p style="color: #999;">Vui lòng thử lại với từ khóa khác</p>
                        <a href="index.php" style="display: inline-block; margin-top: 20px; padding: 10px 20px; background-color: #605ee0; color: white; text-decoration: none; border-radius: 5px;">
                            Xem tất cả sản phẩm
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php require_once "./views/footer.php"; ?>
    </div>
</body>
</html>
