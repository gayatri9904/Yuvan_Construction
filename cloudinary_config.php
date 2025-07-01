<?php
require 'vendor/autoload.php';

use Cloudinary\Configuration\Configuration;

// Set up Cloudinary configuration
Configuration::instance([
    'cloud' => [
        'cloud_name' => 'dmi34moiz',
        'api_key'    => '326162258732871',
        'api_secret' => '6tzgEN-eGrCG9UqdauEGza-GjwE',
    ],
    'url' => [
        'secure' => true // Ensures HTTPS URLs
    ]
]);
?>
