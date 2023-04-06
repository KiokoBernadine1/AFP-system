<?php
session_start();

require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Start the session

$secret_key = $_ENV['SECRET_KEY'];
if (!$secret_key) {
    // The secret key variable is not defined in the .env file, so you should display an error message and exit the script
    echo 'Error: The secret key is not defined.';
    exit();
}

// Check if the user has submitted the form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the secret key entered by the user
    $entered_secret_key = $_POST['secret_key'];

    // Check if the entered secret key matches the one defined in the .env file
    if ($entered_secret_key === $secret_key) {
        // If the secret key is correct, redirect the user to the admin registration page
        $_SESSION['authenticated'] = true;
        header('Location: admin/register.php?error=adminverified');
        exit();
    } else {
        // If the secret key is incorrect, display an error message
        $error_message = 'Invalid secret key. Please try again.';
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Admin Auth</title>
</head>

<body>
    <?php if (isset($error_message)) : ?>
        <p><?php echo $error_message; ?></p>
    <?php endif; ?>
    <form method="post">
        <label for="secret_key">Enter the admin secret key:</label>
        <input type="password" id="secret_key" name="secret_key">
        <button type="submit">Submit</button>
    </form>
</body>

</html>