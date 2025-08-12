<?php require_once 'views/admin/layouts/header.php'; ?>

<h1>Thêm người dùng mới</h1>
<form action="?url=admin/users/store" method="POST">
    <div class="form-group">
        <label for="ten_dang_nhap">Tên đăng nhập:</label>
        <input type="text" id="ten_dang_nhap" name="ten_dang_nhap" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="mat_khau">Mật khẩu:</label>
        <input type="password" id="mat_khau" name="mat_khau" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="sdt">Số điện thoại:</label>
        <input type="text" id="sdt" name="sdt" class="form-control">
    </div>
    <div class="form-group">
        <label for="dia_chi">Địa chỉ:</label>
        <input type="text" id="dia_chi" name="dia_chi" class="form-control">
    </div>
    <div class="form-group">
        <label for="vai_tro">Vai trò:</label>
        <select id="vai_tro" name="vai_tro" class="form-control">
            <option value="user">User</option>
            <option value="admin">Admin</option>
        </select>
    </div>
    <button type="submit" class="btn">Thêm</button>
</form>
