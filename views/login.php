<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="views/assets/style.css">
</head>
<body>
    <div class="container">
        <h2>Đăng nhập</h2>
        <?php if (isset($error)): ?>
            <div class="alert"><?php echo $error; ?></div>
        <?php endif; ?>
        <form action="index.php?url=login-handle" method="post">
            <div class="form-group">
                <label for="ten_dang_nhap">Tên đăng nhập:</label>
                <input type="text" class="form-control" id="ten_dang_nhap" name="ten_dang_nhap" required>
            </div>
            <div class="form-group">
                <label for="mat_khau">Mật khẩu:</label>
                <input type="password" class="form-control" id="mat_khau" name="mat_khau" required>
            </div>
            <button type="submit" class="btn">Đăng nhập</button>
        </form>
        <p>Chưa có tài khoản? <a href="index.php?url=register">Đăng ký tại đây</a>.</p>
    </div>
</body>
</html>
