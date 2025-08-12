<?php require_once 'views/admin/layouts/header.php'; ?>

<h2>Quản lý Hãng Rượu</h2>
<a href="?url=admin/hang-ruou/create" class="btn">Thêm mới</a>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên hãng</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($hang_ruou as $hang): ?>
        <tr>
            <td><?= $hang['id'] ?></td>
            <td><?= htmlspecialchars($hang['ten_hang']) ?></td>
            <td>
                <a href="?url=admin/hang-ruou/edit/<?= $hang['id'] ?>" class="btn">Sửa</a>
                <a href="?url=admin/hang-ruou/delete/<?= $hang['id'] ?>" class="btn" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require_once 'views/admin/layouts/footer.php'; ?>
