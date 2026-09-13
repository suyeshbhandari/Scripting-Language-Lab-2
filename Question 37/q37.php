<?php
$errors = [];
$formData = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $formData['name']     = trim($_POST['name']);
    $formData['user']     = trim($_POST['user']);
    $formData['email']    = trim($_POST['email']);
    $formData['phone']    = trim($_POST['phone']);
    $formData['url']      = trim($_POST['url']);
    $formData['password'] = $_POST['password'];

    // 1. Name Check (Alphabet characters and spaces only)
    if (!preg_match("/^[a-zA-Z\s]+$/", $formData['name'])) {
        $errors[] = "Name must contain letters and spaces only.";
    }

    // 2. Username Check (Alphanumeric and underscores)
    if (!preg_match("/^[a-zA-Z0-9_]+$/", $formData['user'])) {
        $errors[] = "Username can only contain alphanumeric characters and underscores.";
    }

    // 3. Email Check
    if (!filter_var($formData['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Enter a valid email address.";
    }

    // 4. Phone Check (Nepal standard: 10 digits starting with 98, 97, or 96)
    if (!preg_match("/^(98|97|96)\d{8}$/", $formData['phone'])) {
        $errors[] = "Phone must be a valid 10-digit mobile number starting with 98, 97, or 96.";
    }

    // 5. Website URL Check
    if (!filter_var($formData['url'], FILTER_VALIDATE_URL)) {
        $errors[] = "Enter a valid URL address (e.g. https://example.com).";
    }

    // 6. Strong Password Check (Min 8 characters, 1 uppercase, 1 lowercase, 1 number, 1 special character)
    $passPattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/";
    if (!preg_match($passPattern, $formData['password'])) {
        $errors[] = "Password must be at least 8 characters long and contain uppercase, lowercase, number, and special character.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration Validation Engine</title>
    <style>.err { color: red; margin: 2px 0; } .success { color: green; font-weight: bold; }</style>
</head>
<body>
    <h2>User Registration Engine</h2>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <?php if (!empty($errors)): ?>
            <div style="border: 1px solid red; padding: 10px; margin-bottom: 15px;">
                <?php foreach ($errors as $e) echo "<p class='err'>• $e</p>"; ?>
            </div>
        <?php else: ?>
            <p class="success">All fields passed validation successfully!</p>
        <?php endif; ?>
    <?php endif; ?>

    <form method="POST" action="">
        <label>Full Name:</label><br>
        <input type="text" name="name" value="<?php echo htmlspecialchars($formData['name'] ?? ''); ?>" required><br><br>

        <label>Username:</label><br>
        <input type="text" name="user" value="<?php echo htmlspecialchars($formData['user'] ?? ''); ?>" required><br><br>

        <label>Email Address:</label><br>
        <input type="email" name="email" value="<?php echo htmlspecialchars($formData['email'] ?? ''); ?>" required><br><br>

        <label>Phone Number:</label><br>
        <input type="text" name="phone" value="<?php echo htmlspecialchars($formData['phone'] ?? ''); ?>" required><br><br>

        <label>Website URL:</label><br>
        <input type="text" name="url" value="<?php echo htmlspecialchars($formData['url'] ?? ''); ?>" required><br><br>

        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>

        <input type="submit" value="Submit Form">
    </form>
</body>
</html>