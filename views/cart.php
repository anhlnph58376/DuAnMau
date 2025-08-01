<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 1000px;
            margin: auto;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .table th, .table td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }
        .table th {
            background-color: #f2f2f2;
        }
        .table img {
            vertical-align: middle;
        }
        .btn {
            padding: 5px 10px;
            background-color: #5cb85c;
            border: none;
            border-radius: 4px;
            color: white;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #4cae4c;
        }
        .btn-sm {
            padding: 3px 7px;
            background-color: #d9534f;
            border: none;
            border-radius: 3px;
            color: white;
            text-decoration: none;
        }
        .btn-sm:hover {
            background-color: #c9302c;
        }
        .btn-success {
            padding: 10px 15px;
            background-color: #5cb85c;
            border: none;
            border-radius: 4px;
            color: white;
            text-decoration: none;
        }
        .btn-success:hover {
            background-color: #4cae4c;
        }
        .btn-primary {
            padding: 10px 15px;
            background-color: #337ab7;
            border: none;
            border-radius: 4px;
            color: white;
            text-decoration: none;
        }
        .btn-primary:hover {
            background-color: #286090;
        }
        .text-right {
            text-align: right;
        }
    </style>
</head>
<body>
<?php

// Check if the cart exists and is not empty
if (isset($_SESSION['gio_hang']) && !empty($_SESSION['gio_hang'])) {
    $cart = $_SESSION['gio_hang'];
?>
    <div class="container">
        <h2>Giỏ Hàng</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $total_bill = 0;
                foreach ($cart as $item) {
                    $total_item = $item['price'] * $item['quantity'];
                    $total_bill += $total_item;
                ?>
                    <tr>
                        <td>
                            <img src="<?= BASE_UPLOAD . $item['image'] ?>" alt="<?= $item['name'] ?>" width="50">
                            <?= $item['name'] ?>
                        </td>
                        <td><?= number_format($item['price'], 0) ?> VNĐ</td>
                        <td>
                            <form action="index.php?url=update-cart" method="post" style="display: flex; align-items: center;">
                                <input type="hidden" name="product_id" value="<?= $item['id'] ?>">
                                <input type="number" name="quantity" value="<?= $item['quantity'] ?>" min="1" style="width: 60px; margin-right: 10px;">
                                <button type="submit" class="btn">Update</button>
                            </form>
                        </td>
                        <td><?= number_format($total_item, 0) ?> VNĐ</td>
                        <td>
                            <a href="index.php?url=remove-from-cart&product_id=<?= $item['id'] ?>" class="btn-sm">Remove</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" class="text-right"><strong>Tổng hóa đơn:</strong></td>
                    <td colspan="2"><?= number_format($total_bill, 0) ?> VNĐ</td>
                </tr>
            </tfoot>
        </table>
        <div class="text-right">
            <a href="index.php?url=checkout" class="btn-success">Thanh toán</a>
        </div>
    </div>
<?php
} else {
?>
    <div class="container">
        <h2>Giỏ hàng</h2>
        <p>Chưa có sản phẩm.</p>
        <a href="index.php" class="btn-primary">Tiếp tục mua sắm</a>
    </div>
<?php
}
?>
</body>
</html>
