<?php
include 'db.php';

if (isset($_GET['q'])) {
    $query = $conn->real_escape_string($_GET['q']);
    $sql = "SELECT * FROM places WHERE name LIKE '%$query%' OR description LIKE '%$query%'";
    $result = $conn->query($sql);
    
    $places = [];
    while ($row = $result->fetch_assoc()) {
        $places[] = $row;
    }
    echo json_encode($places);
}
$conn->close();
?>
