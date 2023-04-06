<?php

session_start();
// unset specific session variables
unset($_SESSION['passengerId']);
unset($_SESSION['passengerUsername']);

header("location: /index.php?success=passengerlogout");
exit();
