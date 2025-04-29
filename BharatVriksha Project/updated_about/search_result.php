<?php
<link rel="stylesheet" href="add.css">
include("conn.php");

if (isset($_POST['search_query'])) {
    $searchQuery = $_POST['search_query'];

    // Prepare the SQL statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM review WHERE comment LIKE ?");
    $searchTerm = "%" . $searchQuery . "%"; // Use wildcards for partial matching
    $stmt->bind_param("s", $searchTerm); // "s" means string

    // Execute the statement
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if any results were returned
    if ($result->num_rows > 0) {
        echo "<h1>Search Results for: " . htmlspecialchars($searchQuery) . "</h1>";
        echo "<ul>";
        while ($row = $result->fetch_assoc()) {
            echo "<li><strong>Rating:</strong> " . htmlspecialchars($row['rate']) . " - <strong>Comment:</strong> " . htmlspecialchars($row['comment']) . "</li>";
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