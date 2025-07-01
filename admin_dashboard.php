<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location:  ../php/login.php"); // Redirect to login page if not logged in
    exit();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background: url('https://res.cloudinary.com/dmi34moiz/image/upload/v1746021319/logo_p8kfu7.jpg') no-repeat center center fixed;
            background-size: cover;
            color: gold;
            position: relative;
        }

        /* Overlay to make text more readable */
        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6); /* Dark overlay */
            z-index: -1;
        }
        .dropdown-menu {
            background-color: black;
        }
        .dropdown-menu .dropdown-item {
            color: white !important;
            transition: all 0.3s ease-in-out;
        }
        .dropdown-menu .dropdown-item:hover {
            background-color: gold !important;
            color: black !important;
            transform: scale(1.1);
        }
        .dashboard-btn {
            background-color: gold;
            border: 2px solid black;
            color: black;
            font-weight: bold;
            transition: all 0.3s ease-in-out;
        }
        .dashboard-btn:hover {
            background-color: black;
            color: gold;
        }
    </style>
</head>
<body>
    <div class="container text-center mt-5 dashboard-container">
        <h2>Admin Dashboard</h2>
        <p>Welcome, Admin! Choose an option below:</p>

        <!-- Add Projects Dropdown -->
        <div class="dropdown d-grid gap-3 col-6 mx-auto">
            <button class="btn dashboard-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Add Projects
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="completed.php">Completed Projects</a></li>
                <li><a class="dropdown-item" href="ongoing.php">Ongoing Projects</a></li>
                <li><a class="dropdown-item" href="upcoming.php">Upcoming Projects</a></li>
            </ul>
        </div>

        <!-- Remove Projects Dropdown -->
        <div class="dropdown d-grid gap-3 col-6 mx-auto mt-3">
            <button class="btn dashboard-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Remove Projects
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="delete_project.php?category=completed">Completed Projects</a></li>
                <li><a class="dropdown-item" href="delete_project.php?category=ongoing">Ongoing Projects</a></li>
                <li><a class="dropdown-item" href="delete_project.php?category=upcoming">Upcoming Projects</a></li>
            </ul>
        </div>

        <!-- Logout -->
        <a href="logout.php" class="btn btn-secondary mt-3">Logout</a>
    </div>

    <!-- Bootstrap JS for dropdown -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
