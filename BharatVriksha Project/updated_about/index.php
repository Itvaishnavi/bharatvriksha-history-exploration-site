<?php
$servername = "localhost";
$username = "root"; // Change this if needed
$password = ""; // Add your database password
$dbname = "bharatvriksha"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $message = $_POST['textarea'];

    $sql = "INSERT INTO contact_form (name, email, number, message) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssis", $name, $email, $number, $message);

    if ($stmt->execute()) {
        echo "<script>alert('Message sent successfully!');</script>";
    } else {
        echo "<script>alert('Error: " . $stmt->error . "');</script>";
    }

    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lotus Temple</title>
    <link rel="stylesheet" href="konark.css">
</head>
<body>
    <section class="contact" id="contact">
        <h2 class="section_title">Contact Us</h2>
        <div class="section_container">
            <div class="contact_container">
                <div class="contact_form">
                    <form action="" method="POST">
                        <div class="field">
                            <label for="Name">Full Name</label>
                            <input type="text" id="Name" placeholder="Your Name" name="name" required />
                        </div>
                        <div class="field">
                            <label for="email">Your Email</label>
                            <input type="email" id="email" placeholder="Your Email" name="email" required />
                        </div>
                        <div class="field">
                            <label for="number">Your Number</label>
                            <input type="number" id="number" placeholder="Your Contact Number" name="number" required />
                        </div>
                        <div class="field">
                            <label for="textarea">Message</label>
                            <textarea name="textarea" id="textarea" placeholder="Your Message" required></textarea>
                        </div>
                        <button class="button" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
