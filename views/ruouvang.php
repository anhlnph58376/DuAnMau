<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Rượu vang</title>
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
            <h2>Rượu vang</h2>
            <div class="product">
                <?php foreach($ruouvangList as $item){ ?>
                    <div class="product_item">
                        <div class="product_img">
                            <img src="<?= BASE_UPLOAD . $item['hinh_anh'] ?>" alt="">
                        </div>
                        <br>
                        <div class="product_name">
                            <a href="index.php?url=detail&id=<?= $item['id'] ?>"><?= $item['ten'] ?></a>
                            <p><?= number_format($item['gia'], 0, ',', '.') ?> VND</p>
                        </div>
                        <button>Thêm vào giỏ hàng</button>
                        <form action="index.php?url=add-to-cart" method="post" style="display: inline;">
                            <input type="hidden" name="product_id" value="<?= $item['id'] ?>">
                            <input type="hidden" name="quantity" value="1">
                            <input type="hidden" name="redirect_to_cart" value="true">
                            <button type="submit">Mua ngay</button>
                        </form>
                    </div>
                <?php } ?>
            </div>
        </div>
        <?php require_once "./views/footer.php"; ?>
    </div>
</body>
</html>
