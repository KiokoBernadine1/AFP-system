<!DOCTYPE html>
<html>

<head>
    <title>Passenger Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
</head>

<body>
    <header>
        <nav class="navbar">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </nav>
    </header>

    <h1 class="page-header">Passenger Login</h1>

    <main>

        <form action="/auth/passenger_login.php" method="post">
            <label for="username_email">Username:</label>
            <input type="text" id="username_email" name="username_email">
            <br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password">
            <br>
            <input type="submit" value="Submit">
        </form>

        <div class="account-links">
            <a href="/passenger/register.php" class="create-account">Create an account</a>
        </div>

    </main>
    <footer>
        <p>&copy; 2023 Automated Fare Payment System. All rights reserved.</p>
    </footer>
</body>

</html>