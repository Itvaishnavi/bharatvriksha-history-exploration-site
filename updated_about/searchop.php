<?php
include("conn.php");

if (isset($_POST['search_query'])) {
    // Sanitize the search query
    $searchQuery = mysqli_real_escape_string($conn, $_POST['search_query']);
    
    // Redirect to show_result.php with the search query as a GET parameter
    header("Location: show_result.php?query=" . urlencode($searchQuery));
    exit();
} else {
    // If no search query is provided, redirect back to the main page or show an error
    header("Location: add.php"); // Change this to your main page
    exit();
}
?>