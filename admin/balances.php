<?php
session_start();
if (!isset($_SESSION['adminId'])) {
    header("location: ../index.php?error=notadmin");
}

require "../db_conn.php";

// SELECT query to fetch all routes
$sql = "SELECT account_id, passenger, balance FROM accounts";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Balances</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
</head>

<body>
    <header>
        <nav class="navbar">
            <ul>
                <li><a href="/index.php">Home</a></li>
                <li><a href="/admin/transactions.php">Transactions</a></li>
                <li><a href="/admin/balances.php">Balances</a></li>
                <li><a href="/admin/route.php">Routes</a></li>
                <li><a href="/admin/psv.php">PSVs</a></li>
                <li><a href="/auth/admin_logout.php">Log out</a></li>
            </ul>
        </nav>
    </header>

    <h1 class="page-header">Balance Panel</h1>

    <main>

        <table class="balances-table">
            <tbody>
                <tr class="balance-table-headers">
                    <th scope="col">Passenger</th>
                    <th scope="col">Balance</th>
                    <th scope="col">Add Deposit</th>
                </tr>
                <?php foreach ($result as $row) : ?>
                    <tr>
                        <td><?php echo $row["passenger"] ?></td>
                        <td><?php echo $row["balance"] ?></td>
                        <td>
                            <form action="/form_submit/balance_update.php" method="post">
                                <input type="hidden" name="accounttoupdate" value='<?php echo $row["account_id"] ?>'>
                                <input type="text" name="deposit" id="deposit" placeholder="Enter deposit ammount">
                                <button class="" type="submit">Update</button>
                            </form>
                        </td>
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