
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sản phẩm</title>
    <link rel="stylesheet" href="./views/admin/assets/style.css">
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <h2>Admin</h2>
            <ul>
                <li><a href="?url=admin">Trang chủ</a></li>
                <li><a href="?url=admin/products">Quản lý sản phẩm</a></li>
                <li><a href="#">Quản lý danh mục</a></li>
                <li><a href="#">Quản lý tài khoản</a></li>
                <li><a href="#">Quản lý bình luận</a></li>
                <li><a href="?url=logout">Đăng xuất</a></li>
            </ul>
        </div>
        <div class="main-content">
            <h1>Danh sách sản phẩm</h1>
            <a href="?url=admin/products/create">Thêm sản phẩm mới</a>
            <table>
        <tr>
            <th>ID</th>
            <th>Tên sản phẩm</th>
            <th>Mô tả</th>
            <th>Giá</th>
            <th>Số lượng kho</th>
            <th>Nồng độ cồn</th>
            <th>Năm sản xuất</th>
            <th>Hiển thị</th>
            <th>Loại</th>
            <th>Quốc gia</th>
            <th>Hãng</th>
            <th>Hành động</th>
        </tr>
        <?php foreach ($products as $product): ?>
        <tr>
            <td><?= $product['id'] ?></td>
            <td><?= $product['ten'] ?></td>
            <td><?= $product['mo_ta'] ?></td>
            <td><?= $product['gia'] ?></td>
            <td><?= $product['so_luong_kho'] ?></td>
            <td><?= $product['nong_do_con'] ?></td>
            <td><?= $product['nam_san_xuat'] ?></td>
            <td><?= $product['hien_thi'] ?></td>
            <td><?= $product['ten_loai'] ?></td>
            <td><?= $product['ten_quoc_gia'] ?></td>
            <td><?= $product['ten_hang'] ?></td>
            <td>
                <a href="?url=admin/products/edit&id=<?= $product['id'] ?>">Sửa</a>
                <a href="?url=admin/products/delete&id=<?= $product['id'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
        </div>
    </div>
</body>
</html>
