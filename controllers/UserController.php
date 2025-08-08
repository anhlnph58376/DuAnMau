<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include_once 'models/UserModel.php';

function showLoginForm() {
    include 'views/login.php';
}

function showRegisterForm() {
    include 'views/register.php';
}

function login() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $ten_dang_nhap = $_POST['ten_dang_nhap'];
        $mat_khau = $_POST['mat_khau'];

        $userModel = new UserModel();
        $user = $userModel->checkLogin($ten_dang_nhap, $mat_khau);

        if ($user) {
            $_SESSION['user'] = $user;
            if ($user['vai_tro'] == 'admin') {
                header('Location: ' . BASE_URL . '?url=admin/products');
            } else {
                header('Location: ' . BASE_URL);
            }
        } else {
            // Đăng nhập thất bại, hiển thị thông báo lỗi
            $error = "Tên đăng nhập hoặc mật khẩu không đúng.";
            include 'views/login.php';
        }
    }
}

function register() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $ten_dang_nhap = $_POST['ten_dang_nhap'];
        $mat_khau = $_POST['mat_khau'];
        $confirm_mat_khau = $_POST['confirm_mat_khau'];
        $email = $_POST['email'];
        $sdt = $_POST['sdt'];
        $dia_chi = $_POST['dia_chi'];

        if ($mat_khau !== $confirm_mat_khau) {
            $error = "Mật khẩu không khớp.";
            include 'views/register.php';
            return;
        }

        $userModel = new UserModel();
        $success = $userModel->register($ten_dang_nhap, $mat_khau, $email, $sdt, $dia_chi);

        if ($success) {
            header('Location: index.php?url=login');
        } else {
            $error = "Tên đăng nhập hoặc email đã tồn tại.";
            include 'views/register.php';
        }
    }
}

function logout() {
    session_destroy();
    header('Location: index.php');
}
?>
