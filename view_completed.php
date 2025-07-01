<?php
require 'config.php'; // Database connection
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Completed Projects</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
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
        color:rgb(240, 242, 236);
        font-family: 'Poppins', sans-serif;
    }
    h2 {
        text-align: center;
        margin-top: 30px;
        font-weight: bold;
        color:rgb(247, 247, 243);
        animation: fadeIn 1.5s ease-in-out;
    }
    .container {
        margin-top: 40px;
        background: rgba(0, 0, 0, 0.7);
        padding: 20px;
        border-radius: 10px;
    }
    .card {
        background:rgb(240, 243, 243);
        color:rgb(32, 32, 32);
        border: 2px solid gold;
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        border-radius: 10px;
        overflow: hidden;
        cursor: pointer;
    }
    .card:hover {
        transform: scale(1.05);
        box-shadow: 0 10px 20px rgba(192, 186, 152, 0.4);
    }
    .card img {
        height: 200px;
        object-fit: cover;
        border-bottom: 2px solid gold;
        transition: transform 0.3s ease-in-out;
    }
    .card:hover img {
        transform: scale(1.1);
    }
    .btn-primary {
        background:rgb(247, 248, 249);
        border: none;
        color: white;
        font-weight: bold;
        border-radius: 5px;
        transition: background 0.3s ease-in-out;
        padding: 8px 20px;
    }
    .btn-primary:hover {
        background:rgb(145, 152, 156);
    }
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .modal-content {
        background:rgb(250, 247, 247);
        color: black;
        border-radius: 10px;
    }
    .modal-header {
        border-bottom: 1px solid rgba(255, 255, 255, 0.2);
    }
    .modal-body {
        text-align: center;
    }
    .carousel-inner img {
        border-radius: 8px;
    }
</style>

</head>
<body>
    <div class="container">
    <a href="index.php" class="back-button">⬅ Back</a>

        <h2 class="mt-4">Completed Projects</h2>
        <form method="GET" action="" class="mb-4">
  <div class="input-group">
    <input type="text" class="form-control" name="search" placeholder="Search by project name or location" value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
    <button class="btn btn-primary" type="submit">Search</button>
  </div>
</form>

        <div class="row mt-4">
            <?php
            $search = isset($_GET['search']) ? $conn->real_escape_string($_GET['search']) : '';
            if ($search) {
                $query = "SELECT * FROM completed_projects WHERE client_name LIKE '%$search%' OR location LIKE '%$search%' ORDER BY created_at DESC";
            } else {
                $query = "SELECT * FROM completed_projects ORDER BY created_at DESC";
            }
            
            $result = $conn->query($query);

            while ($row = $result->fetch_assoc()) {
                $image_urls = explode(',', $row['image_url']); // Extract all images
                $first_image = $image_urls[0]; // Show first image as thumbnail
                ?>
                <div class="col-md-4" style="animation: fadeIn 1.5s ease-in-out;">
                    <div class="card mb-4" data-bs-toggle="modal" data-bs-target="#projectModal<?= $row['id'] ?>">
                        <img src="<?= htmlspecialchars(trim($first_image)); ?>" class="card-img-top" alt="Project Image">
                        <div class="card-body">
                            <h5 class="card-title"> <?= htmlspecialchars($row['client_name']); ?> </h5>
                            <p class="card-text"><strong>Area:</strong> <?= $row['area']; ?></p>
                            
                            <p class="card-text"><strong>Location:</strong> <?= $row['location']; ?></p>
                        </div>
                    </div>
                </div>

                <!-- Modal for Viewing Project Images -->
                <div class="modal fade" id="projectModal<?= $row['id'] ?>" tabindex="-1">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title"> <?= htmlspecialchars($row['client_name']); ?> </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <div id="carousel<?= $row['id'] ?>" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        <?php foreach ($image_urls as $index => $img_url): ?>
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
                <?php
            }
            ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
