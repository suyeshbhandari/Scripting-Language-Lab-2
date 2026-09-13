<?php
$errors = [];
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $email    = trim($_POST['email']);
    $dob      = trim($_POST['dob']);
    $phone    = trim($_POST['phone']);

    // a. Username minimum 8 characters
    if (strlen($username) < 8) {
        $errors[] = "Username must be at least 8 characters long.";
    }

    // b. Valid Email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Please enter a valid email address.";
    }

    // c. Validate Date of Birth (YYYY-MM-DD)
    $d = DateTime::createFromFormat('Y-m-d', $dob);
    if (!($d && $d->format('Y-m-d') === $dob)) {
        $errors[] = "Please select a valid Date of Birth.";
    }

    // d. Valid Phone length (10 digits)
    if (!preg_match("/^[0-9]{10}$/", $phone)) {
        $errors[] = "Phone number must contain exactly 10 numeric digits.";
    }

    if (empty($errors)) {
        $success = "<p style='color:green;'>User registration successfully validated and recorded!</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><title>User Registration</title></head>
<body>
    <h2>Registration Pipeline</h2>
    <?php 
    if (!empty($errors)) {
        foreach ($errors as $e) echo "<p style='color:red;'>$e</p>";
    }
    echo $success;
    ?>
    <form method="POST" action="">
        <label>Username (min 8 chars):</label><br>
        <input type="text" name="username"><br><br>
        
        <label>Email Address:</label><br>
        <input type="email" name="email"><br><br>
        
        <label>Date of Birth:</label><br>
        <input type="date" name="dob"><br><br>
        
        <label>Phone Number (10 digits):</label><br>
        <input type="text" name="phone"><br><br>
        
        <input type="submit" value="Register">
    </form>
</body>
</html>