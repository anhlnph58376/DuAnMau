<?php require_once 'views/admin/layouts/header.php'; ?>

<h2>Chỉnh sửa Quốc Gia</h2>
<form action="?url=admin/quoc-gia/update/<?= $quoc['id'] ?>" method="POST">
    <div class="form-group">
        <label for="ten_quoc_gia">Tên quốc gia:</label>
        <input type="text" id="ten_quoc_gia" name="ten_quoc_gia" class="form-control" value="<?= htmlspecialchars($quoc['ten_quoc_gia']) ?>" required>
    </div>
    <button type="submit" class="btn">Cập nhật</button>
</form>

<?php require_once 'views/admin/layouts/footer.php'; ?>
