<?php
include("conn.php");

if (isset($_GET['query'])) {
    // Sanitize the search query
    $searchQuery = mysqli_real_escape_string($conn, $_GET['query']);

    // Prepare the SQL statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM place WHERE place LIKE ? OR city LIKE ? OR state LIKE ? OR discription1 LIKE ? OR discription2 LIKE ?");
    $searchTerm = "%" . $searchQuery . "%"; // Use wildcards for partial matching
    $stmt->bind_param("sssss", $searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm); // "sssss" means five strings

    // Execute the statement
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if any results were returned
    if ($result->num_rows > 0) {
        echo "<h1>Search Results for: " . htmlspecialchars($searchQuery) . "</h1>";
        echo "<ul>";
        while ($row = $result->fetch_assoc()) {
            echo "<li>";
            echo "<strong>Place:</strong> " . htmlspecialchars($row['place']) . "<br>";
            echo "<strong>State:</strong> " . htmlspecialchars($row['state']) . "<br>";
            echo "<strong>City:</strong> " . htmlspecialchars($row['city']) . "<br>";
            echo "<strong>Description 1:</strong> " . htmlspecialchars($row['discription1']) . "<br>";
            echo "<strong>Description 2:</strong> " . htmlspecialchars($row['discription2']) . "<br>";
            echo "<strong>Photos:</strong> <br>";
            $photos = explode(",", $row['photos']);
            foreach ($photos as $photo) {
                echo "<img src='" . htmlspecialchars($photo) . "' alt='Photo' style='width:100px; height:auto;'><br>";
            }
            echo "</li><hr>";
        }
        echo "</ul>";
    } else {
        echo "<h1>No results found for: " . htmlspecialchars($searchQuery) . "</h1>";
    }

    // Close the statement
    $stmt->close();
} else {
    echo "<h1>No search query provided.</h1>";
}
?>