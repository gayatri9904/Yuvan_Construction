<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $image_url = $_POST['image_url'];

    $query = "INSERT INTO projects (title, description, image_url) VALUES ('$title', '$description', '$image_url')";
    if ($conn->query($query) === TRUE) {
        echo "Project added successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
