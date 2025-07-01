<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Construction Website</title>
    
    <!-- Other meta tags, Bootstrap CSS, and your custom CSS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">


    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="css1.php">
    <script defer src="js1.php"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
    <style>
        /* Existing styles */
        .company-name {
            font-size: 1.2rem;
            margin-left: 10px;
        }
        .navbar-nav .nav-link {
            padding: 10px 15px;
            font-size: 1.2rem;
            transition: color 0.3s ease-in-out;
        }
        .navbar-nav .nav-item:hover .nav-link, .navbar-nav .nav-item:focus .nav-link, .dropdown-item:focus {
            color: gold !important;
        }
        .dropdown-menu {
            background-color: black;
            
        }
        .dropdown-item{
            color: white;
        }
        .dropdown-menu .dropdown-item:hover {
            background-color: gold !important;
            color: black !important;
        }
        #login-button {
            background-color: gold;
            border: 2px solid black;
            color: black;
            font-weight: bold;
            transition: all 0.3s ease-in-out;
        }
        #login-button:hover {
            background-color: black;
            color: gold;
        }
        .social-icons {
            margin-left: 20px;
            font-size: 1.5rem;
            
            border: 2px solid black;
            color: black;
            font-weight: bold;
            transition: all 0.3s ease-in-out;
        }
        #social:hover {
            background-color: black;
            color: gold;
        }

        /* Fullscreen Hero Section */
        .hero {
            position: relative;
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            text-align: center;
            overflow: hidden;
        }
        .bg-video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
        }
        .hero h1 {
            position: relative;
            font-size: 3rem;
            font-weight: bold;
            z-index: 2;
        }

        /* Section Styles */
        .page-section {
            padding: 80px 50px;
            text-align: center;
        }
        .page-section h2 {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .page-section p {
            font-size: 1.2rem;
            max-width: 800px;
            margin: auto;
        }
        .bg-dark {
            background-color: #222 !important;
        }
    </style>

<style>
        .map-container {
            width: 100%;
            max-width: 100%;
            margin: auto;
            padding: 20px;
        }

        iframe {
            width: 100%;
            height: 450px;
            border: 0;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }
    </style>

    <style>
        




footer {
  margin: 0;
  padding: 0;
}


    </style>
</head>
<body>



    <!-- Navigation Bar -->
    <header class="bg-black fixed-top shadow w-100">
        <div class="container-fluid d-flex align-items-center justify-content-between py-2">
            <div class="logo d-flex align-items-center">
                <img src="https://res.cloudinary.com/dmi34moiz/image/upload/v1746021703/back1_jrpsbt.jpg" alt="Logo">
                <span class="company-name">Yuvan Construction</span>
            </div>
            <nav class="navbar navbar-expand-lg">
                <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#about">About Us</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="projectsDropdown" role="button" data-bs-toggle="dropdown">Projects</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="view_completed.php">Completed</a></li>
                                <li><a class="dropdown-item" href="view_ongoing.php">Ongoing</a></li>
                                <li><a class="dropdown-item" href="view_upcoming.php">Upcoming</a></li>
                            </ul>
                        <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact">Contact Us</a></li>
                        <li class="nav-item"><a class="nav-link" href="#location">Location</a></li>
                        <li class="nav-item dropdown">
  
</li>


                    </ul>
                </div>
            </nav>
            <div class="d-flex align-items-center">
                <a href="login.php" class="btn" id="login-button">Login</a>
                <div class="social-icons d-flex">
                    <a href="https://www.facebook.com/share/1BbxQAK6wF/?mibextid=LQQJ4d" class="text-white mx-2" id="social"><i class="fab fa-facebook"></i></a>
                    <a href="https://www.instagram.com/yuvan_construction/" class="text-white mx-2" id="social"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </header>

    <!-- Hero Section (Full Screen Background Video) -->
    <section class="hero" >
        <video autoplay muted loop class="bg-video">
            <source src="https://res.cloudinary.com/dmi34moiz/video/upload/v1745975724/background.mp4_jkfvak.mp4" type="video/mp4">
        </video>
        <div class="overlay"></div>
        <h1><span class="animated-text">Building the Future with Yuvan Constructions</span></h1>
    </section>

    <section class="page-section bg-light" id="about">
    <div class="container">
        <h2 class="section-title">What We Do</h2>
        <h1 class="vision-text">We have a vision for the future of construction.</h1>

       

<!-- Owner Section -->
<section class="py-5 bg-light">
  <div class="container">
    <div class="row align-items-center">
      <!-- Owner Image -->
      <div class="col-md-4 text-center mb-4 mb-md-0">
        <img src="https://res.cloudinary.com/dmi34moiz/image/upload/v1746022201/ownerpic_d4ftzc.jpg" alt="Owner Image" class="img-fluid rounded shadow" style="max-width: 350px;">
        <h5 class="mt-3 text-dark">Owner of Yuvan Group</h5>
      </div>
      <!-- Owner Info -->
      <div class="col-md-8">
        <h3 class="text-dark">Mr. Sujit More</h3>
        <p><strong>Education:</strong> B.E in Civil Engineering</p>
        <p><strong>Experience:</strong> Mr. SUJIT S MORE started his business career after completing a B.E. Civil Degree in 
          BVCOEK in 2016. With blessings from his father Shri. S.V. More, he began his individual journey in civil construction 
          within the Government sector. Initially starting with small projects, his experience strengthened over the 
          years, and by early 1000, he expanded into building, road, and bridge construction using advanced machinery. He has 
          undertaken several prestigious projects in Maharashtra, leading to the establishment of Yuvan Construction.
        </p>
        <p><strong>Vision:</strong> To be the industry leader and a market-driven engineering infrastructure company renowned for 
          quality performance and reliability in all types of construction.
        </p>
      </div>
    </div>
  </div>
</section>
<section class="py-5">
  <div class="container">
    <div class="row align-items-center">
      <!-- Office Image -->
      
      <!-- Office Info -->
      <!-- Office Section -->
      <section class="container my-5">
  <div class="row align-items-center">
    <!-- Office Image (Clickable Card) -->
    <div class="col-md-6">
      <div class="card-image" style="cursor: pointer;" onclick="nextOfficeImage()">
      <img id="officeImgs" src="https://res.cloudinary.com/dmi34moiz/image/upload/v1746021821/office1_keyt8v.jpg" alt="Office Image"  style="width: 100%; height: 300px; object-fit: cover; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">

      </div>

    </div>

    <!-- Office Info -->
    <div class="col-md-6">
      <h3 class="text-dark mb-3">About Our Office</h3>
      <p>YUVAN Group is a well-established nationally recognized Civil Construction Company, dynamic and progressive, service-focused in our outlook, with strong foundations in our people.</p>
      <p>We are a professional, innovative, market-focused company, operating as a quality Civil Engineering & Construction service provider with a successful history as a Principal Contractor.</p>
      <p>We boast an impressive portfolio of Civil Construction projects for Government, Infrastructure, Healthcare, Hospitality & Institutional sectors. Our team combines expertise and innovation to deliver turnkey solutions that are efficient and reliable.</p>
      <p>Yuvan Construction strongly emphasizes the safety of the people we interact with. We take extreme precaution with every project, striving to empower lives through thoughtful infrastructure.</p>
    </div>
  </div>
</section>

<!-- Scripts -->
<script>
  // Office Image Switching (Fixed)
  const officeImages = [
    "https://res.cloudinary.com/dmi34moiz/image/upload/v1746021821/office1_keyt8v.jpg",
    "https://res.cloudinary.com/dmi34moiz/image/upload/v1746021872/office_h6cobh.jpg" // Add your extra image here
      // Add more if needed
  ];

  let currentOfficeIndex = 0;

  function nextOfficeImage() {
    currentOfficeIndex = (currentOfficeIndex + 1) % officeImages.length;
    document.getElementById("officeImgs").src = officeImages[currentOfficeIndex];
  }
</script>





<section id="services" class="container my-5">
    <h2 class="text-center text-warning">Our Services</h2>
    <div class="row g-4 mt-4">
        <!-- Service 1 -->
        <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
            <div class="service-card">
                <img src="https://res.cloudinary.com/dmi34moiz/image/upload/v1746021928/service1_vjkoug.jpg" alt="Service 1">
                <h3 style="color: black;">Building Construction</h3>

                <p>At Yuvan Constructions, we provide end-to-end building construction services, ensuring quality, safety, and durability in every project.  </p>
                <a href="javascript:void(0);" class="btn btn-warning view-more" data-target="service1">View More</a>
                <div class="extra-info" id="service1">
                    <p>✅ Residential Construction – Designing and building modern, sustainable homes with superior craftsmanship.<br>
✅ Commercial Buildings – Developing offices, malls, and business spaces tailored to client needs.<br>
✅ Industrial Structures – Constructing factories, warehouses, and large-scale industrial facilities.<br>
✅ Renovation & Remodeling – Upgrading and enhancing existing structures for improved functionality..</p>
                </div>
            </div>
        </div>

        <!-- Service 2 -->
        <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
            <div class="service-card">
                <img src="https://res.cloudinary.com/dmi34moiz/image/upload/v1746021961/Architeture_hosjnp.jpg" alt="Service 2">
                <h3 style="color: black;">Infrastructure</h3>
                <p>We specialize in infrastructure development, delivering high-quality, durable, and efficient structures that support economic growth. </p>
                <a href="javascript:void(0);" class="btn btn-warning view-more" data-target="service2">View More</a>
                <div class="extra-info" id="service2">
                    <p>✅ Roads & Highways – Smooth, long-lasting roads with modern drainage systems.<br>
✅ Bridges & Flyovers – Strong, earthquake-resistant structures for better connectivity.<br>
✅ Water & Drainage Systems – Reliable water supply, sewage, and flood control solutions.<br>
✅ Commercial & Industrial Infrastructure – Factories, warehouses, IT parks, and energy projects.<br>
✅ Public Infrastructure – Airports, railway stations, bus terminals, and smart city projects.</p>
                </div>
            </div>
        </div>

        <!-- Service 3 -->
        <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
            <div class="service-card">
                <img src="https://res.cloudinary.com/dmi34moiz/image/upload/v1746021994/project_manage_sfv7iw.jpg" alt="Service 3">
                <h3 style="color: black;">Project Management</h3>
                <p> We provide comprehensive project planning and designing services, ensuring that every project is well-structured, efficient, and meets client expectations. </p>
                <a href="javascript:void(0);" class="btn btn-warning view-more" data-target="service3">View More</a>
                <div class="extra-info" id="service3">
                    <p>✅ Concept Planning – Understanding client needs and developing a strategic project roadmap.<br>
✅ Architectural & Structural Design – Creating modern, durable, and space-efficient designs.<br>
✅ 3D Modeling & Visualization – Offering realistic previews before construction begins.<br>
✅ Budgeting & Cost Estimation – Ensuring optimal resource allocation and cost control.<br>
✅ Regulatory Approvals – Managing permits, environmental clearances, and compliance.</p>
                </div>
            </div>
        </div>

        <!-- Service 4 -->
        <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
            <div class="service-card">
                <img src="https://res.cloudinary.com/dmi34moiz/image/upload/v1746022042/earthmovers_lnx0au.jpg" alt="Service 4">
                <h3 style="color: black;">Earthmovers</h3>
                <p>We provide professional earthmoving and excavation services for construction, roadwork, and land development projects. Using advanced earthmovers, excavators, bulldozers, and loaders, we ensure efficient site preparation, grading, and land clearing.</p>
                <a href="javascript:void(0);" class="btn btn-warning view-more" data-target="service4">View More</a>
                <div class="extra-info" id="service4">
                    <p>✅ Land Clearing & Site Preparation – Removing debris, leveling land, and preparing sites for construction.<br>
✅ Excavation & Trenching – Digging foundations, drainage systems, and utility trenches.<br>
✅ Road & Highway Earthwork – Grading, compaction, and sub-base preparation.<br>
✅ Demolition & Debris Removal – Safe and controlled removal of old structures.<br>
✅ Soil Filling & Compaction – Ensuring stable ground for construction projects.</p>
                </div>
            </div>
        </div>

        <!-- Service 5 -->
        <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
            <div class="service-card">
                <img src="https://res.cloudinary.com/dmi34moiz/image/upload/v1746022080/material_hksgdg.jpg" alt="Service 5">
                <h3 style="color: black;">Building Material Supply</h3>
                <p>We provide high-quality building materials for all types of construction projects. From foundation to finishing, we ensure durable and cost-effective materials that meet industry standards.</p>
                <a href="javascript:void(0);" class="btn btn-warning view-more" data-target="service5">View More</a>
                <div class="extra-info" id="service5">
                    <p>✅ Cement & Concrete – High-strength cement, ready-mix concrete, and blocks.<br>
✅ Steel & Reinforcement – TMT bars, structural steel, and fabrication materials.<br>
✅ Bricks & Blocks – Fly ash bricks, AAC blocks, and red clay bricks.<br>
✅ Sand & Aggregates – Fine sand, gravel, crushed stone, and aggregates.<br>
✅ Plumbing & Electrical Supplies – Pipes, fittings, wires, and fixtures.<br>
✅ Finishing Materials – Tiles, marble, granite, paints, and woodwork.</p>
                </div>
            </div>
        </div>

        <!-- Service 6 -->
        <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
            <div class="service-card">
                <img src="https://res.cloudinary.com/dmi34moiz/image/upload/v1746022118/road_wimxfm.jpg" alt="Service 6">
                <h3 style="color: black;">Road Construction</h3>
                <p>we specialize in high-quality road construction, delivering durable, well-planned, and smooth transportation networks. Our expertise covers highways, urban roads, rural roads, and industrial pathways, ensuring safety and long-term performance.</p>
                <a href="javascript:void(0);" class="btn btn-warning view-more" data-target="service6">View More</a>
                <div class="extra-info" id="service6">
                    <p>✅ Highways & Expressways – Durable, high-traffic roads with advanced paving techniques.<br>
✅ Urban & Rural Roads – Well-structured roads for cities, towns, and villages.<br>
✅ Asphalt & Concrete Roads – High-strength surfaces for heavy-duty usage.<br>
✅ Bridges & Flyovers – Seamless connectivity with strong, reinforced structures.<br>
✅ Road Repair & Maintenance – Pothole fixing, resurfacing, and durability enhancement.</p>
                </div>
            </div>
        </div>

        



<!--contact us section-->
<?php
if (isset($_GET['success'])) {
    if ($_GET['success'] == 1) {
        echo "<div class='alert alert-success text-center'>Message sent successfully!</div>";
    } else {
        echo "<div class='alert alert-danger text-center'>Failed to send message. Please try again.</div>";
    }
}
?>


<section id="contact" class="container my-5">
    <h2 class="text-center text-warning">Contact Us</h2>
    <div class="row g-4 mt-4">
        <div class="col-md-6">
            <div class="contact-info">
                <h4>Get in Touch</h4>
                <p><strong>Address:</strong> Sambhaji Chowk, Kumbhargaon Road, Deorashtra, Tal-Kadegaon, Dist-Sangli</p>
                <p><strong>Email:</strong> yuvangroup10@gmail.com</p>
                <p><strong>Phone:</strong> 9970465088</p>
                <p><strong>Working Hours:</strong> Mon - Sat: 8:00 AM - 7:00 PM</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="contact-form">
                <h4>Send Us a Message</h4>

                <form method="POST" action="sent_email.php" id="contactForm">
    <div class="mb-3">
        <input type="text" class="form-control" name="name" placeholder="Your Name" required>
    </div>
    <div class="mb-3">
        <input type="email" name="email" class="form-control" placeholder="Your Email" required>
    </div>
    <div class="mb-3">
        <textarea class="form-control" rows="4" name="message" placeholder="Your Message" required></textarea>
    </div>
    <button type="submit" class="btn btn-warning w-100">Send Message</button>
</form>

            </div>
        </div>

        <script>
            window.addEventListener("pageshow", function(event) {
                if (event.persisted || performance.getEntriesByType("navigation")[0].type === "back_forward") {
                    const form = document.querySelector(".contact-form form");
                    if (form) {
                        form.reset();
                    }
                }
            });
        </script>
    </div>
</section>




<!-- Include AOS Library -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<!-- Initialize AOS -->
<script>
    AOS.init({
        duration: 1000,  // Animation duration (1s)
        once: true,  // Animation runs only once
    });
</script>

<!-- JavaScript for "View More" Button -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        let buttons = document.querySelectorAll(".view-more");

        buttons.forEach(button => {
            button.addEventListener("click", function () {
                let target = this.getAttribute("data-target");
                let extraInfo = document.getElementById(target);

                if (extraInfo.style.display === "none" || extraInfo.style.display === "") {
                    extraInfo.style.display = "block";
                } else {
                    extraInfo.style.display = "none";
                }
            });
        });
    });
</script>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!--email script-->
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        const urlParams = new URLSearchParams(window.location.search);
        const success = urlParams.get("success");

        if (success === "1") {
            alert("✅ Your message has been sent successfully!");
            document.getElementById("contactForm").reset();
            history.replaceState(null, null, window.location.pathname); // remove ?success from URL
        } else if (success === "0") {
            alert("❌ Failed to send your message. Please try again later.");
            history.replaceState(null, null, window.location.pathname);
        }
    });
</script>





<script>
  function initMap() {
    var office = {lat: 17.165105, lng: 74.389910}; // Example: Satara coordinates
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 15,
      center: office
    });
    var marker = new google.maps.Marker({
      position: office,
      map: map,
      title: 'Yuvan Construction Office'
    });
  }
</script>
<section id="location" class="container my-5"></section>
<div class="map-container">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3812.1067920897412!2d74.38689513468442!3d17.16501551470162!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc1710e4db438f3%3A0xc00aca2e97cc0ef0!2syuvan%20construction%20%7C%20Best%20Construction%20and%20developers%20%7C%20best%20contractors%20in%20Kadegaon!5e0!3m2!1sen!2sin!4v1745312341470!5m2!1sen!2sin" 
        allowfullscreen="" 
        loading="lazy" 
        referrerpolicy="no-referrer-when-downgrade">
    </iframe>
</div>



<!-- Footer Start -->
<footer style="background-color: #1a1a1a; color: #fcd116; padding: 40px 0;">
  <div style="max-width: 1200px; margin: auto; display: flex; flex-wrap: wrap; justify-content: space-between;">

    <!-- Logo & Info -->
    <div style="flex: 1 1 250px; margin: 20px;">
      <img src="https://res.cloudinary.com/dmi34moiz/image/upload/v1746021703/back1_jrpsbt.jpg" alt="Logo" style="width: 100px; margin-bottom: 10px;">
      <h3 style="margin: 10px 0 5px;">Yuvan Construction</h3>
      <p style="color: #ccc;">Is a start-up company founded by <br>Mr. Sujit Sanjay More</p>
    </div>

    <!-- Quick Links -->
    <div style="flex: 1 1 150px; margin: 20px;">
      <h3>Quick Links</h3>
      <ul style="list-style: none; padding: 0;">
        <li><a href="index.php" style="color: #fcd116; text-decoration: none;">Home</a></li>
        <li><a href="#about" style="color: #fcd116; text-decoration: none;">About Us</a></li>
        <li><a href="#services" style="color: #fcd116; text-decoration: none;">Services</a></li>
        <li><a href="#contact" style="color: #fcd116; text-decoration: none;">Contact Us</a></li>
        <li><a href="#location" style="color: #fcd116; text-decoration: none;">Location</a></li>
      </ul>
    </div>

    <!-- Contact -->
    <div style="flex: 1 1 200px; margin: 20px;">
      <h3>Contact Us</h3>
      <p style="color: #ccc;">📞 9970465088</p>
      <p style="color: #ccc;">📍 Yuvan Construction St, Deorashtra, IN</p>
      <p style="color: #ccc;">✉️ yuvangroup10@gmail.com</p>
    </div>

    <!-- Newsletter -->
    <div style="flex: 1 1 200px; margin: 20px;">
      <h3>Newsletter</h3>
      <p style="color: #ccc;">Subscribe to get updates about projects.</p>
      <form style="display: flex; margin-top: 10px;">
        <input type="email" placeholder="Email Address" style="padding: 10px; flex: 1; border: none; outline: none;">
        <button type="submit" style="padding: 10px; background-color: #fcd116; border: none;">📩</button>
      </form>
      <div class="social-icons d-flex">
                    <a href="https://www.facebook.com/share/1BbxQAK6wF/?mibextid=LQQJ4d" class="text-white mx-2" id="social"><i class="fab fa-facebook"></i></a>
                    <a href="https://www.instagram.com/yuvan_construction/" class="text-white mx-2" id="social"><i class="fab fa-instagram"></i></a>
                </div>
    </div>
  </div>

  <div style="text-align: center; color: #888; padding-top: 20px; border-top: 1px solid #333;">
    &copy; 2025 Yuvan Constructions. All Rights Reserved.
  </div>
</footer>
<!-- Footer End -->





</body>
</html>