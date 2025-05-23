<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History Explorer</title>
    <link rel="stylesheet" href="about.css">
</head>
<body>
    <header class="header">
        <div class="logo">My Website</div>
        <nav class="nav">
            <ul class="nav-links">
                <li>
                    <form class="lg-0" action="search_results.php" method="POST">
                        <input class="sm-2" type="search" name="search_query" placeholder="Search For Place." aria-label="Search" required>
                        <button class="sm-0" type="submit">Search</button>
                    </form>
                </li>
                <li><a href="home.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="review.php">Review</a></li>
                <li><a href="add.php">Add Place</a></li>
            </ul>
        </nav>
    </header>
    <section class="hero">
        <h1>About Us</h1>
        <p>Learn more about our mission, vision, and team.</p>
    </section>
    <main>
        <section class="about-overview">
            <h2>Our Company</h2>
            <p>We are a dedicated team committed to providing the best services and products to our customers. Our journey began with a simple idea, and today we have grown into a trusted name in the industry.</p>
        </section>

        <section class="mission">
            <h2>Our Mission</h2>
            <p>Our mission is to deliver high-quality products and exceptional service that exceeds our customers' expectations. We strive to innovate and improve continuously.</p>
        </section>

        <section class="team">
            <p>We are the team of Five with lead of miss. Shah Mam. We all contributed to complete this website. This website is not just a place to search for places; it is our dream to make it easy to access each and every place by everyone in the world.</p>
        </section>

        <section class="contact">
            <h2>Contact Us</h2>
            <p>If you have any questions or would like to learn more about us, feel free to reach out!</p>
            <p>Email: info@example.com</p>
            <p>Phone: (123) 456-7890</p>
        </section>
        
    </main>

    <footer class="footer">
        <div class="footer-container">
            <div class="footer-section about">
                <h3>About Us</h3>
                <p>We are dedicated to providing the best content and resources for our users. Our mission is to educate and inspire.</p>
            </div>
            <div class="footer-section links">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="#home">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#services">Services</a></li>
                    <li><a href="#contact">Add Place</a></li>
                    <li><a href="#home">Search</a></li>
                </ul>
            </div>
            <div class="footer-section contact">
                <h3>Contact Us</h3>
                <p>Email: info@example.com</p>
                <p>Phone: (123) 456-7890</p>
            </div>
            <div class="footer-section social">
                <h3>Follow Us</h3>
                <a href="#" class="social-icon">Facebook</a>
                <a href="#" class="social-icon">Twitter</a>
                <a href="#" class="social-icon">Instagram</a>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2023 My Website. All rights reserved.</p>
        </div>
    </footer>

    <script src="js.js"></script>
</body>
</html>