<?php require_once 'views/admin/layouts/header.php'; ?>

<h2>Chỉnh sửa Loại Rượu</h2>
<form action="?url=admin/loai-ruou/update/<?= $loai['id'] ?>" method="POST">
    <div class="form-group">
        <label for="ten_loai">Tên loại:</label>
        <input type="text" id="ten_loai" name="ten_loai" class="form-control" value="<?= htmlspecialchars($loai['ten_loai']) ?>" required>
    </div>
    <button type="submit" class="btn">Cập nhật</button>
</form>

<?php require_once 'views/admin/layouts/footer.php'; ?>
