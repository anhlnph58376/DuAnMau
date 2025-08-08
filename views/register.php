<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <link rel="stylesheet" href="views/assets/style.css">
</head>
<body>
    <div class="container">
        <h2>Đăng ký tài khoản</h2>
        <?php if (isset($error)): ?>
            <div class="alert"><?php echo $error; ?></div>
        <?php endif; ?>
        <form action="index.php?url=register-handle" method="post">
            <div class="form-group">
                <label for="ten_dang_nhap">Tên đăng nhập:</label>
                <input type="text" class="form-control" id="ten_dang_nhap" name="ten_dang_nhap" required>
            </div>
            <div class="form-group">
                <label for="mat_khau">Mật khẩu:</label>
                <input type="password" class="form-control" id="mat_khau" name="mat_khau" required>
            </div>
            <div class="form-group">
                <label for="confirm_mat_khau">Xác nhận mật khẩu:</label>
                <input type="password" class="form-control" id="confirm_mat_khau" name="confirm_mat_khau" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="sdt">Số điện thoại:</label>
                <input type="text" class="form-control" id="sdt" name="sdt">
            </div>
            <div class="form-group">
                <label for="dia_chi">Địa chỉ:</label>
                <input type="text" class="form-control" id="dia_chi" name="dia_chi">
            </div>
            <button type="submit" class="btn">Đăng ký</button>
        </form>
        <p>Bạn đã có tài khoản? <a href="index.php?url=login">Đăng nhập tại đây</a>.</p>
    </div>
</body>
</html>
