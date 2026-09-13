<?php
$msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES['cv'])) {
    $file = $_FILES['cv'];
    $fileName = $file['name'];
    $fileSize = $file['size'];
    $fileTmp  = $file['tmp_name'];
    
    $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    $allowed = ['pdf', 'doc', 'docx'];

    if (!in_array($fileExt, $allowed)) {
        $msg = "<p style='color:red;'>Invalid file type! Only PDF and DOC/DOCX files are allowed.</p>";
    } elseif ($fileSize > 1048576) { // 1 MB = 1048576 bytes
        $msg = "<p style='color:red;'>File size exceeds limit! Maximum size is 1 MB.</p>";
    } else {
        $uploadDir = "uploads/";
        if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);
        
        $destination = $uploadDir . time() . "_" . basename($fileName);
        if (move_uploaded_file($fileTmp, $destination)) {
            $msg = "<p style='color:green;'>CV uploaded successfully!</p>";
        } else {
            $msg = "<p style='color:red;'>Failed to upload file.</p>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><title>Upload CV</title></head>
<body>
    <h2>CV Document Uploader</h2>
    <?php echo $msg; ?>
    <form method="POST" enctype="multipart/form-data">
        <label>Select CV (PDF, DOC, DOCX < 1MB):</label><br><br>
        <input type="file" name="cv" required><br><br>
        <input type="submit" value="Upload CV">
    </form>
</body>
</html>