<?php require_once 'views/admin/layouts/header.php'; ?>

<h2>Quản lý Loại Rượu</h2>
<a href="?url=admin/loai-ruou/create">Thêm mới</a>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên loại</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($loai_ruou as $loai): ?>
        <tr>
            <td><?= $loai['id'] ?></td>
            <td><?= $loai['ten_loai'] ?></td>
            <td>
                <a href="?url=admin/loai-ruou/edit/<?= $loai['id'] ?>">Sửa</a>
                <a href="?url=admin/loai-ruou/delete/<?= $loai['id'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require_once 'views/admin/layouts/footer.php'; ?>
