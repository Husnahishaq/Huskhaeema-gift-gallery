<?php
include 'config/database.php';

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $customer_name = mysqli_real_escape_string($conn, $_POST['customer_name']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $gift_name = mysqli_real_escape_string($conn, $_POST['gift_name']);
    $quantity = intval($_POST['quantity']);
    $delivery_address = mysqli_real_escape_string($conn, $_POST['delivery_address']);

    $total_price = 0;

    $sql = "INSERT INTO orders
            (customer_name, phone, gift_name, quantity, delivery_address, total_price)
            VALUES
            ('$customer_name', '$phone', '$gift_name', '$quantity', '$delivery_address', '$total_price')";

    if (mysqli_query($conn, $sql)) {
        $message = "Order placed successfully!";
    } else {
        $message = "Error placing order: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>

    <title>Order a Gift - Huskhaeema's Gift Gallery</title>

    <link rel="stylesheet" href="css/style.css">

</head>

<body>

<div class="container">

    <h1>Order a Gift</h1>

    <?php if ($message != ""): ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>

    <form method="POST">

        <label>Customer Name:</label><br>
        <input type="text" name="customer_name" required>

        <br><br>

        <label>Phone Number:</label><br>
        <input type="text" name="phone" required>

        <br><br>

        <label>Gift Name:</label><br>
        <input type="text" name="gift_name" placeholder="Enter the gift you want" required>

        <br><br>

        <label>Quantity:</label><br>
        <input type="number" name="quantity" min="1" value="1" required>

        <br><br>

        <label>Delivery Address:</label><br>
        <textarea name="delivery_address" required></textarea>

        <br><br>

        <button type="submit">Place Order</button>

    </form>

</div>

</body>
</html>