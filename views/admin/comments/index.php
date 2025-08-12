<?php require_once 'views/admin/layouts/header.php'; ?>

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
                <a href="<?= $comment['id'] ?>" class="btn" onclick="return confirm('Bạn có chắc chắn muốn xóa bình luận này không?')">Xóa</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
