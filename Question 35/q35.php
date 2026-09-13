<?php
$filepath = "lab_sample.txt";
$status = "";

// 1. Write File
if (isset($_POST['write'])) {
    $content = $_POST['file_content'];
    $handle = fopen($filepath, "w");
    if ($handle) {
        fwrite($handle, $content);
        fclose($handle);
        $status = "File created and written successfully.";
    }
}

// 2. Read File
$fileData = "";
if (isset($_POST['read'])) {
    if (file_exists($filepath)) {
        $fileData = file_get_contents($filepath);
        $status = "File read successfully.";
    } else {
        $status = "File does not exist!";
    }
}

// 3. Rename File
if (isset($_POST['rename'])) {
    $newName = $_POST['new_name'];
    if (file_exists($filepath)) {
        rename($filepath, $newName);
        $filepath = $newName;
        $status = "File renamed to '$newName'.";
    }
}

// 4. Change Permissions
if (isset($_POST['chmod'])) {
    if (file_exists($filepath)) {
        chmod($filepath, 0644); // Read/write for owner, read for others
        $status = "Permissions updated to 0644 for '$filepath'.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><title>File Operations</title></head>
<body>
    <h2>File System Operations Manager</h2>
    <p><strong>Status:</strong> <?php echo $status; ?></p>

    <form method="POST">
        <h3>Write to File</h3>
        <textarea name="file_content" rows="4" cols="50" placeholder="Enter text here..."></textarea><br>
        <button type="submit" name="write">Create / Write File</button>
    </form>
    <hr>

    <form method="POST">
        <h3>Read File</h3>
        <button type="submit" name="read">Read File Content</button>
        <?php if ($fileData): ?>
            <pre style="background: #f0f0f0; padding: 10px;"><?php echo htmlspecialchars($fileData); ?></pre>
        <?php endif; ?>
    </form>
    <hr>

    <form method="POST">
        <h3>Rename File</h3>
        <input type="text" name="new_name" placeholder="new_filename.txt" required>
        <button type="submit" name="rename">Rename</button>
    </form>
    <hr>

    <form method="POST">
        <h3>Check & Update Permissions</h3>
        <?php 
            if (file_exists($filepath)) {
                echo "Current permissions: " . substr(sprintf('%o', fileperms($filepath)), -4) . "<br><br>";
            }
        ?>
        <button type="submit" name="chmod">Set standard permissions (0644)</button>
    </form>
</body>
</html>