<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý tài khoản</title>
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
        <h1>Danh sách người dùng</h1>
        <a href="?url=admin/users/create" class="btn btn-success">Thêm người dùng mới</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên đăng nhập</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Địa chỉ</th>
                    <th>Vai trò</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $user['id'] ?></td>
                    <td><?= $user['ten_dang_nhap'] ?></td>
                    <td><?= $user['email'] ?></td>
                    <td><?= $user['sdt'] ?></td>
                    <td><?= $user['dia_chi'] ?></td>
                    <td><?= $user['vai_tro'] ?></td>
                    <td>
                        <a href="?url=admin/users/edit/<?= $user['id'] ?>" class="btn">Sửa</a>
                        <a href="?url=admin/users/delete/<?= $user['id'] ?>" class="btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa người dùng này không?')">Xóa</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
