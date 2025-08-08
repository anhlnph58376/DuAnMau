<?php
include_once 'models/ProductModel.php';

function showCart() {
    include 'views/cart.php';
}

function addToCart() {
    if (!isset($_SESSION['user'])) {
        header('Location: ?url=login');
        exit();
    }
    
    if (!isset($_SESSION['gio_hang'])) {
        $_SESSION['gio_hang'] = [];
    }

    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    $productModel = new ProductModel();
    $product = $productModel->getDetail($product_id);

    if ($product) {
        if (isset($_SESSION['gio_hang'][$product_id])) {
            $_SESSION['gio_hang'][$product_id]['quantity'] += $quantity;
        } else {
            $_SESSION['gio_hang'][$product_id] = [
                'id' => $product['id'],
                'name' => $product['ten'],
                'price' => $product['giam_phan_tram'] ? $product['gia'] * (1 - $product['giam_phan_tram'] / 100) : $product['gia'],
                'image' => $product['hinh_anh'],
                'quantity' => $quantity
            ];
        }
    }

    if (isset($_POST['buy_now'])) {
        header('Location: index.php?url=cart');
        exit();
    } else {
        header('Location:' . $_SERVER['HTTP_REFERER']);
        exit();
    }
}

function updateCart() {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    if (isset($_SESSION['gio_hang'][$product_id])) {
        if ($quantity > 0) {
            $_SESSION['gio_hang'][$product_id]['quantity'] = $quantity;
        } else {
            unset($_SESSION['gio_hang'][$product_id]);
        }
    }

    header('Location: index.php?url=cart');
    exit();
}

function removeFromCart() {
    $product_id = $_GET['product_id'];

    if (isset($_SESSION['gio_hang'][$product_id])) {
        unset($_SESSION['gio_hang'][$product_id]);
    }

    header('Location: index.php?url=cart');
    exit();
}
?>
