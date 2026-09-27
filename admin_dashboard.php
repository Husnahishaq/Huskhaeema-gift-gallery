<?php
session_start();

if (!isset($_SESSION["admin_logged_in"]) || $_SESSION["admin_logged_in"] !== true) {
    header("Location: admin_login.php");
    exit();
}

include "config/database.php";

$product_sql = "SELECT COUNT(*) AS total_products FROM products";
$product_result = mysqli_query($conn, $product_sql);
$product_data = mysqli_fetch_assoc($product_result);

$order_sql = "SELECT COUNT(*) AS total_orders FROM orders";
$order_result = mysqli_query($conn, $order_sql);
$order_data = mysqli_fetch_assoc($order_result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard - Huskhaeema's Gift Gallery</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<div class="container">

    <h1>HUSKHAEEMA'S GIFT GALLERY</h1>

    <h2>Admin Dashboard</h2>

    <p>Welcome to the administration area of the Gift Gallery.</p>

    <hr>

    <h3>Products</h3>

    <p>
        Total Products:
        <strong><?php echo $product_data['total_products']; ?></strong>
    </p>

    <p>
        <a href="add_product.php">Add New Product</a>
    </p>

    <p>
        <a href="index.php">View Gift Gallery</a>
        <a
        href="admin_logout.php">Logout</a>
    </p>

    <hr>

    <h3>Orders</h3>

    <p>
        Total Orders:
        <strong><?php echo $order_data['total_orders']; ?></strong>
    </p>

    <p>
        <a href="order_list.php">View Customer Orders</a>
    </p>

    <hr>

    <p>
        <a href="index.php">Back to Gift Gallery</a>
    </p>

</div>

</body>
</html>