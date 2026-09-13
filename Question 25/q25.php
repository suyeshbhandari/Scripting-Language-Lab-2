<?php
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Hardcoded credentials for validation test
    $valid_user = "admin";
    $valid_pass = "password123";

    if (empty($username) || empty($password)) {
        $message = "<p style='color:red;'>Both fields are required.</p>";
    } elseif ($username === $valid_user && $password === $valid_pass) {
        $message = "<p style='color:green;'>Login successful! Welcome, " . htmlspecialchars($username) . ".</p>";
    } else {
        $message = "<p style='color:red;'>Invalid username or password.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Validation</title>
</head>
<body>
    <h2>Login Form</h2>
    <?php echo $message; ?>
    <form method="POST" action="">
        <label>Username:</label><br>
        <input type="text" name="username"><br><br>
        <label>Password:</label><br>
        <input type="password" name="password"><br><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>