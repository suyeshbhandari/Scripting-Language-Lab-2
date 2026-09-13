<?php
$msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES['profile_image'])) {
    $file = $_FILES['profile_image'];
    $fileName = $file['name'];
    $fileSize = $file['size'];
    $fileTmp  = $file['tmp_name'];
    
    $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    $allowed = ['png', 'jpg', 'jpeg'];

    if (!in_array($fileExt, $allowed)) {
        $msg = "<p style='color:red;'>Invalid format! Only PNG and JPEG/JPG are allowed.</p>";
    } elseif ($fileSize > 512000) { // 500 KB = 512000 bytes
        $msg = "<p style='color:red;'>Image size exceeds 500 KB limit!</p>";
    } else {
        $uploadDir = "avatars/";
        if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);
        
        $destination = $uploadDir . time() . "_" . basename($fileName);
        if (move_uploaded_file($fileTmp, $destination)) {
            $msg = "<p style='color:green;'>Profile image uploaded successfully!</p>";
        } else {
            $msg = "<p style='color:red;'>Upload failed.</p>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><title>Upload Profile Image</title></head>
<body>
    <h2>Profile Image Uploader</h2>
    <?php echo $msg; ?>
    <form method="POST" enctype="multipart/form-data">
        <label>Select Avatar (PNG/JPEG < 500KB):</label><br><br>
        <input type="file" name="profile_image" required><br><br>
        <input type="submit" value="Upload Image">
    </form>
</body>
</html>