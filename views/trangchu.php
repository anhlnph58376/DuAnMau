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
            padding: 0 200px;
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
            width: 90%;
            padding: 10px;
            margin: 10px;
            border-radius: 5px;
            background-color: #605ee0;
            color: #f3f3fd;
            font-size: 16px;
        }
        .main .container h2{
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="main">
        <?php require_once "./views/header.php"; ?>
        <div class="container">
            <h2>Sản phẩm nổi bật</h2>
            <div class="product">
                <?php foreach($ruouvangList as $item){ ?>
                    <div class="product_item">
                        <div class="product_img">
                            <img src="<?= BASE_UPLOAD . $item['hinh_anh'] ?>" alt="">
                        </div>
                        <br>
                        <div class="product_name">
                            <a href="<?= BASE_URL . "?act=detail&id=" . $item['id'] ?>"><?= $item['ten'] ?></a>
                            <p><?= $item['gia'] ?> VND</p>
                        </div>
                        <button type="submit">Thêm vào giỏ hàng</button>
                    </div>
                <?php } ?>
            </div>
        </div>
        <?php require_once "./views/footer.php"; ?>
    </div>
</body>
</html>