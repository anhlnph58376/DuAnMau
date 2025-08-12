<?php require_once 'views/admin/layouts/header.php'; ?>

<h2>Thêm mới Hãng Rượu</h2>
<form action="?url=admin/hang-ruou/store" method="POST">
    <div class="form-group">
        <label for="ten_hang">Tên hãng:</label>
        <input type="text" id="ten_hang" name="ten_hang" class="form-control" required>
    </div>
    <button type="submit" class="btn">Thêm mới</button>
</form>

<?php require_once 'views/admin/layouts/footer.php'; ?>
