<?php
session_start();
// check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // get the user inputs
  $username_email = $_POST["username_email"];
  $password = $_POST["password"];

  require "../db_conn.php";

  // query the database to retrieve the user information
  $query = "SELECT * FROM admins WHERE username='$username_email' OR email='$username_email'";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) > 0) {
    // if user exists, retrieve the password hash from the database and verify the password
    $row = mysqli_fetch_assoc($result);
    $hashed_password = $row["password"];
    if (password_verify($password, $hashed_password)) {
      // if password is correct, log the user in
      $_SESSION['adminId'] = $row["admin_id"];
      $_SESSION['adminUsername'] = $row["username"];
      header("location: ../admin/panel.php?success=successfullogin");
    } else {
      // if password is incorrect, display an error message
      header("location: ../admin/login.php?error=invalidcredentials");
    }
  } else {
    // if user does not exist, display an error message
    header("location: ../admin/login.php?error=invalidcredentials");
  }

  // close the database connection
  mysqli_close($conn);
}
