<?php require_once 'views/admin/layouts/header.php'; ?>

<h2>Thêm mới Quốc Gia</h2>
<form action="?url=admin/quoc-gia/store" method="POST">
    <div class="form-group">
        <label for="ten_quoc_gia">Tên quốc gia:</label>
        <input type="text" id="ten_quoc_gia" name="ten_quoc_gia" class="form-control" required>
    </div>
    <button type="submit" class="btn">Thêm mới</button>
</form>

<?php require_once 'views/admin/layouts/footer.php'; ?>
