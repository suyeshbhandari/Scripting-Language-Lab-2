<?php
session_start();

$message = "";

// Check if cookie exists to auto-fill username
$remembered_user = isset($_COOKIE['remember_user']) ? $_COOKIE['remember_user'] : "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $remember = isset($_POST['remember']);

    if ($username === "bca_user" && $password === "secret123") {
        $_SESSION['user'] = $username;

        if ($remember) {
            // Set cookie for 7 days
            setcookie('remember_user', $username, time() + (7 * 86400), "/");
        } else {
            // Clear existing cookie
            setcookie('remember_user', '', time() - 3600, "/");
        }
        $message = "<p style='color:green;'>Login successful. Session initiated!</p>";
    } else {
        $message = "<p style='color:red;'>Invalid Credentials.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Session & Cookie Login</title>
</head>
<body>
    <h2>Session & Cookie Login Engine</h2>
    <?php echo $message; ?>
    <?php if (isset($_SESSION['user'])): ?>
        <p>Logged in as: <strong><?php echo $_SESSION['user']; ?></strong></p>
        <a href="?logout=1">Logout</a>
        <?php 
            if (isset($_GET['logout'])) {
                session_destroy();
                header("Location: " . $_SERVER['PHP_SELF']);
                exit();
            }
        ?>
    <?php else: ?>
        <form method="POST" action="">
            <label>Username:</label><br>
            <input type="text" name="username" value="<?php echo htmlspecialchars($remembered_user); ?>"><br><br>
            <label>Password:</label><br>
            <input type="password" name="password"><br><br>
            <input type="checkbox" name="remember" <?php if ($remembered_user) echo "checked"; ?>>
            <label>Remember Me</label><br><br>
            <input type="submit" value="Login">
        </form>
    <?php endif; ?>
</body>
</html>