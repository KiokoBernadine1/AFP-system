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
                    echo '<li><a href="/passenger/transactions.php">Transaction History</a></li>';
                    echo '<li><a href="/passenger/booking.php">Book a Journey</a></li>';
                    echo '<li><a href="/auth/passenger_logout.php">Log out</a></li>';
                } elseif (isset($_SESSION['adminId'])) {
                    echo '<li><a href="/admin/transactions.php">Transactions</a></li>';
                    echo '<li><a href="/admin/balances.php">Balances</a></li>';
                    echo '<li><a href="/admin/route.php">Routes</a></li>';
                    echo '<li><a href="/auth/admin_logout.php">Log out</a></li>';
                } else {
                    echo '<li><a href="/passenger/login.php">Log In (Passenger)</a></li>';
                    echo '<li><a href="/passenger/register.php">Register (Passenger)</a></li>';
                    echo '<li><a href="/admin/login.php">Log In (admin)</a></li>';
                }
                ?>
            </ul>
        </nav>
    </header>

    <h1 class="page-header">Home Page</h1>

    <main class="container">
        <p class="info-paragraph">Our fare booking system is a convenient and easy-to-use platform for booking fares for multiple tickets to various destinations. With our system, you can easily register and login to book fares, view your balances, and keep track of your transaction histories.</p>

        <h2 class="info-header">Our Mission</h2>
        <p class="info-paragraph">Our mission is to provide a user-friendly platform that simplifies the process of booking fares for passengers. We strive to offer a seamless experience for all users, with a focus on security, reliability, and accessibility.</p>

        <h2 class="info-header">Features</h2>
        <p class="info-paragraph">Our fare booking system offers the following features:</p>
        <ul class="info-list">
            <li class="info-list-item">Easy registration and login process</li>
            <li class="info-list-item">Booking fares for multiple tickets to various destinations</li>
            <li class="info-list-item">Viewing balances and transaction histories</li>
        </ul>

        <h2 class="info-header">Our Team</h2>
        <p class="info-paragraph">Our team consists of experienced developers who are passionate about creating innovative solutions for the travel industry. We are dedicated to providing top-quality services and support to all our users.</p>

        <h2 class="info-header">Contact Us</h2>
        <p class="info-paragraph">If you have any questions or concerns about our fare booking system, please don't hesitate to contact us. You can reach us via email at support@farebookingsystem.com, or by phone at 555-1234.</p>
    </main>
    <footer>
        <p>&copy; 2023 Automated Fare Payment System. All rights reserved.</p>
    </footer>
</body>

</html>