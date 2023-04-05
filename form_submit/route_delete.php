<?php
// Check if the delete button has been clicked
if (isset($_POST["routetodelete"])) {
    // Get the route ID from the hidden input field
    $route_id = $_POST["routetodelete"];

    require "../db_conn.php";

    // Build the SQL query to delete the route
    $sql = "DELETE FROM routes WHERE route_id = $route_id";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        // Redirect to the same page to show the updated list of routes
        header('Location: ../admin/route.php?success=routedeleted');
        exit();
    } else {
        echo "Error deleting route: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
