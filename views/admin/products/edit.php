<?php require_once 'views/admin/layouts/header.php'; ?>

<h1>Sửa sản phẩm</h1>
<form action="?url=admin/products/update/<?= $product['id'] ?>" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="ten">Tên sản phẩm:</label>
        <input type="text" id="ten" name="ten" class="form-control" value="<?= $product['ten'] ?>" required>
    </div>
    <div class="form-group">
        <label for="mo_ta">Mô tả:</label>
        <textarea id="mo_ta" name="mo_ta" class="form-control" required><?= $product['mo_ta'] ?></textarea>
    </div>
    <div class="form-group">
        <label for="hinh_anh">Hình ảnh:</label>
        <input type="file" id="hinh_anh" name="hinh_anh" class="form-control">
        <?php if ($product['hinh_anh']): ?>
            <img src="<?=BASE_UPLOAD . $product['hinh_anh'] ?>" alt="<?= $product['ten'] ?>" width="100">
        <?php endif; ?>
    </div>
    <div class="form-group">
        <label for="gia">Giá:</label>
        <input type="number" id="gia" name="gia" class="form-control" value="<?= $product['gia'] ?>" required>
    </div>
    <div class="form-group">
        <label for="so_luong_kho">Số lượng kho:</label>
        <input type="number" id="so_luong_kho" name="so_luong_kho" class="form-control" value="<?= $product['so_luong_kho'] ?>" required>
    </div>
    <div class="form-group">
        <label for="nong_do_con">Nồng độ cồn:</label>
        <input type="text" id="nong_do_con" name="nong_do_con" class="form-control" value="<?= $product['nong_do_con'] ?>" required>
    </div>
    <div class="form-group">
        <label for="nam_san_xuat">Năm sản xuất:</label>
        <input type="number" id="nam_san_xuat" name="nam_san_xuat" class="form-control" value="<?= $product['nam_san_xuat'] ?>" required>
    </div>
    <div class="form-group">
        <label for="hien_thi">Hiển thị:</label>
        <input type="checkbox" id="hien_thi" name="hien_thi" value="1" <?= $product['hien_thi'] ? 'checked' : '' ?>>
    </div>
    <div class="form-group">
        <label for="loai_id">Loại:</label>
        <select id="loai_id" name="loai_id" class="form-control" required>
            <option value="">-- Chọn loại rượu --</option>
            <?php foreach ($loai_ruou as $loai): ?>
                <option value="<?= $loai['id'] ?>" <?= $product['loai_id'] == $loai['id'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($loai['ten_loai']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="quoc_gia_id">Quốc gia:</label>
        <select id="quoc_gia_id" name="quoc_gia_id" class="form-control" required>
            <option value="">-- Chọn quốc gia --</option>
            <?php foreach ($quoc_gia as $quoc): ?>
                <option value="<?= $quoc['id'] ?>" <?= $product['quoc_gia_id'] == $quoc['id'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($quoc['ten_quoc_gia']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="hang_id">Hãng:</label>
        <select id="hang_id" name="hang_id" class="form-control" required>
            <option value="">-- Chọn hãng rượu --</option>
            <?php foreach ($hang_ruou as $hang): ?>
                <option value="<?= $hang['id'] ?>" <?= $product['hang_id'] == $hang['id'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($hang['ten_hang']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <button type="submit" class="btn">Cập nhật</button>
</form>

<?php require_once 'views/admin/layouts/footer.php'; ?>
