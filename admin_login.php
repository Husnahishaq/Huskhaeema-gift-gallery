<?php
session_start();

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"];

    if ($username == "admin" && $password == "12345") {

        $_SESSION["admin_logged_in"] = true;

        header("Location: admin_dashboard.php");
        exit();

    } else {

        $error = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login - Huskhaeema's Gift Gallery</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5e6f7;
            margin: 0;
            padding: 0;
        }

        .login-box {
            width: 350px;
            margin: 100px auto;
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.2);
        }

        h1 {
            text-align: center;
            color: #7b2cbf;
        }

        h2 {
            text-align: center;
        }

        label {
            display: block;
            margin-top: 15px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 12px;
            margin-top: 20px;
            background-color: #7b2cbf;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #5a189a;
        }

        .error {
            color: red;
            text-align: center;
        }
    </style>
</head>

<body>

    <div class="login-box">

        <h1>HUSKHAEEMA'S</h1>
        <h2>Admin Login</h2>

        <?php
        if ($error != "") {
            echo "<p class='error'>$error</p>";
        }
        ?>

        <form method="POST">

            <label>Username:</label>
            <input type="text" name="username" required>

            <label>Password:</label>
            <input type="password" name="password" required>

            <button type="submit">Login</button>

        </form>

    </div>

</body>
</html>