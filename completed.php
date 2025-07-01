<?php
session_start();
require 'config.php';
require 'vendor/autoload.php';

use Cloudinary\Configuration\Configuration;
use Cloudinary\Api\Upload\UploadApi;

// Configure Cloudinary
Configuration::instance([
    'cloud' => [
        'cloud_name' => 'dmi34moiz',
        'api_key'    => '326162258732871',
        'api_secret' => '6tzgEN-eGrCG9UqdauEGza-GjwE'
    ]
]);

// Handle Multiple Image Upload
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['upload_project'])) {
    $client_name = htmlspecialchars($_POST['client_name']);
    $area = htmlspecialchars($_POST['area']);
    $location = htmlspecialchars($_POST['location']);

    if (!empty($_FILES["images"]["tmp_name"][0])) {
        $uploaded_images = [];
        $upload = new UploadApi();

        foreach ($_FILES["images"]["tmp_name"] as $key => $tmp_name) {
            if (!empty($tmp_name)) {
                try {
                    $cloudinaryResponse = $upload->upload($tmp_name);
                    $uploaded_images[] = $cloudinaryResponse["secure_url"];
                } catch (Exception $e) {
                    $_SESSION['error'] = "Image upload failed: " . $e->getMessage();
                    header("Location: completed.php");
                    exit();
                }
            }
        }

        if (!empty($uploaded_images)) {
            $image_urls = implode(',', $uploaded_images); // Store multiple images as a comma-separated string

            // Insert into database
            $stmt = $conn->prepare("INSERT INTO completed_projects (image_url, client_name, area, location) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $image_urls, $client_name, $area, $location);

            if ($stmt->execute()) {
                $_SESSION['message'] = "Project uploaded successfully!";
            } else {
                $_SESSION['error'] = "Database error: Unable to upload project.";
            }
            $stmt->close();
        }
    } else {
        $_SESSION['error'] = "Please select at least one image.";
    }
}

// Fetch all completed projects
$query = "SELECT * FROM completed_projects ORDER BY created_at DESC";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Completed Projects</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        .back-button {
    display: inline-block;
    margin: 20px;
    padding: 10px 25px;
    background: linear-gradient(to right, #f1c40f, #f39c12);
    color: black;
    text-decoration: none;
    font-weight: bold;
    border-radius: 30px;
    transition: all 0.3s ease-in-out;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    font-size: 16px;
}

.back-button:hover {
    background: linear-gradient(to right, #f39c12, #e67e22);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
    transform: scale(1.05);
}
    body {
        background: url('assets/logo.jpg') no-repeat center center fixed;
        background-size: cover;
        color:rgb(242, 244, 233);
        font-family: 'Poppins', sans-serif;
    }
    .container {
        margin-top: 40px;
        background: rgba(0, 0, 0, 0.7);
        padding: 20px;
        border-radius: 10px;
    }
    .card {
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        background:rgb(239, 242, 244);
        color:rgb(26, 26, 25);
        border-radius: 10px;
        overflow: hidden;
    }
    .card:hover {
        transform: scale(1.05);
        box-shadow: 0 10px 20px rgba(0, 255, 255, 0.3);
    }
    .btn-primary {
        background:rgb(139, 177, 202);
        border: none;
        color: white;
        font-weight: bold;
        border-radius: 5px;
        transition: background 0.3s ease-in-out;
        padding: 8px 20px; /* Smaller button */
    }
    .btn-primary:hover {
        background: #1A5276;
    }
    .fade-in {
        animation: fadeIn 1s ease-in-out;
    }
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .carousel-inner img {
        border-radius: 8px;
    }
    .modal-content {
        background:rgb(170, 175, 185);
        color: white;
        border-radius: 10px;
    }
    .modal-header {
        border-bottom: 1px solid rgba(225, 165, 165, 0.2);
    }
    .modal-body {
        text-align: center;
    }
</style>


</head>
<body>

<div class="container">
<a href="admin_dashboard.php" class="back-button">⬅ Back</a>

    <h2 class="text-center fade-in">Upload Completed Project</h2>

    <!-- Display Messages -->
    <?php if (isset($_SESSION['message'])): ?>
        <div class="alert alert-success"><?= $_SESSION['message']; unset($_SESSION['message']); ?></div>
    <?php endif; ?>

    <?php if (isset($_SESSION['error'])): ?>
        <div class="alert alert-danger"><?= $_SESSION['error']; unset($_SESSION['error']); ?></div>
    <?php endif; ?>

    <!-- Upload Form -->
    <form action="" method="POST" enctype="multipart/form-data" class="fade-in">
        <div class="mb-3">
            <label class="form-label">Client Name</label>
            <input type="text" name="client_name" class="form-control" required>
        </div>
        
        <div class="mb-3">
            <label class="form-label">Area</label>
            <input type="text" name="area" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Location</label>
            <input type="text" name="location" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Project Images</label>
            <input type="file" name="images[]" class="form-control" multiple required>
        </div>
        <button type="submit" name="upload_project" class="btn btn-primary w-100">Upload</button>
    </form>

    <!-- Completed Projects Section -->
    <h2 class="mt-5 text-center fade-in">Completed Projects</h2>
    <div class="row fade-in">
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="col-md-4">
                <div class="card mb-4" data-bs-toggle="modal" data-bs-target="#projectModal<?= $row['id'] ?>">
                    <img src="<?= explode(',', $row['image_url'])[0]; ?>" class="d-block w-100" alt="Project Image" style="height: 250px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($row['client_name']); ?></h5>
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
        <?php endwhile; ?>
    </div>
</div>

</body>
</html>
