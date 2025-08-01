<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .header .nav{
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0;
        }
        .header .nav .menu ul{
            display: flex;
            justify-content: space-between;
        }
        .header .nav .menu ul li{
            list-style: none;
        }
        .header .nav .menu ul li a{
            text-decoration: none;
            color: black;
            font-size: 16px;
            padding: 10px 10px;
            display: block;
        }

        .header .nav .logo {
            display: flex;
            justify-content: space-between;
        }

        .header .nav .logo a{
            margin: 10px;
        }

        .header .nav .logo a{
            text-decoration: none;
            color: black;
            font-size: 16px;
            padding: 10px 10px;
            display: block;
        }

        .search{
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: center;
            border: 1px solid black;
            padding: 5px;
            margin: 10px;
            border-radius: 15px;
        }
        .search input{
            display: inline-block;
            width: 80%;
            border: none;
            outline: none;
        }
        .search button{
            display: inline-block;
            width: 18%;
            text-align: center;
            border: none;
            background-color: transparent;
            cursor: pointer;
            outline: none;
        }
        .header .banner img{
            width: 100%;
            height: 400px;
        }
    </style>
</head>
<body>
        <div class="header">
            <div class="nav">
                <div class="logo">
                    <img src="<?= BASE_UPLOAD . "logo/logo.png" ?>" alt="" width="60">
                    <a href="<?= BASE_URL ?>">CỬA HÀNG RƯỢU VIỆT</a>
                </div>
                <div class="menu">
                    <ul>
                    <li>
                        <form urlion="#" class="search">
                            <input  type="text" name="" id="">
                            <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </form>
                    </li>
                    <li><a href="<?= BASE_URL ?>">Trang chủ</a></li>
                    <li><a href="<?= BASE_URL . "?url=ruouvang" ?>">Rượu vang</a></li>
                    <li><a href="<?= BASE_URL . "?url=ruoumanh" ?>">Rượu mạnh</a></li>
                    <li><a href="<?= BASE_URL . "?url=khuyenmai" ?>">Khuyễn mãi</a></li>
                    <li><a href="index.php?url=cart"><i class="fa-solid fa-cart-shopping"></i> (<?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0; ?>)</a></li>
                    <?php if (isset($_SESSION['user'])) { ?>
                        <li><a href="index.php?url=logout">Đăng xuất</a></li>
                    <?php } else { ?>
                        <li><a href="index.php?url=login">Đăng nhập</a></li>
                    <?php } ?>
                </ul>
                </div>
            </div>
            <div class="banner">
                <a href="<?= BASE_URL . "?url=ruouvang" ?>"><img src="<?= BASE_UPLOAD . "banner/banner.jpg" ?>" alt=""></a>
            </div>
        </div>
</body>
</html>
