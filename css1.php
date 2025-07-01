<?php
header("Content-type: text/css");
?>

/* Global Styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Playfair Display', serif;
}

body {
    background-color: #000;
    color: white;
}

/* Header */
header {
    padding: 15px 0;
    background: black;
    position: fixed;
    top: 0;
    width: 100%;
    z-index: 1000;
}

/* Logo */
.logo {
    display: flex;
    align-items: center;
}

.logo img {
    height: 50px;
    margin-right: 10px;
}

.company-name {
    font-size: 24px;
    font-weight: bold;
    color: white;
    text-transform: uppercase;
    letter-spacing: 2px;
    opacity: 0;
    animation: fadeInScale 1.5s ease-in-out forwards;
}

@keyframes fadeInScale {
    0% {
        opacity: 0;
        transform: scale(0.8);
    }
    100% {
        opacity: 1;
        transform: scale(1);
    }
}

/* Navbar */
.navbar-nav .nav-link {
    position: relative;
    color: white;
    font-size: 18px;
    padding: 10px 15px;
    font-weight: 500;
    transition: color 0.3s ease-in-out;
}

.navbar-nav .nav-link:hover {
    color: gold;
}

.navbar-nav .nav-link::after {
    content: "";
    position: absolute;
    left: 50%;
    bottom: -5px;
    width: 0;
    height: 2px;
    background-color: gold;
    transition: all 0.3s ease-in-out;
    transform: translateX(-50%);
}

.navbar-nav .nav-link:hover::after {
    width: 100%;
}

/* Hero Section */
.hero {
    position: relative;
    width: 100%;
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
}

.bg-video {
    position: absolute;
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.overlay {
    position: absolute;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
}

.hero h1 {
    position: relative;
    font-size: 48px;
    color: yellow;
    text-align: center;
}

.animated-text {
    color: yellow;
    font-weight: bold;
    border-right: 3px solid white;
    padding-right: 5px;
    display: inline-block;
    white-space: nowrap;
    overflow: hidden;
}

<?php
header("Content-type: text/css");
?>

/* Global Styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Playfair Display', serif;
}

body {
    background-color: #000;
    color: white;
    margin: 0;
    padding: 0;
}

/* Full-Screen Background */
.page-background {
    position: fixed;
    width: 100%;
    height: 100vh;
    background: url('assets/bg-image.jpg') no-repeat center center/cover;
    z-index: -1;
}

/* Overlay for Better Text Readability */
.page-overlay {
    position: fixed;
    width: 100%;
    height: 100vh;
    background: rgba(0, 0, 0, 0.5);
    z-index: -1;
}

/* Header */
header {
    padding: 15px 0;
}

/* Navbar Hover Effects */
.navbar-nav .nav-link {
    position: relative;
    color: white;
    font-size: 18px;
    padding: 10px 15px;
    font-weight: 500;
    transition: color 0.3s ease-in-out;
}

/* Hover effect: Change text color to gold */
.navbar-nav .nav-link:hover {
    color: gold;
}

/* Underline effect */
.navbar-nav .nav-link::after {
    content: "";
    position: absolute;
    left: 50%;
    bottom: -5px;
    width: 0;
    height: 2px;
    background-color: gold;
    transition: all 0.3s ease-in-out;
    transform: translateX(-50%);
}

/* Expand underline on hover */
.navbar-nav .nav-link:hover::after {
    width: 100%;
}

/* Hero Section */
.hero {
    position: relative;
    width: 100%;
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
}

.bg-video {
    position: absolute;
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.overlay {
    position: absolute;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
}

/* Hero Heading */
.hero h1 {
    position: relative;
    font-size: 48px;
    color: yellow;
    text-align: center;
}

/* Animated Text */
.animated-text {
    color: yellow;
    font-weight: bold;
    border-right: 3px solid white;
    padding-right: 5px;
    display: inline-block;
    white-space: nowrap;
    overflow: hidden;
}




/* About Us Section */
#about {
    padding: 60px 0;
    background: #f9f9f9; /* Light background */
    color: black;
    text-align: center;
}

/* Section Titles */
.section-title {
    font-size: 18px;
    text-transform: uppercase;
    font-weight: 600;
    letter-spacing: 1px;
    color: #555;
    margin-bottom: 10px;
}

.vision-text {
    font-size: 38px;
    font-weight: 700;
    color: black;
    margin-bottom: 30px;
}

/* Category Tabs */
.category-tabs {
    display: flex;
    justify-content: center;
    gap: 20px;
    margin-bottom: 40px;
}

.category-tabs a {
    text-decoration: none;
    font-size: 16px;
    font-weight: 600;
    color: #2d5d3a; /* Dark Green */
    border-bottom: 3px solid transparent;
    padding-bottom: 5px;
    transition: 0.3s ease-in-out;
}

.category-tabs a:hover, .category-tabs .active {
    border-bottom: 3px solid #2d5d3a;
}

/* Owner Section */
.owner-section {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-wrap: wrap;
    margin-top: 40px;
    gap: 30px;
    padding: 20px;
}

/* Owner Image */
.owner-image img {
    width: 180px;
    height: 180px;
    border-radius: 50%;
    object-fit: cover;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    transition: transform 0.3s ease-in-out;
}

.owner-image img:hover {
    transform: scale(1.05);
}

/* Owner Information */
.owner-info {
    max-width: 100vh;
    background: white;
    padding: 20px;
    text-align: left;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.owner-info h3 {
    font-size: 24px;
    font-weight: bold;
    color: black;
}

.owner-info p {
    font-size: 16px;
    color: #333;
}

/* Office Section */
.office-section {
    display: flex;
    justify-content: center;
    margin-top: 50px;
}

/* Office Image Box */
.office-image-container {
    width: 350px;
    height: 250px;
    overflow: hidden;
    cursor: pointer;
    border-radius: 10px;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease-in-out;
}

.office-image-container:hover {
    transform: scale(1.03);
}

.office-image-container img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

/* Office Info */
.office-info {
    text-align: center;
    margin-top: 15px;
    font-size: 18px;
    font-weight: bold;
    color: black;
}

    



/* Service Card Styling */
.service-card {
    background: white;
    padding: 20px;
    text-align: center;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease-in-out;
}

.service-card h3 {
    color: #FFD700; /* Golden Yellow */
    font-weight: bold;
}

.service-card p {
    color:rgb(30, 29, 29); /* White */
    font-size: 16px;
}


.service-card:hover {
    transform: scale(1.03);
}

.service-card img {
    width: 100%;
    height: 200px;
    object-fit: cover;
    border-radius: 8px;
}

/* Extra Information (Hidden by Default) */
.extra-info {
    display: none;
    margin-top: 10px;
    background: #f8f9fa;
    padding: 10px;
    border-radius: 5px;
    font-size: 14px;
    color: #333;
}

#services {
    /* Use a solid color or gradient if you don't want an image */
    background-color: rgba(0, 0, 0, 0.7); /* Dark overlay */
    color: white; /* Ensure text is visible */
    padding: 60px 20px;
    border-radius: 10px;
}

.service-card {
    background: rgba(255, 255, 255, 0.9); /* Light background for contrast */
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
    text-align: center;
    transition: transform 0.3s ease-in-out;
}

.service-card img {
    width: 100%;
    height: 200px;
    object-fit: cover;
    border-radius: 10px;
}

.service-card:hover {
    transform: translateY(-5px);
}


.extra-info {
    display: none;
    margin-top: 10px;
    padding: 10px;
    background-color: #f8f9fa;
    border: 1px solid #ddd;
    border-radius: 5px;
}


.view-more {
    margin-top: 10px;
    display: inline-block;
}

.view-more:hover {
    background-color: #e0a800;
}



/* Contact Section Styling */
#contact {
    background: #ffffff; /* White background */
    padding: 50px 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

/* Contact Info */
.contact-info {
    background: #f8f9fa; /* Light gray background */
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    text-align: left;
    color: black; /* Ensure text is visible */
    font-size: 16px;
}

.contact-info h4 {
    font-size: 22px;
    font-weight: bold;
    color: #333; /* Dark gray for better contrast */
}

.contact-info p {
    margin-bottom: 10px;
    font-size: 16px;
}

/* Contact Form */
.contact-form {
    background: #f8f9fa; /* Light gray background */
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    text-align: left;
}

.contact-form h4 {
    font-size: 22px;
    font-weight: bold;
    color: #333;
}

.contact-form input,
.contact-form textarea {
    border-radius: 5px;
    border: 1px solid #ccc;
    padding: 10px;
    width: 100%;
    font-size: 16px;
    color: black; /* Ensure input text is visible */
}

.contact-form button {
    border-radius: 5px;
    font-weight: bold;
    background-color: #ffc107;
    color: black;
    font-size: 18px;
}

.contact-form button:hover {
    background-color: #e0a800;
}

/* Hover Effect */
.contact-info:hover,
.contact-form:hover {
    transform: scale(1.02);
    transition: all 0.3s ease-in-out;
}
