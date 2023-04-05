<?php
session_start();

require "../db_conn.php";

if (isset($_POST['route_name']) && isset($_POST['destination']) && isset($_POST['cost'])) {
  $route_name = $_POST['route_name'];
  $destination = $_POST['destination'];
  $cost = $_POST['cost'];
  $admin = $_POST['admin'];

  // Check if the route_name in combination with destination do not exist in the database already
  $sql = "SELECT * FROM routes WHERE route_name = '$route_name' AND destination = '$destination'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    // Route already exists, redirect to error page
    header('Location: ../admin/route.php?error=routeexists');
    exit;
  } else {
    // Route does not exist, insert new route into the database
    $sql = "INSERT INTO routes (admin, route_name, destination, cost) VALUES ('$admin', '$route_name', '$destination', '$cost')";
    mysqli_query($conn, $sql);

    // Redirect to admin/route.php page
    header('Location: ../admin/route.php?error=routecreated');
    exit;
  }
}

// Close mysqli connection
mysqli_close($conn);
