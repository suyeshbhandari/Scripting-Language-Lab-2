<?php
$msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to      = trim($_POST['recipient']);
    $subject = trim($_POST['subject']);
    $message = trim($_POST['message']);
    
    // Set email headers for HTML content
    $headers  = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: admin@college.edu.np" . "\r\n";

    if (filter_var($to, FILTER_VALIDATE_EMAIL)) {
        // Suppressing errors with @ since local dev environments (XAMPP) lack configured SMTP sendmail
        if (@mail($to, $subject, nl2br($message), $headers)) {
            $msg = "<p style='color:green;'>Email successfully dispatched!</p>";
        } else {
            $msg = "<p style='color:orange;'>Mail function executed, but local SMTP transport server is not configured.</p>";
        }
    } else {
        $msg = "<p style='color:red;'>Invalid recipient email address.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><title>Send Email</title></head>
<body>
    <h2>Server Mail Notification Interface</h2>
    <?php echo $msg; ?>
    <form method="POST" action="">
        <label>Recipient Email:</label><br>
        <input type="email" name="recipient" required><br><br>
        
        <label>Subject:</label><br>
        <input type="text" name="subject" required><br><br>
        
        <label>Message Body:</label><br>
        <textarea name="message" rows="5" cols="40" required></textarea><br><br>
        
        <input type="submit" value="Send Email">
    </form>
</body>
</html>