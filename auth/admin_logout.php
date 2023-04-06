<?php

session_start();
// unset specific session variables
unset($_SESSION['adminId']);
unset($_SESSION['adminUsername']);

header("location: /index.php?success=adminlogout");
exit();
