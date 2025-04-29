<html>
    <body>
<form class="lg-0" action="searchop.php" method="POST">
    <input class="sm-2" type="search" name="search_query" placeholder="Search For Place." aria-label="Search" required>
    <button class="sm-0" type="submit">Search</button>
</form>
</body>
</html>
<style>
    body{
        background-image:url("th.jpeg.jpg");
    }
    /* General styles for the search form */
.lg-0 {
    display: flex; /* Use flexbox for alignment */
    justify-content: center; /* Center the form horizontally */
    align-items: center; /* Center the form vertically */
    margin: 20px 0; /* Add some margin above and below the form */
}

/* Style for the search input */
.sm-2 {
    padding: 10px; /* Add padding for better touch targets */
    border: 1px solid #ccc; /* Light gray border */
    border-radius: 5px; /* Rounded corners */
    font-size: 16px; /* Font size */
    width: 300px; /* Set a fixed width */
    transition: border-color 0.3s; /* Smooth transition for border color */
}

/* Change border color on focus */
.sm-2:focus {
    border-color: #007BFF; /* Change border color on focus */
    outline: none; /* Remove default outline */
}

/* Style for the search button */
.sm-0 {
    padding: 10px 15px; /* Add padding for the button */
    background-color: #007BFF; /* Bootstrap primary color */
    color: white; /* White text color */
    border: none; /* Remove default border */
    border-radius: 5px; /* Rounded corners */
    font-size: 16px; /* Font size */
    cursor: pointer; /* Change cursor to pointer */
    margin-left: 10px; /* Space between input and button */
    transition: background-color 0.3s; /* Smooth transition for background color */
}

/* Change background color on hover */
.sm-0:hover {
    background-color: #0056b3; /* Darker shade on hover */
}

/* Change background color on active */
.sm-0:active {
    background-color: #004085; /* Even darker shade on active */
}
    </style>