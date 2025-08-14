<?php require_once 'views/admin/layouts/header.php'; ?>

<h1>Danh sách người dùng</h1>
<a href="?url=admin/users/create" class="btn">Thêm người dùng mới</a>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên đăng nhập</th>
            <th>Email</th>
            <th>Số điện thoại</th>
            <th>Địa chỉ</th>
            <th>Vai trò</th>
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
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
