<?php
session_start();
if (!isset($_SESSION['adminId'])) {
    header("location: ../index.php?error=notadmin");
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Admin Panel</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
</head>

<body>
    <header>
        <nav class="navbar">
            <ul>
                <li><a href="/index.php">Home</a></li>
                    <li><a href="/admin/panel.php">Panel</a></li>
                    <li><a href="/admin/balances.php">Balances</a></li>
                    <li><a href="/admin/route.php">Routes</a></li>
                    <li><a href="/auth/logout.php">Log out</a></li>
            </ul>
        </nav>
    </header>

    <h1 class="page-header">Admin Panel</h1>

    <main>

    </main>
    <footer>
        <p>&copy; 2023 Automated Fare Payment System. All rights reserved.</p>
    </footer>
</body>

</html>