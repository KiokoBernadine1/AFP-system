<?php
session_start();

require "../db_conn.php";

if (isset($_POST['route_name']) && isset($_POST['make']) && isset($_POST['model'])) {
    $psv_id = $_POST['psv_id'];
    $make = $_POST['make'];
    $model = $_POST['model'];
    $route_name = $_POST['route_name'];

  // Check if the route_name in combination with destination do not exist in the database already
  $sql = "SELECT * FROM psvs WHERE psv_id = '$psv_id'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    // Route already exists, redirect to error page
    header('Location: ../admin/psv.php?error=psvexists');
    exit;
  } else {
    // Route does not exist, insert new route into the database
    $sql = "INSERT INTO psvs (psv_id, make, model, route_name) VALUES ('$psv_id', '$make', '$model', '$route_name')";
    mysqli_query($conn, $sql);

    // Redirect to admin/route.php page
    header('Location: ../admin/psv.php?success=psvcreated');
    exit;
  }
}

// Close mysqli connection
mysqli_close($conn);
