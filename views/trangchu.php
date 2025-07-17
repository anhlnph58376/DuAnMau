<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

body {
    background-color: #f8f8f8;
}

header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #fff;
    padding: 10px 20px;
    border-bottom: 1px solid #ddd;
    flex-wrap: wrap;
}

header img {
    width: 50px;
    height: 50px;
    object-fit: cover;
}

header input[type="text"] {
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 5px;
    width: 250px;
    margin-right: 8px;
}

header button {
    padding: 8px 12px;
    border: none;
    background-color: #e74c3c;
    color: white;
    border-radius: 4px;
    cursor: pointer;
    margin-left: 5px;
}

nav {
    width: 100%;
    background-color: #ddd;
    display: flex;
    justify-content: center;
    gap: 10px;
    padding: 10px;
}

nav button {
    padding: 8px 15px;
    border: none;
    background-color: #999;
    color: white;
    border-radius: 4px;
    cursor: pointer;
}

nav button:hover {
    background-color: #666;
}

.banner {
    width: 100%;
    max-height: 400px;
    overflow: hidden;
    margin-top: 10px;
}

.banner img {
    width: 100%;
    height: auto;
    display: block;
    object-fit: cover;
    border-radius: 10px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.2);
}

main {
    padding: 20px;
}

h2, h3 {
    text-align: center;
    margin: 20px 0;
    color: #333;
    position: relative;
}

h2::before, h2::after,
h3::before, h3::after {
    content: '';
    display: inline-block;
    width: 80px;
    height: 2px;
    background-color: #ccc;
    margin: 0 10px;
    vertical-align: middle;
}

section {
    margin-bottom: 30px;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 20px;
}

section li {
    list-style: none;
    background-color: white;
    border-radius: 8px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    padding: 15px;
    text-align: center;
}

section img {
    width: 100%;
    height: 300px;
    object-fit: cover;
    margin-bottom: 10px;
    border-radius: 4px;
}

section ul {
    margin-bottom: 5px;
}

section a {
    margin: 0 5px;
    text-decoration: none;
    font-weight: bold;
    color: #3498db;
}

section a:hover {
    color: #e74c3c;
}

footer {
    background-color: #2c3e50;
    color: white;
    padding: 20px 0;
    text-align: center;
    margin-top: 30px;
}

footer ul {
    list-style: none;
    display: flex;
    justify-content: center;
    gap: 30px;
}
    </style>
</head>
<body>
    <header>
    <!-- Logo -->
    <div>
        <img src="logo.png" alt="Logo" width="50" height="50">
    </div>
    <!-- Thanh tìm kiếm -->
    <div>
        <input type="text" placeholder="Thanh tìm kiếm">
        <button>Tìm kiếm</button>
    </div>

    <!-- Biểu tượng kính lúp và đăng nhập, giỏ hàng -->
    <div>
        <button>Đăng nhập</button>
        <button>Đăng ký</button>
    </div>

    <!-- Menu điều hướng -->
    <nav>
        <button>Trang chủ</button>
        <button>Rượu nặng</button>
        <button>Rượu vang</button>
        <button>Giới thiệu</button>
        <button>Tin tức</button>
    </nav>
    <div class="banner">
        <img src="<?= BASE_UPLOAD . 'banner/banner.jpg' ?>" alt="">
    </div>
</header>
<main>
    <!-- Tiêu đề -->
    <h2>Rượu Vang</h2>
    <section>
        <?php foreach ($ruouvangList as $ruouvang): ?>
            <li>
                <ul><img src="<?= BASE_UPLOAD . $ruouvang['anh'] ?>" alt="" width=""></ul>
                <ul><a href=""><?= $ruouvang['ten']?></a></ul>
                <ul><p><?=$ruouvang['gia'] ?> VNĐ</p></ul>
                <ul><p>Số lượng: <?= $ruouvang['soluong'] ?></p></ul>
                <ul>
                    <a href="">Thêm</a>
                    <a href="">Sửa</a>
                    <a href="">Xóa</a>
                </ul>
            </li>
        <?php endforeach; ?>
    </section>
    <!-- Rượu Vang Các Nước -->
    <h3>Rượu Vang Các Nước</h3>
<section>
    <?php foreach ($ruoucacnuocList as $ruoucacnuoc): ?>
        <li>
            <ul><img src="<?= BASE_UPLOAD . $ruoucacnuoc['anh'] ?>" alt="" width=""></ul>
            <ul><a href=""><?= $ruoucacnuoc['ten']?></a></ul>
            <ul><p><?=$ruoucacnuoc['gia'] ?> VNĐ</p></ul>
            <ul>Số lượng: <?= $ruoucacnuoc['soluong'] ?></ul>
            <ul>
                <a href="">Thêm</a>
                <a href="">Sửa</a>
                <a href="">Xóa</a>
                </ul>
            </li>
    <?php endforeach; ?>
</section>

<!-- Rượu Mạnh -->
    <h3>Rượu Mạnh</h3>
<section>
</section>
</main>
<!-- Footer -->
<footer>
    <ul>
        <li>Chính sách</li>
        <li>Giới thiệu</li>
        <li>Địa chỉ</li>
        <li>Liên hệ</li>
    </ul>
</footer>

</body>
</html>