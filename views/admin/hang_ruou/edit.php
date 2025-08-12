<?php require_once 'views/admin/layouts/header.php'; ?>

<h2>Chỉnh sửa Hãng Rượu</h2>
<form action="?url=admin/hang-ruou/update/<?= $hang['id'] ?>" method="POST">
    <div class="form-group">
        <label for="ten_hang">Tên hãng:</label>
        <input type="text" id="ten_hang" name="ten_hang" class="form-control" value="<?= htmlspecialchars($hang['ten_hang']) ?>" required>
    </div>
    <button type="submit" class="btn">Cập nhật</button>
</form>

<?php require_once 'views/admin/layouts/footer.php'; ?>
