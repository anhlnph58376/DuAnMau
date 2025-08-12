<?php require_once 'views/admin/layouts/header.php'; ?>

<h1>Danh sách sản phẩm</h1>
<a href="?url=admin/products/create" class="btn">Thêm sản phẩm mới</a>
<table>
    <tr>
        <th>ID</th>
        <th>Tên sản phẩm</th>
        <th>Ảnh</th>
        <th>Giá</th>
        <th>Số lượng</th>
        <th>Mô tả</th>
        <th>Nồng độ cồn</th>
        <th>Năm sản xuất</th>
        <th>Loại rượu</th>
        <th>Quốc gia</th>
        <th>Hãng</th>
        <th>Hành động</th>
    </tr>
    <?php foreach ($products as $product): ?>
    <tr>
        <td><?= $product['id'] ?></td>
        <td><?= $product['ten'] ?></td>
        <td><img src="<?=BASE_UPLOAD . $product['hinh_anh'] ?>" alt="" width="100"></td>
        <td><?= number_format($product['gia']) ?> VNĐ</td>
        <td><?= $product['so_luong_kho'] ?></td>
        <td><?= $product['mo_ta'] ?></td>
        <td><?= $product['nong_do_con'] ?></td>
        <td><?= $product['nam_san_xuat'] ?></td>
        <td><?= $product['ten_loai'] ?? 'N/A' ?></td>
        <td><?= $product['ten_quoc_gia'] ?? 'N/A' ?></td>
        <td><?= $product['ten_hang'] ?? 'N/A' ?></td>
        <td>
            <a href="?url=admin/products/edit/<?= $product['id'] ?>" class="btn">Sửa</a>
            <a href="?url=admin/products/delete/<?= $product['id'] ?>" class="btn" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<?php require_once 'views/admin/layouts/footer.php'; ?>
