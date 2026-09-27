<?php
session_start();

if (!isset($_SESSION["admin_logged_in"]) || $_SESSION["admin_logged_in"] !== true) {
    header("Location: admin_login.php");
    exit();
}

include "config/database.php";

if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    $sql = "INSERT INTO products (name, description, price, quantity)
            VALUES ('$name', '$description', '$price', '$quantity')";

    if (mysqli_query($conn, $sql)) {
        echo "Product added successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html>
<head>

    <title>Add Product - Huskhaeema's Gift Gallery</title>

    <link rel="stylesheet" href="css/style.css">

</head>

<body>

<header>

    <h1>HUSKHAEEMA'S GIFT GALLERY</h1>

    <p>Add a New Gift Product</p>

</header>

<div class="container">

    <h2>Add Product</h2>

    <form method="POST">

        <label>Gift Name:</label><br>
        <input type="text" name="name" required>

        <br><br>

        <label>Description:</label><br>
        <textarea name="description" required></textarea>

        <br><br>

        <label>Price:</label><br>
        <input type="number" name="price" step="0.01" required>

        <br><br>

        <label>Quantity:</label><br>
        <input type="number" name="quantity" required>

        <br><br>

        <button type="submit" name="submit">
            Add Product
        </button>

    </form>

</div>

</body>
</html>