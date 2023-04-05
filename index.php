<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>AFPS</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
</head>

<body>
    <header>
        <nav class="navbar">
            <ul>
                <li><a href="/index.php">Home</a></li>
                <?php if (isset($_SESSION['passengerId'])) {
                    echo '<li><a href="/auth/logout.php">Log out</a></li>';
                } elseif (isset($_SESSION['adminId'])) {
                    echo '<li><a href="/admin/panel.php">Panel</a></li>';
                    echo '<li><a href="/admin/balances.php">Balances</a></li>';
                    echo '<li><a href="/admin/route.php">Routes</a></li>';
                    echo '<li><a href="/auth/logout.php">Log out</a></li>';
                } else {
                    echo '<li><a href="/passenger/login.php">Log In (Passenger)</a></li>';
                }
                ?>
            </ul>
        </nav>
    </header>

    <h1 class="page-header">Home Page</h1>

    <main>

    </main>
    <footer>
        <p>&copy; 2023 Automated Fare Payment System. All rights reserved.</p>
    </footer>
</body>

</html>