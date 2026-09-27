<?php

include "config/database.php";

$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Huskhaeema's Gift Gallery</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<header>
    <img src="images/logo.jpg"alt="Huskhaeema's Gift Gallery Logo" class="logo">
    <h1>HUSKHAEEMA'S GIFT GALLERY</h1>
    <nav class="main-nav">
    <a href="index.php">Home</a>
    <a href="index.php">Gift Collections</a>
    <a href="order_gift.php">Order a Gift</a>
    <a href="admin_login.php">Admin</a>
</nav>
    <p>Three Sisters, One Idea, Endless Memories</p>
</header>
<div style="text-align:center; margin: 20px;">
    <a
    href="order_gift.php">Order a Gift</a>
</div>
<div class="container">

    <h2>Our Gift Collections</h2>

    <div class="products">

        <?php while ($row = mysqli_fetch_assoc($result)) { ?>

            <div class="product">
            <img src="Images/<?php echo $row['Image']; ?>"width="200">
                <h3>
                    <?php echo $row['Name']; ?>
                </h3>

                <p>
                    <?php echo $row['Description']; ?>
                </p>

                <p class="price">
                    Price: ₦<?php echo number_format($row['Price'], 2); ?>
                </p>

                <p>
                    Quantity Available:
                    <?php echo $row['Quantity']; ?>
                </p>

                <p>
                    <a href="edit_product.php?id=<?php echo $row['Id']; ?>">Edit</a>
                    <a href="delete_product.php?id=<?php echo $row['Id']; ?>" onclick="return confirm('Are you sure you want to delete this product?')">Delete</a>
</p>
</div>
<?php } ?>
</div>
</div>

<?php  ?>
<footer class="site-footer">
    <p>Huskhaeema's Gift Gallery &copy; 2026</p>
    <p>Three Sisters, One Idea, Endless Memories</p>
</footer>
</body>
</html>