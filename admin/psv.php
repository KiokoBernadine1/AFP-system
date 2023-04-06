<?php
session_start();
if (!isset($_SESSION['adminId'])) {
    header("location: ../index.php?error=notadmin");
}

require "../db_conn.php";

// SELECT query to fetch all routes
$sql = "SELECT * FROM psvs";
$psv_result = mysqli_query($conn, $sql);

// SELECT query to fetch all routes
$sql = "SELECT * FROM routes";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>

<head>
    <title>PSVs</title>
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

    <h1 class="page-header">PSVs Panel</h1>

    <main>

        <table class="route-table">
            <tbody>
                <tr class="route-table-headers">
                    <th scope="col">ID</th>
                    <th scope="col">Make</th>
                    <th scope="col">Model</th>
                    <th scope="col">Route</th>
                    <th scope="col">Actions</th>
                </tr>
                <?php foreach ($psv_result as $row) : ?>
                    <tr>
                        <td><?php echo $row["psv_id"] ?></td>
                        <td><?php echo $row["make"] ?></td>
                        <td><?php echo $row["model"] ?></td>
                        <td><?php echo $row["route_name"] ?></td>
                        <td>
                            <form action="/form_submit/psv_delete.php" method="post">
                                <input type="hidden" name="psvtodelete" value="<?php echo $row["psv_id"] ?>">
                                <button class="route-delete" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>


        <h3 id="new-route-title">New PSV</h3>
        <form id="route-form" action="/form_submit/psv_create.php" method="post">
            <div id="input-group">
                <input class="route-input" type="text" id="psv_id" name="psv_id" required placeholder="ID">
                <input class="route-input" type="text" id="make" name="make" required placeholder="Make">
                <input class="route-input" type="text" id="model" name="model" required placeholder="Model">
                <select name="route_name" class="route-input">
                    <?php foreach ($result as $row) : ?>
                        <option value="<?php echo $row["route_name"]; ?>">
                            <?php echo $row["route_name"]; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <input id="route-submit" type="submit" value="Submit">
            </div>
        </form>

    </main>
    <footer>
        <p>&copy; 2023 Automated Fare Payment System. All rights reserved.</p>
    </footer>
</body>

</html>