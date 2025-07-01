<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remove Project</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="mt-4">Select Project Category to Remove</h2>
        <div class="list-group mt-3">
            <a href="delete_project.php?category=completed" class="list-group-item list-group-item-action">Completed Projects</a>
            <a href="delete_project.php?category=ongoing" class="list-group-item list-group-item-action">Ongoing Projects</a>
            <a href="delete_project.php?category=upcoming" class="list-group-item list-group-item-action">Upcoming Projects</a>
        </div>
        
        <!-- Back Button -->
        <a href="admin_dashboard.php" class="btn btn-secondary mt-3">Back to Dashboard</a>
    </div>
</body>
</html>
