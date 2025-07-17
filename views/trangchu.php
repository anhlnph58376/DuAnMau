<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    </div>

    <!-- Menu điều hướng -->
    <nav>
        <button>Trang chủ</button>
        <button>Rượu nặng</button>
        <button>Rượu vang</button>
        <button>Giới thiệu</button>
        <button>Tin tức</button>
    </nav>
</header>
<main>
    <!-- Tiêu đề -->
    <h2>Rượu Vang</h2>
    <section>
        <table border="1">
        <tr>
            <th>Id</th>
            <th>Tên rượu</th>
            <th>Giá</th>
            <th>Hình ảnh</th>
            <th>Số lượng</th>
            <th>Mô tả</th>
            <th>Action</th>
        </tr>
        <?php foreach ($ruouvangList as $ruouvang): ?>
            <tr>
                <td><?= $ruouvang['id'] ?></td>
                <td><?= $ruouvang['ten']?></td>
                <td><?=$ruouvang['gia'] ?></td>
                <td><img src="<?= $ruouvang['anh'] ?>" alt="" width="50"></td>
                <td><?= $ruouvang['soluong'] ?></td>
                <td><?= $ruouvang['chitiet'] ?></td>
                <td><button>Thêm vào giỏ</button></td>
            </tr>
        <?php endforeach; ?>
        </table>
    </section>

    <!-- Tiêu đề phụ -->
    <h3>Rượu vang bán chạy</h3>

    <!-- Grid sản phẩm bán chạy -->
    <section>
    </section>

    <!-- Rượu Vang Các Nước -->
    <h3>Rượu Vang Các Nước</h3>
<section>
</section>

<!-- Rượu Mạnh -->
    <h3>Rượu Mạnh</h3>
<section>
</section>

<!-- Rượu mạnh bán chạy -->
    <h3>Rượu mạnh bán chạy</h3>
<section>
    
</section>


    <!-- Nút xem thêm -->
    <div>
        <button>Xem thêm sản phẩm</button>
    </div>

    <!-- Tin tức -->
    <h3>Tin tức</h3>
<section>
</section>

<!-- Dịch vụ -->
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