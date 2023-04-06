<?php
session_start();
if (!isset($_SESSION['adminId'])) {
    header("location: ../index.php?error=notadmin");
}

require "../db_conn.php";

// SELECT query to fetch all routes
$sql = "SELECT * FROM routes";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Routes</title>
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

    <h1 class="page-header">Route Panel</h1>

    <main>

        <table class="route-table">
            <tbody>
                <tr class="route-table-headers">
                    <th scope="col">Route</th>
                    <th scope="col">Destination</th>
                    <th scope="col">Cost</th>
                    <th scope="col">Actions</th>
                </tr>
                <?php foreach ($result as $row) : ?>
                    <tr>
                        <td><?php echo $row["route_name"] ?></td>
                        <td><?php echo $row["destination"] ?></td>
                        <td><?php echo $row["cost"] ?></td>
                        <td>
                            <form action="/form_submit/route_delete.php" method="post">
                                <input type="hidden" name="routetodelete" value="<?php echo $row["route_id"] ?>">
                                <button class="route-delete" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>


        <h3 id="new-route-title">New Route</h3>
        <form id="route-form" action="/form_submit/route_create.php" method="post">
            <div id="input-group">
                <input class="route-input" type="text" id="route_name" name="route_name" required placeholder="Route Name">
                <input class="route-input" type="text" id="destination" name="destination" required placeholder="Destination">
                <input class="route-input" type="number" id="cost" name="cost" required placeholder="Cost">
                <input type="hidden" name="admin" value="<?php echo $_SESSION['adminUsername']; ?>">
                <input id="route-submit" type="submit" value="Submit">
            </div>
        </form>

    </main>
    <footer>
        <p>&copy; 2023 Automated Fare Payment System. All rights reserved.</p>
    </footer>
</body>

</html>