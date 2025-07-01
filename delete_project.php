<?php
session_start();
require 'config.php';
require 'vendor/autoload.php'; // Load Cloudinary SDK

use Cloudinary\Configuration\Configuration;
use Cloudinary\Api\Upload\UploadApi;

// Initialize Cloudinary
Configuration::instance([
    'cloud_name' => 'dmi34moiz',
    'api_key' => '326162258732871',
    'api_secret' => '6tzgEN-eGrCG9UqdauEGza-GjwE',
    'secure' => true
]);

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if database connection exists
if (!isset($conn)) {
    die("Database connection failed. Please check config.php.");
}

// Check category from URL
$category = isset($_GET['category']) ? $_GET['category'] : '';

if (empty($category)) {
    die("Invalid category selected.");
}

// Define table names
$table_map = [
    "completed" => "completed_projects",
    "ongoing" => "ongoing_projects",
    "upcoming" => "upcoming_projects"
];

if (!array_key_exists($category, $table_map)) {
    die("Invalid category.");
}

$table_name = $table_map[$category];

// Ensure table exists
$query = "SHOW TABLES LIKE '$table_name'";
$result = $conn->query($query);
if ($result->num_rows == 0) {
    die("Error: Table '$table_name' does not exist.");
}

// Handle delete request
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    $project_id = $_POST['project_id'];

    // Get image URLs before deleting the record
    $query = "SELECT image_url FROM $table_name WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $project_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row) {
        $image_urls = explode(',', $row['image_url']); // Handle multiple images

        // Delete each image from Cloudinary
        $uploadApi = new UploadApi();
        foreach ($image_urls as $image_url) {
            $public_id = pathinfo(parse_url($image_url, PHP_URL_PATH), PATHINFO_FILENAME);
            try {
                $uploadApi->destroy($public_id, ['invalidate' => true]);
            } catch (Exception $e) {
                $_SESSION['error'] = "Cloudinary Deletion Error: " . $e->getMessage();
            }
        }
    }

    // Delete from Database
    $query = "DELETE FROM $table_name WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $project_id);
    if ($stmt->execute()) {
        $_SESSION['message'] = "Project deleted successfully!";
    } else {
        $_SESSION['error'] = "Database error: Unable to delete project.";
    }
    $stmt->close();

    header("Location: delete_project.php?category=$category");
    exit();
}

// Fetch projects
$query = "SELECT * FROM $table_name ORDER BY created_at DESC";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Project - <?php echo ucfirst($category); ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        body {
            background: #121212;
            color: white;
        }
        .container {
            margin-top: 40px;
        }
        .card {
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
            background: #1e1e1e;
            color: white;
            cursor: pointer;
        }
        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(255, 215, 0, 0.5);
        }
        .btn-danger {
            background: red;
            border: none;
        }
        .btn-danger:hover {
            background: darkred;
        }
        .fade-in {
            animation: fadeIn 1s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
    </style>

</head>
<body>

<div class="container">
    <h2 class="text-center fade-in">Delete Project - <?php echo ucfirst($category); ?></h2>
    <a href="admin_dashboard.php" class="btn btn-secondary mb-3">Back</a>

    <!-- Display Messages -->
    <?php if (isset($_SESSION['message'])): ?>
        <div class="alert alert-success"><?= $_SESSION['message']; unset($_SESSION['message']); ?></div>
    <?php endif; ?>

    <?php if (isset($_SESSION['error'])): ?>
        <div class="alert alert-danger"><?= $_SESSION['error']; unset($_SESSION['error']); ?></div>
    <?php endif; ?>

    <div class="row fade-in">
        <?php while ($row = $result->fetch_assoc()) { ?>
            <div class="col-md-4">
                <div class="card mb-4" data-bs-toggle="modal" data-bs-target="#projectModal<?= $row['id'] ?>">
                    <img src="<?= explode(',', $row['image_url'])[0]; ?>" class="d-block w-100" alt="Project Image" style="height: 250px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($row['client_name']); ?></h5>
                        <p><strong>Area:</strong> <?= htmlspecialchars($row['area']); ?></p>
                
                        <p><strong>Location:</strong> <?= htmlspecialchars($row['location']); ?></p>
                        <form action="" method="POST">
                            <input type="hidden" name="project_id" value="<?= $row['id']; ?>">
                            <button type="submit" name="delete" class="btn btn-danger w-100" onclick="return confirm('Are you sure you want to delete this project?');">Delete</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal for Viewing Project Images -->
            <div class="modal fade" id="projectModal<?= $row['id'] ?>" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"><?= htmlspecialchars($row['client_name']); ?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <div id="carousel<?= $row['id'] ?>" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <?php 
                                    $image_urls = explode(',', $row['image_url']);
                                    foreach ($image_urls as $index => $img_url): ?>
                                        <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                                            <img src="<?= htmlspecialchars(trim($img_url)); ?>" class="d-block w-100">
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carousel<?= $row['id'] ?>" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon"></span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carousel<?= $row['id'] ?>" data-bs-slide="next">
                                    <span class="carousel-control-next-icon"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php } ?>
    </div>
</div>

</body>
</html>
