<?php

session_start();
// unset specific session variables
unset($_SESSION['adminId']);
unset($_SESSION['adminUsername']);
unset($_SESSION['authenticated']);

header("location: /index.php?success=adminlogout");
exit();
