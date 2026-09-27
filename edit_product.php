<?php
session_start();

if (!isset($_SESSION["admin_logged_in"]) || $_SESSION["admin_logged_in"] !== true) {
    header("Location: admin_login.php");
    exit();
}

include "config/database.php";
if (!isset($_GET['id']) && !isset($_POST['id'])) {
    die("Product ID is missing.");
}

$id = $_GET['id'] ?? $_POST['id'] ;

/* Get the product from the database */
$sql = "SELECT * FROM products WHERE Id = $id";
$result = mysqli_query($conn, $sql);
if (!$result) {
    die("Error: " . mysqli_error($conn));
}

$product = mysqli_fetch_assoc($result);
if (!$product) {
    die("Product not found.");
}


/* Update the product */
if (isset($_POST['update'])) {
$id = $_POST['id'] ?? $_GET['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    $sql = "UPDATE products SET
            Name = '$name',
            Description = '$description',
            Price = '$price',
            Quantity = '$quantity'
            WHERE id = $id";

    if (mysqli_query($conn, $sql)) {

        echo "Product updated successfully!";

        header("refresh:2;url=index.php");

    } else {

        echo "Error: " . mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Edit Product - Huskhaeema's Gift Gallery</title>

    <link rel="stylesheet" href="css/style.css">

</head>

<body>

<header>

    <h1>HUSKHAEEMA'S GIFT GALLERY</h1>

    <p>Edit Gift Product</p>

</header>

<h2>Edit Product</h2>

<form method="POST" enctype="multipart/form-data">

    <input type="hidden" name="id" value="<?php echo $product['Id']; ?>">

    <label>Gift Name:</label><br>
    <input
        type="text"
        name="name"
        value="<?php echo htmlspecialchars($product['Name']); ?>"
        required
    >

    <br><br>

    <label>Description:</label><br>
    <textarea
        name="description"
        required
    ><?php echo htmlspecialchars($product['Description']); ?></textarea>

    <br><br>

    <label>Price:</label><br>
    <input
        type="number"
        name="price"
        step="0.01"
        value="<?php echo $product['Price']; ?>"
        required
    >

    <br><br>

    <label>Quantity:</label><br>
    <input
        type="number"
        name="quantity"
        value="<?php echo $product['Quantity']; ?>"
        required
    >

    <br><br>

    <button type="submit" name="update">
        Update Product
    </button>

</form>  

</div>
<footer>
    <p>&copy; 2026 HUSKHAEEMA'S GIFT GALLERY. All Rights Reserved.</p>
</footer>
</body>

</html>