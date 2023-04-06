<?php
session_start();
if (!isset($_SESSION['passengerId'])) {
    header("location: ../index.php?error=notpassenger");
}

require "../db_conn.php";
// SELECT query to fetch balance
$passenger = $_SESSION['passengerUsername'];
$sql = "SELECT balance FROM accounts WHERE passenger='$passenger'";
$results = mysqli_query($conn, $sql);
$accounts = mysqli_fetch_assoc($results);
$balance = $accounts['balance'];

// SELECT query to fetch all routes
$sql = "SELECT * FROM routes";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html>

<head>
    <title>Booking</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/css/style.css">

</head>

<body>
    <header>
        <nav class="navbar">
            <ul>
                <li><a href="/index.php">Home</a></li>
                <li><a href="/passenger/transactions.php">Transaction History</a></li>
                <li><a href="/passenger/booking.php">Book a Journey</a></li>
                <li><a href="/auth/passenger_logout.php">Log out</a></li>
            </ul>
        </nav>
    </header>

    <h1 class="page-header">Book a Journey</h1>
    <h3>
        Your Balance is <?php echo $balance; ?>
    </h3>

    <main>

        <form id="booking-table" action="/form_submit/book_journey.php" method="post">
            <label for="route">Route:</label>
            <select name="route" class="book-select">
                <?php foreach ($result as $row) : ?>
                    <option value="<?php echo $row["route_id"]; ?>">
                        <?php echo $row["route_name"] . " - " . $row["destination"] . " at Ksh." . $row["cost"]  . " per ticket."; ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <label for="no_of_seats">Seats:</label>
            <select name="no_of_seats" class="book-select">
                <option value="1">1 Seat</option>
                <option value="2">2 Seats</option>
                <option value="3">3 Seats</option>
                <option value="4">4 Seats</option>
            </select>
            <input type="hidden" value="<?php echo $balance; ?>" name="balance">
            <button id="book-button" type="submit">Book</button>
        </form>

    </main>
    <footer>
        <p>&copy; 2023 Automated Fare Payment System. All rights reserved.</p>
    </footer>
</body>

</html>