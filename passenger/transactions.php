<?php
session_start();
if (!isset($_SESSION['passengerId'])) {
    header("location: ../index.php?error=notpassenger");
}

require "../db_conn.php";

// SELECT query to fetch all routes
$passenger = $_SESSION['passengerUsername'];
$sql = "SELECT * FROM transactions WHERE passenger='$passenger'";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>

<head>
    <title>History</title>
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

    <h1 class="page-header">Transaction History</h1>

    <main>

        <table class="route-table">
            <tbody>
                <tr class="route-table-headers">
                    <th scope="col">Route</th>
                    <th scope="col">Destination</th>
                    <th scope="col">Cost</th>
                    <th scope="col">Seats</th>
                    <th scope="col">Total</th>
                </tr>
                <?php foreach ($result as $row) : ?>
                    <tr>
                        <td><?php echo $row["route_name"] ?></td>
                        <td><?php echo $row["destination"] ?></td>
                        <td><?php echo $row["cost_per_seat"] ?></td>
                        <td><?php echo $row["no_of_seats"] ?></td>
                        <td><?php echo $row["total_cost"] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>


    </main>
    <footer>
        <p>&copy; 2023 Automated Fare Payment System. All rights reserved.</p>
    </footer>
</body>

</html>