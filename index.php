<?php
// Database connection parameters
$servername = "localhost";
$username = "u936666569_kool7caraircon";
$password = "Mejaki1996";
$database = "u936666569_kool7";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
     <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="styles.css?v=2">
    <title>Kool 7 Car Aircon Specialist</title>
  </head>
  <body>
    <header class="header">
      <nav class="nav__bar" id="navBar">
        <div class="logo nav__logo">
          <a href="#"><img src="logo 2.png" alt="logo" /></a>
        </div>
        <div class="nav__menu__btn" id="menu-btn">
          <i class="ri-menu-3-line"></i>
        </div>
        <ul class="nav__links" id="nav-links">
          <li><a href="#home">HOME</a></li>
          <li><a href="#about">ABOUT</a></li>
          <li><a href="#service">SERVICE</a></li>
          <li><a href="#contactus">CONTACT US</a></li>
          <li><a href="#price">PACKAGES</a></li>
          <li><a href="#client">CLIENT</a></li>
        </ul>
      </nav>
    </header>

    <div class="section__container header__container" id="home">
        <div class="header__content">
          <h1>We Are Qualified & Professional</h1>
          <div class="header__btn">
            <a href="#about" class="btn btn--responsive">Read More</a>
          </div>
        </div>
    </div>

    <section class="banner__container">
      <div class="banner__card">
        <h4>Cooling assurance or your refund guaranteed.</h4>
      </div>
      <div class="banner__card">
        <h4>Treating your car with the same care as you would.</h4>
      </div>
      <div class="banner__image">
        <img src="banner.jpg" alt="banner" />
      </div>
    </section>

    <section class="section__container experience__container" id="about">
      <div class="experience__image">
        <img src="experience.jpg" alt="experience" />
      </div>
      <div class="experience__content">
        <p class="section__subheader">WHO WE ARE</p>
        <?php
        // Retrieve data from the 'about_us' table in the database
        $sql = "SELECT * FROM about_us";
        $result = $conn->query($sql);

        // Check if there are any rows returned
        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<h2 class='section__header'>" . $row["title"] . "</h2>";
                echo "<p class='section__description'>" . $row["description"] . "</p>";
                echo "<a href='appointment-form.php' class='btn btn--responsive'>Book Now</a>";
            }
        } else {
            echo "0 results";
        }
        ?>
      </div>
    </section>

    <section class="service" id="service">
      <div class="section__container service__container">
        <p class="section__subheader">WHY CHOOSE US</p>
        <h2 class="section__header">Great Car Services</h2>
        <p id="desc">
            Trust us to keep your cooling system running smoothly and reliably,
            ensuring comfort even in the hottest conditions.
        </p>
        <div class="service__grid">
            <?php
            // SQL query to select titles, descriptions, and image paths from services table
            $sql = "SELECT title, description, image_path FROM services";

            // Execute the query
            $result = $conn->query($sql);

            // Check if there are results
            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="service__card">';
                    echo '<img src="' . $row["image_path"] . '" alt="' . $row["title"] . '">';
                    echo '<h4>' . $row["title"] . '</h4>';
                    echo '<p>' . $row["description"] . '</p>';
                    echo '</div>';
                }
            } else {
                echo "0 results";
            }
            ?>
        </div>
      </div>
    </section>

    <section class="customisation">
      <div class="section__container customisation__container">
        <p class="section__subheader">OUR CUSTOMIZATION</p>
        <h2 class="section__header">
          Air Conditioning Servicing Paired with Exceptional Craftsmanship
        </h2>
        <p class="section__description">
          Experience unparalleled craftsmanship tailored specifically for your car's 
          air conditioning system with our expert aircon servicing.
        </p>
      </div>
    </section>

    <section class="contact" id="contactus">
      <div class="section__container contact__container">
        <div class="contact__content">
          <p class="section__subheader">CONTACT US</p>
          <h2 class="section__header">Stay cool, stay comfortable with our air conditioning services.</h2>
          <p class="section__description">
            Experience the enhanced comfort as our meticulous care rejuvenates your car's air conditioning system, 
            ensuring peak performance and satisfaction.
          </p>
          <div class="contact__btns">
            <a href="#service" class="btn btn--responsive">Our Services</a>
            <a href="#footer" class="btn btn--responsive">Contact Us</a>
          </div>
        </div>
      </div>
    </section>

    <?php
    // Query to fetch prices from the database
    $sql = "SELECT title, description, price FROM packages";
    $result = $conn->query($sql);
    ?>

    <section class="section__container price__container" id="price">
      <p class="section__subheader">PACKAGES</p>
      <h2 class="section__header">We offer a range of cost-effective and adaptable prices.</h2>
      <div class="price__grid-container" style="display: flex; justify-content: center;">
        <div class="price__grid" style="display: flex; flex-wrap: wrap;">
            <?php
            $package_index = 0; // Initialize package index
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $package_index++; // Increment package index
                    ?>
                    <div class="price__card" style="flex: 0 0 50%; max-width: calc(45% - 20px); margin: 0 10px 20px;">
                        <?php if ($package_index == 3) { ?>
                            <div class="price__card__ribbon">POPULAR CHOICE</div>
                        <?php } ?>
                        <h5><?php echo $row['title']; ?></h5>
                        <h4><sup></sup><?php echo $row['price']; ?></h4>
                        <p><?php echo nl2br($row['description']); ?></p>
                        <a href="appointment-form.php" class="btn btn--responsive">Book Now</a>
                        <p><strong>"The price varies depending on the brand of car and the year model."</strong></p>
                    </div>
                    <?php
                }
            } else {
                echo "No packages available.";
            }
            ?>
        </div>
      </div>
    </section>

    <section class="section__container testimonial__container" id="client">
    <p class="section__subheader">CLIENT TESTIMONIALS</p>
    <h2 class="section__header">100% Approved By Customers</h2>
    <!-- Slider main container -->
    <div class="swiper">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <!-- Slides -->
            <?php
            // Fetch testimonials from the database
            $sql = "SELECT * FROM testimonials";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<div class="swiper-slide">';
                    echo '<div class="testimonial__card">';
                    echo '<img src="' . $row["image"] . '" alt="testimonial" />';
                    echo '<p>' . $row["content"] . '</p>';
                    echo '<h4>' . $row["author"] . '</h4>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo "0 results";
            }
            ?>
        </div>
        <!-- If we need pagination -->
        <div class="swiper-pagination"></div>
    </div>
    <!-- Feedback Button -->
    <section class="section__container feedback__container">
        <div class="feedback__button">
            <a href="feedback.php" class="btn btn--responsive">Leave Feedback</a>
        </div>
    </section>
</section>

<section class="map-container">
    <!-- Embed Google Maps iframe with your location -->
    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d775.1232351635333!2d121.3258414574697!3d14.055829360292276!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397a7bb50d03467%3A0xfb2c11d96f333a05!2sBrgy.%20Concepcion%2C%20San%20Pablo%20City%2C%20Laguna!5e0!3m2!1sen!2sph!4v1649437942454!5m2!1sen!2sph"
        allowfullscreen
        loading="lazy"
    ></iframe>
</section>

<!-- User Location -->
<div id="userLocation"></div>

<footer class="footer" id="footer">
    <div class="section__container footer__container">
        <!-- Logo and Description -->
        <div class="footer__col">
            <div class="logo footer__logo">
                <?php
                // Fetch logo and description from the database
                $sql = "SELECT logo_path, description FROM footer_content";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    echo '<a href="#"><img src="' . $row["logo_path"] . '" alt="logo" /></a>';
                    echo '<p class="section__description">' . $row["description"] . '</p>';
                }
                ?>
            </div>
            <!-- Social Media Links -->
            <ul class="footer__socials">
                <li>
                    <a href="https://www.facebook.com/pages/Kool-7-Car-Aircon-Specialist/121817075029394"><i class="ri-facebook-fill"></i></a>
                </li>
            </ul>
        </div>
        <!-- Quick Links -->
        <div class="footer__col">
            <h4>Our Services</h4>
            <ul class="footer__links">
                <?php
                // Fetch services from the database
                $sql = "SELECT service_name, service_link FROM general_services";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<li><a href="' . $row['service_link'] . '">' . $row['service_name'] . '</a></li>';
                    }
                } else {
                    echo "No services available.";
                }
                ?>
            </ul>
        </div>
        <!-- Contact Info -->
        <div class="footer__col">
            <h4>Contact Info</h4>
            <ul class="footer__links">
                <?php
                // Fetch contact info from the database
                $sql = "SELECT phone, address, email, hours FROM contact_info";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    echo '<li><p>Phone: <span>' . $row["phone"] . '</span></p></li>';
                    echo '<li><p>Address: <span>' . $row["address"] . '</span></p></li>';
                    echo '<li><p>Email: <span>' . $row["email"] . '</span></p></li>';
                    echo '<li><p>Business Hours: <span>' . $row["hours"] . '</span></p></li>';
                } else {
                    echo "No contact info available.";
                }
                ?>
            </ul>
        </div>
    </div>
</footer>

<script>
// Get user's location using Geolocation API
function getUserLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showUserLocation);
    } else {
        document.getElementById("userLocation").innerHTML = "Geolocation is not supported by this browser.";
    }
}

// Display user's location
function showUserLocation(position) {
    const latitude = position.coords.latitude;
    const longitude = position.coords.longitude;
    const locationURL = `https://maps.googleapis.com/maps/api/geocode/json?latlng=${latitude},${longitude}&key=YOUR_API_KEY`;

    fetch(locationURL)
        .then(response => response.json())
        .then(data => {
            const address = data.results[0].formatted_address;
            document.getElementById("userLocation").innerHTML = `User Location: ${address}`;
        })
        .catch(error => {
            console.error('Error fetching location:', error);
            document.getElementById("userLocation").innerHTML = "Error fetching location.";
        });
}


</script>
<script src="https://unpkg.com/scrollreveal"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script src="main.js"></script>
</body>
</html>
