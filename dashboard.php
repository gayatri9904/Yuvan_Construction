<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: ../php/login.php");
    exit();
}
include '../database/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../assets/css/style.css"> <!-- Add your CSS file -->
</head>
<body>

    <h2>Admin Dashboard</h2>

    <!-- Logout Button -->
    <a href="pages/admin//logout.php" style="background: red; color: white; padding: 10px; text-decoration: none;">Logout</a>

    <h3>Manage Projects</h3>
    <a href="pages/admin/add_project.php">Add Project</a>
    
    <table border="1">
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
        <?php
        $query = "SELECT * FROM projects";
        $result = $conn->query($query);
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['title']}</td>
                    <td>{$row['description']}</td>
                    <td><img src='{$row['image_url']}' width='100'></td>
                    <td>
                        <a href='pages/admin//delete_project.php?id={$row['id']}'>Delete</a>
                    </td>
                </tr>";
        }
        ?>
    </table>

</body>
</html>
