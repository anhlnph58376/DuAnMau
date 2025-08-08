<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa người dùng</title>
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
        <h1>Sửa thông tin người dùng</h1>
        <form action="?url=admin/users/update&id=<?= $user['id'] ?>" method="POST">
            <label for="ten_dang_nhap">Tên đăng nhập:</label>
            <input type="text" id="ten_dang_nhap" name="ten_dang_nhap" value="<?= $user['ten_dang_nhap'] ?>" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?= $user['email'] ?>" required>

            <label for="sdt">Số điện thoại:</label>
            <input type="text" id="sdt" name="sdt" value="<?= $user['sdt'] ?>">

            <label for="dia_chi">Địa chỉ:</label>
            <input type="text" id="dia_chi" name="dia_chi" value="<?= $user['dia_chi'] ?>">

            <label for="vai_tro">Vai trò:</label>
            <select id="vai_tro" name="vai_tro">
                <option value="user" <?= $user['vai_tro'] == 'user' ? 'selected' : '' ?>>User</option>
                <option value="admin" <?= $user['vai_tro'] == 'admin' ? 'selected' : '' ?>>Admin</option>
            </select>

            <button type="submit" class="btn-success">Cập nhật</button>
        </form>
    </div>
</body>
</html>
