<?php require_once 'views/admin/layouts/header.php'; ?>

<h2>Thêm mới Loại Rượu</h2>
<form action="?url=admin/loai-ruou/store" method="POST">
    <div class="form-group">
        <label for="ten_loai">Tên loại:</label>
        <input type="text" id="ten_loai" name="ten_loai" class="form-control" required>
    </div>
    <button type="submit" class="btn">Thêm mới</button>
</form>

<?php require_once 'views/admin/layouts/footer.php'; ?>
