<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .btn {
            width: 100%;
            padding: 10px;
            background-color: #5cb85c;
            border: none;
            border-radius: 4px;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #4cae4c;
        }
        .alert {
            background-color: #f2dede;
            color: #a94442;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ebccd1;
            border-radius: 4px;
        }
        p {
            text-align: center;
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Register</h2>
        <?php if (isset($error)): ?>
            <div class="alert"><?php echo $error; ?></div>
        <?php endif; ?>
        <form action="index.php?url=register" method="post">
            <div class="form-group">
                <label for="ten_dang_nhap">Usename:</label>
                <input type="text" class="form-control" id="ten_dang_nhap" name="ten_dang_nhap" required>
            </div>
            <div class="form-group">
                <label for="mat_khau">Password:</label>
                <input type="password" class="form-control" id="mat_khau" name="mat_khau" required>
            </div>
            <div class="form-group">
                <label for="confirm_mat_khau">Confirm mat_khau:</label>
                <input type="password" class="form-control" id="confirm_mat_khau" name="confirm_mat_khau" required>
            </div>
            <button type="submit" class="btn">Register</button>
        </form>
        <p>Already have an account? <a href="index.php?url=login">Login here</a>.</p>
    </div>
</body>
</html>
