<?php
include("conn.php");

if (isset($_POST["submit"])) {
    // Retrieve form data
    $rate = $_POST["rating"]; // Ensure this matches the input name
    $comment = $_POST["comment"];

    // Debugging: Check the values
    echo '<script>alert("Rate: ' . $rate . ', Comment: ' . $comment . '");</script>';

    // Prepare the SQL statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO review (rate, comment) VALUES (?, ?)");
    $stmt->bind_param("is", $rate, $comment); // "is" means integer and string

    // Execute the statement
    if ($stmt->execute()) {
        echo '<script>alert("Information Stored Successfully");</script>';
    } else {
        echo '<script>alert("Information Not stored! Error: ' . $stmt->error . '");</script>';
    }

    // Close the statement
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History Explorer</title>
    <link rel="stylesheet" href="review.css">
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

    <main>
        <div class="container">
            <h1>Submit Your Review</h1>
            <form id="reviewForm" action="review.php" method="POST">
                <div class="form-group">
                    <label for="rating">Rating:</label>
                    <input type="range" id="rating" name="rating" min="1" max="5" value="3" step="1" oninput="updateRatingValue(this.value)">
                    <span id="ratingValue">3</span>
                </div>
                <div class="form-group">
                    <label for="comment">Comment:</label>
                    <textarea id="comment" name="comment" rows="4" required></textarea>
                </div>
                <button type="submit" name="submit" class="b1">Submit Review</button>
            </form>
            <div id="reviews" class="reviews"></div>
        </div>
        <script src="review.js"></script>
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
    <script>
        function updateRatingValue(value) {
            document.getElementById('ratingValue').innerText = value;
        }
    </script>
</body>
</html>