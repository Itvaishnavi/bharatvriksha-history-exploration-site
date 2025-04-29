<?php
include("conn.php");

if (isset($_POST["submit"])) {
    // Retrieve form data
    $place = $_POST["place"];
    $state = $_POST["state"];
    $city = $_POST["city"];
    $locationUrl = $_POST["locationUrl"];
    $dis1 = $_POST["dis1"];
    $dis2 = $_POST["dis2"];
    
    // Handle file upload
    $files = $_FILES["photos"];
    $uploadedFiles = [];
    $uploadDir = "uploads/";

    foreach ($files["name"] as $key => $name) {
        $targetFile = $uploadDir . basename($name);
        if (move_uploaded_file($files["tmp_name"][$key], $targetFile)) {
            $uploadedFiles[] = $targetFile; // Store the path of uploaded files
        } else {
            echo "Error uploading file: " . $name;
        }
    }

    // Convert the array of uploaded files to a string (if you want to store multiple files)
    $photos = implode(",", $uploadedFiles);

    // Prepare the SQL query
    $query1 = "INSERT INTO place (place, state, city, url, discription1, discription2, photos) VALUES ('$place', '$state', '$city', '$locationUrl', '$dis1', '$dis2', '$photos')";
    
    // Execute the query
    $result1 = mysqli_query($conn, $query1);

    // Check if the query was successful
    if ($result1) {
        echo '<script>alert("Information Stored Successfully");</script>';
    } else {
        echo '<script>alert("Information Not stored! Error: ' . mysqli_error($conn) . '");</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History Explorer</title>
    <link rel="stylesheet" href="add.css">
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
        <h1>Add a place for People Where they can Explore the History in Divine way</h1><br>
        <div class="container">
            <h1>Location Submission Form</h1>
            <form id="locationForm" action="add.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="place">Place:</label>
                    <input type="text" id="place" name="place" required>
                </div>
                <div class="form-group">
                    <label for="state">State:</label>
                    <input type="text" id="state" name="state" required>
                </div>
                <div class="form-group">
                    <label for="city">City:</label>
                    <input type="text" id="city" name="city" required>
                </div>
                <div class="form-group">
                    <label for="locationUrl">Location URL:</label>
                    <input type="url" id="locationUrl" name="locationUrl" required>
                </div>
                <div class="form-group">
                    <label for="dis1">Description 1:</label>
                    <textarea id="dis1" name="dis1" rows="4" required></textarea>
                </div>
                <div class="form-group">
                    <label for="dis2">Description 2:</label>
                    <textarea id="dis2" name="dis2" rows="4" required></textarea>
                </div>
                <div class="form-group">
                    <label for="photos">Upload Photos:</label>
                    <input type="file" id="photos" name="photos[]" accept="image/*" multiple required>
                </div>
                <div class="b1">
                    <button type="submit" name="submit">Submit</button>
                </div>
                <div id="responseMessage" class="response-message"></div>
            </form>
        </div>
        <script src="script.js"></script>
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
                    <li><a href="#services ">Services</a></li>
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
