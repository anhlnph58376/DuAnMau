<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa sản phẩm</title>
    <link rel="stylesheet" href="views/admin/assets/style.css">
</head>
<body>
    <div class="sidebar">
        <h2>Admin</h2>
        <ul>
            <li><a href="?url=admin/products">Quản lý sản phẩm</a></li>
            <li><a href="?url=admin/users">Quản lý tài khoản</a></li>
            <li><a href="?url=admin/comments">Quản lý bình luận</a></li>
            <li><a href="?url=/">Trang chủ</a></li>
            <li><a href="?url=logout">Đăng xuất</a></li>
        </ul>
    </div>
    <div class="main-content">
        <h1>Sửa sản phẩm</h1>
        <form action="?url=admin/products/update&id=<?= $product['id'] ?>" method="POST" enctype="multipart/form-data">
            <label for="ten">Tên sản phẩm:</label>
            <input type="text" id="ten" name="ten" value="<?= $product['ten'] ?>" required>
            <label for="hinh_anh">Hình ảnh:</label>
            <input type="file" id="hinh_anh" name="hinh_anh">
            <img src="uploads/ruouvang/<?= $product['hinh_anh'] ?>" alt="" width="100">
            <label for="mo_ta">Mô tả:</label>
            <textarea id="mo_ta" name="mo_ta" required><?= $product['mo_ta'] ?></textarea>
            <label for="gia">Giá:</label>
            <input type="number" id="gia" name="gia" value="<?= $product['gia'] ?>" required>
            <label for="so_luong_kho">Số lượng kho:</label>
            <input type="number" id="so_luong_kho" name="so_luong_kho" value="<?= $product['so_luong_kho'] ?>" required>
            <label for="nong_do_con">Nồng độ cồn:</label>
            <input type="text" id="nong_do_con" name="nong_do_con" value="<?= $product['nong_do_con'] ?>" required>
            <label for="nam_san_xuat">Năm sản xuất:</label>
            <input type="number" id="nam_san_xuat" name="nam_san_xuat" value="<?= $product['nam_san_xuat'] ?>" required>
            <label for="hien_thi">Hiển thị:</label>
            <input type="checkbox" id="hien_thi" name="hien_thi" value="1" <?= $product['hien_thi'] ? 'checked' : '' ?>>
            <label for="loai_id">Loại:</label>
            <input type="number" id="loai_id" name="loai_id" value="<?= $product['loai_id'] ?>" required>
            <label for="quoc_gia_id">Quốc gia:</label>
            <input type="number" id="quoc_gia_id" name="quoc_gia_id" value="<?= $product['quoc_gia_id'] ?>" required>
            <label for="hang_id">Hãng:</label>
            <input type="number" id="hang_id" name="hang_id" value="<?= $product['hang_id'] ?>" required>
            <button type="submit" class="btn-success">Cập nhật</button>
        </form>
    </div>
</body>
</html>
