<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý bình luận</title>
    <link rel="stylesheet" href="views/admin/assets/style.css">
</head>
<body>
    <div class="sidebar">
        <h2>Admin</h2>
        <ul>
            <li><a href="?url=admin/products">Quản lý sản phẩm</a></li>
            <li><a href="?url=admin/users">Quản lý tài khoản</a></li>
            <li><a href="?url=admin/comments">Quản lý bình luận</a></li>
            <li><a href="?url=/">Trang chủ</a></li>
            <li><a href="?url=logout">Đăng xuất</a></li>
        </ul>
    </div>
    <div class="main-content">
        <h1>Danh sách bình luận</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nội dung</th>
                    <th>Người dùng</th>
                    <th>Sản phẩm</th>
                    <th>Ngày bình luận</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($comments as $comment): ?>
                <tr>
                    <td><?= $comment['id'] ?></td>
                    <td><?= $comment['noi_dung'] ?></td>
                    <td><?= $comment['ten_dang_nhap'] ?></td>
                    <td><?= $comment['ten'] ?></td>
                    <td><?= $comment['ngay_binh_luan'] ?></td>
                    <td>
                        <a href="?url=admin/comments/delete/<?= $comment['id'] ?>" class="btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa bình luận này không?')">Xóa</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
