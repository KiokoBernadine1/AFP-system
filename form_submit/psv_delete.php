<?php
// Check if the delete button has been clicked
if (isset($_POST["psvtodelete"])) {
    // Get the route ID from the hidden input field
    $psv_id = $_POST["psvtodelete"];

    require "../db_conn.php";

    // Build the SQL query to delete the route
    $sql = "DELETE FROM psvs WHERE psv_id = '$psv_id'";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        // Redirect to the same page to show the updated list of routes
        header('Location: ../admin/psv.php?success=psvdeleted');
        exit();
    } else {
        echo "Error deleting route: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
