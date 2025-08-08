<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm người dùng</title>
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
        <h1>Thêm người dùng mới</h1>
        <form action="?url=admin/users/store" method="POST">
            <label for="ten_dang_nhap">Tên đăng nhập:</label>
            <input type="text" id="ten_dang_nhap" name="ten_dang_nhap" required>

            <label for="mat_khau">Mật khẩu:</label>
            <input type="password" id="mat_khau" name="mat_khau" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="sdt">Số điện thoại:</label>
            <input type="text" id="sdt" name="sdt">

            <label for="dia_chi">Địa chỉ:</label>
            <input type="text" id="dia_chi" name="dia_chi">

            <label for="vai_tro">Vai trò:</label>
            <select id="vai_tro" name="vai_tro">
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>

            <button type="submit" class="btn-success">Thêm</button>
        </form>
    </div>
</body>
</html>
