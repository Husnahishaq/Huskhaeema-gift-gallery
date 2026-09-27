<?php
session_start();

if (!isset($_SESSION["admin_logged_in"]) || $_SESSION["admin_logged_in"] !== true) {
    header("Location: admin_login.php");
    exit();
}

include "config/database.php";

$sql = "SELECT * FROM orders ORDER BY order_date DESC";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>

    <title>Order List - Huskhaeema's Gift Gallery</title>

    <link rel="stylesheet" href="css/style.css">

</head>

<body>

<div class="container">

    <h1>Customer Orders</h1>

    <table border="1" cellpadding="10" cellspacing="0">

        <tr>

            <th>ID</th>
            <th>Customer Name</th>
            <th>Phone</th>
            <th>Gift Name</th>
            <th>Quantity</th>
            <th>Total Price</th>
            <th>Delivery Address</th>
            <th>Order Date</th>

        </tr>

        <?php while ($row = mysqli_fetch_assoc($result)): ?>

        <tr>

            <td><?php echo $row['id']; ?></td>

            <td><?php echo $row['customer_name']; ?></td>

            <td><?php echo $row['phone']; ?></td>

            <td><?php echo $row['gift_name']; ?></td>

            <td><?php echo $row['quantity']; ?></td>

            <td>
                ₦<?php echo number_format($row['total_price'], 2); ?>
            </td>

            <td><?php echo $row['delivery_address']; ?></td>

            <td><?php echo $row['order_date']; ?></td>

        </tr>

        <?php endwhile; ?>

    </table>

</div>

</body>
</html>