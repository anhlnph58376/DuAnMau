<?php require_once 'views/admin/layouts/header.php'; ?>

<h2>Quản lý Quốc Gia</h2>
<a href="?url=admin/quoc-gia/create" class="btn">Thêm mới</a>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên quốc gia</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($quoc_gia as $quoc): ?>
        <tr>
            <td><?= $quoc['id'] ?></td>
            <td><?= htmlspecialchars($quoc['ten_quoc_gia']) ?></td>
            <td>
                <a href="?url=admin/quoc-gia/edit/<?= $quoc['id'] ?>" class="btn">Sửa</a>
                <a href="?url=admin/quoc-gia/delete/<?= $quoc['id'] ?>" class="btn" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require_once 'views/admin/layouts/footer.php'; ?>
