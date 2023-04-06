<?php
session_start();

// Check if the delete button has been clicked
if (isset($_SESSION['adminUsername'])) {
    $adminUsername = $_SESSION['adminUsername'];
    if (isset($_POST["accounttoupdate"])) {
        // Get the route ID from the hidden input field
        $account_id = $_POST["accounttoupdate"];
        $deposit = $_POST["deposit"];

        require "../db_conn.php";
        $sql = "SELECT balance FROM accounts WHERE account_id = $account_id";
        $result = mysqli_query($conn, $sql);

        // check if the query was successful
        if ($result) {
            // fetch the balance value
            $row = mysqli_fetch_assoc($result);
            $current_balance = $row['balance'];
        }

        $final_balance = $current_balance + $deposit;

        // Build the SQL query to delete the route
        $query = "UPDATE accounts SET balance = '$final_balance', admin = '$adminUsername' WHERE account_id = '$account_id'";
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
