<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Itim&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            height: 100vh;
            background-image: url("views/background/background.jpg");
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
        }

        body::before {
            content: "";
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(5px);
            z-index: -1;
        }

        .header {
            position: fixed;
            top: 0;
            width: 100%;
            height: 60px;
            display: flex;
            align-items: center;
            padding: 0 50px;
            background: transparent;
        }

        .header .nav a {
            text-decoration: none;
            color: #fff;
            font-size: 20px;
            font-weight: 600;
        }

        .header .nav a:hover {
            border-bottom: 3px solid #fff;
            transition: 0.3s;
        }

        .login {
            width: 400px;
            padding: 40px 30px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(15px);
            border-radius: 10px;
        }

        .login h2 {
            text-align: center;
            margin-bottom: 30px;
        }

        .input {
            margin-bottom: 25px;
        }

        .input label {
            display: block;
            margin-bottom: 5px;
            font-size: 16px;
        }

        .input1 {
            width: 100%;
            padding: 8px;
            background: transparent;
            border: none;
            border-bottom: 2px solid #fff;
            color: #fff;
            font-size: 16px;
            outline: none;
        }

        .input1::placeholder {
            color: #ccc;
        }

        .btn {
            width: 100%;
            padding: 10px;
            background: #ff4b2b;
            color: #fff;
            border: none;
            font-size: 18px;
            cursor: pointer;
            border-radius: 5px;
            transition: 0.3s;
        }

        .btn:hover {
            background: #ff3a1a;
        }

        .sign-up {
            text-align: center;
            margin-top: 15px;
            font-size: 14px;
        }

        .sign-up a {
            color: #ff4b2b;
            text-decoration: none;
        }

        .sign-up a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <header class="header">
        <nav class="nav">
            <a href="<?= BASE_URL ?>">Trang chủ</a>
        </nav>
    </header>

    <div class="login">
        <h2>Đăng nhập</h2>
        <?php if (isset($error)): ?>
            <div class="alert"><?php echo $error; ?></div>
        <?php endif; ?>
        <form action="index.php?url=login-handle" method="post">
            <div class="input">
                <label for="ten_dang_nhap">Tên đăng nhập:</label>
                <input type="text" class="input1" id="ten_dang_nhap" name="ten_dang_nhap" placeholder="Nhập tên..." required>
            </div>
            <div class="input">
                <label for="mat_khau">Mật khẩu:</label>
                <input type="password" class="input1" id="mat_khau" name="mat_khau" placeholder="Nhập mật khẩu..." required>
            </div>
            <button type="submit" class="btn">Đăng nhập</button>
        </form>
        <div class="sign-up">
            <p>Chưa có tài khoản? <a href="index.php?url=register">Đăng ký tại đây</a>.</p>
        </div>
    </div>
</body>
</html>
