<?php
session_start();
include 'config.php';

$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['admin'] = $username;
        header("Location: admin_dashboard.php");
        exit();
    } else {
        $error_message = "❌ Invalid Username or Password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>

    <!-- Bootstrap Icons CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            text-decoration: none;
        }

        body {
            background-color: #f5f5f5;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .login-form {
            width: 500px;
            background-color: white;
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.2);
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .login-form h2 {
            text-align: center;
            background-color:rgb(232, 224, 67);
            padding: 12px 0px;
            color: black;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }

        .login-form form {
            padding: 30px 60px;
        }

        .login-form form .input-field {
            display: flex;
            flex-direction: row;
            margin: 10px 0px;
        }

        .login-form form .input-field i {
            color: #4a4a4a;
            padding: 10px 14px;
            background-color: #f5f5f5;
            margin-right: 4px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .login-form form .input-field input {
            background-color: #f5f5f5;
            padding: 10px;
            border: 1px solid #ccc;
            width: 100%;
            border-radius: 5px;
        }

        .login-form form button {
            width: 100%;
            background-color:rgb(232, 224, 67);
            padding: 8px;
            border: none;
            font-size: 16px;
            font-weight: 500;
            color: black;
            margin: 15px 0;
            transition: background-color 0.4s;
            border-radius: 5px;
            cursor: pointer;
        }

        .login-form form button:hover {
            background-color:rgb(14, 13, 13);
            color: white;
        }

        .login-form form .extra {
            font-size: 14px;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }

        .login-form form .extra a:first-child {
            color: #4a4a4a;
        }

        .login-form form .extra a:last-child {
            color: grey;
        }

        .back-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4a4a4a;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin: 20px;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .back-button:hover {
            background-color:rgb(232, 224, 67);
            color: black;
        }

        .error-message {
            color: red;
            text-align: center;
            margin-bottom: 10px;
            font-weight: bold;
        }
    </style>
</head>

<body>

<div class="login-form">

    <a href="index.php" class="back-button">Back to Home</a>

    <h2>Admin Login</h2>

    <?php if (!empty($error_message)) : ?>
        <p class="error-message"><?php echo $error_message; ?></p>
    <?php endif; ?>

    <form method="POST" action="">
        <div class="input-field">
            <i class="bi bi-person-circle"></i>
            <input type="text" name="username" placeholder="Admin Username" required>
        </div>

        <div class="input-field">
            <i class="bi bi-shield-lock"></i>
            <input type="password" name="password" placeholder="Password" required>
        </div>

        <button type="submit">Sign In</button>

        

    </form>
</div>

</body>
</html>
