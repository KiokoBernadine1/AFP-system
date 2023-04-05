<?php
session_start();

// Check if the delete button has been clicked
if (isset($_SESSION['adminUsername'])) {
    $adminUsername = $_SESSION['adminUsername'];
    if (isset($_POST["accounttoupdate"])) {
        // Get the route ID from the hidden input field
        $account_id = $_POST["accounttoupdate"];
        $balance = $_POST["balance"];

        require "../db_conn.php";

        // Build the SQL query to delete the route
        $query = "UPDATE accounts SET balance = '$balance', admin = '$adminUsername' WHERE account_id = '$account_id'";

        // Execute the query
        if ($conn->query($query) === TRUE) {
            // Redirect to the same page to show the updated list of routes
            header('Location: ../admin/balances.php?success=balanceupdated');
            exit();
        } else {
            echo "Error deleting route: " . $conn->error;
        }

        // Close the database connection
        $conn->close();
    }
} else {
    echo "you are not authorized";
}
