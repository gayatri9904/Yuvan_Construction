<?php
require 'vendor/autoload.php';

use Cloudinary\Configuration\Configuration;
use Cloudinary\Api\Upload\UploadApi;

// Configure Cloudinary
Configuration::instance([
    'cloud' => [
        'cloud_name' => 'dmi34moiz',
        'api_key'    => '326162258732871',
        'api_secret' => '6tzgEN-eGrCG9UqdauEGza-GjwE'
    ],
    'url' => [
        'secure' => true
    ]
]);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['file'])) {
    try {
        $upload = new UploadApi();

        // Upload file with correct options
        $response = $upload->upload($_FILES['file']['tmp_name'], [
            'resource_type' => 'image', // Ensure only images are uploaded
            'allowed_formats' => ['jpg', 'png', 'jpeg', 'gif'], // Restrict formats
            'folder' => 'construction_images' // Optional: Organize images in Cloudinary folder
        ]);

        echo "<p style='color:green; font-weight:bold;'>Upload successful!</p>";
        echo "<p>Image URL: <a href='".$response['secure_url']."' target='_blank'>".$response['secure_url']."</a></p>";
    } catch (Exception $e) {
        echo "<p style='color:red; font-weight:bold;'>Upload failed: " . $e->getMessage() . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Image</title>
</head>
<body>
    <h2>Upload Image</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="file" required>
        <button type="submit">Upload</button>
    </form>
</body>
</html>
