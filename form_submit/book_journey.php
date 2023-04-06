<?php

session_start();

require "../db_conn.php";

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  // Get the form data
  $route_id = $_POST['route'];
  $balance = $_POST['balance'];
  $no_of_seats = $_POST['no_of_seats'];
  $passenger = $_SESSION["passengerUsername"];

  // SELECT query to fetch the selected route
  $sql = "SELECT * FROM routes WHERE route_id = '$route_id'";
  $result = mysqli_query($conn, $sql);

  // Check if the query returned any result
  if (mysqli_num_rows($result) > 0) {
    // Get the route data
    $row = mysqli_fetch_assoc($result);
    $route_name = $row["route_name"];
    $destination = $row["destination"];
    $cost_per_seat = $row["cost"];
    $total_cost = $no_of_seats * $cost_per_seat;
    $final_balance = $balance - $total_cost;

    if ($final_balance < 0) {
      header('Location: ../passenger/booking.php?error=insufficientbalance');
      exit();
    }

    // Insert the data into the transactions table
    $sql2 = "INSERT INTO transactions (passenger, route_name, destination, cost_per_seat, no_of_seats, total_cost) VALUES ('$passenger', '$route_name', '$destination', '$cost_per_seat', '$no_of_seats', '$total_cost')";

    if (mysqli_query($conn, $sql2)) {
      // Insert the data into the transactions table
      $sql3 = "UPDATE `accounts` SET `balance` = $final_balance WHERE `accounts`.`passenger` = '$passenger'";

      if (mysqli_query($conn, $sql3)) {
        // Redirect to the same page to show the updated list of routes
        header('Location: ../passenger/booking.php?success=transactionadded');
        exit();
      }
      header('Location: ../passenger/booking.php?success=transactionadded');
      exit();
    } else {
      echo "Error making transaction: " . mysqli_error($conn);
    }
  } else {
    echo "Error: Route not found.";
  }

  // Close the database connection
  mysqli_close($conn);
}
