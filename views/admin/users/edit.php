<?php require_once 'views/admin/layouts/header.php'; ?>

<h1>Sửa thông tin người dùng</h1>
<form action="?url=admin/users/update/<?= $user['id'] ?>" method="POST">
    <div class="form-group">
        <label for="ten_dang_nhap">Tên đăng nhập:</label>
        <input type="text" id="ten_dang_nhap" name="ten_dang_nhap" class="form-control" value="<?= $user['ten_dang_nhap'] ?>" required>
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" class="form-control" value="<?= $user['email'] ?>" required>
    </div>
    <div class="form-group">
        <label for="sdt">Số điện thoại:</label>
        <input type="text" id="sdt" name="sdt" class="form-control" value="<?= $user['sdt'] ?>">
    </div>
    <div class="form-group">
        <label for="dia_chi">Địa chỉ:</label>
        <input type="text" id="dia_chi" name="dia_chi" class="form-control" value="<?= $user['dia_chi'] ?>">
    </div>
    <div class="form-group">
        <label for="vai_tro">Vai trò:</label>
        <select id="vai_tro" name="vai_tro" class="form-control">
            <option value="user" <?= $user['vai_tro'] == 'user' ? 'selected' : '' ?>>User</option>
            <option value="admin" <?= $user['vai_tro'] == 'admin' ? 'selected' : '' ?>>Admin</option>
        </select>
    </div>
    <button type="submit" class="btn">Cập nhật</button>
</form>
