<?php
// Database configuration
$host = "localhost";
$user = "root";
$pass = "";
$db   = "bca_lab";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

/*
SQL Schema to run once in phpMyAdmin:
CREATE TABLE IF NOT EXISTS ranks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    rank INT NOT NULL,
    status ENUM('active', 'inactive') DEFAULT 'active',
    image VARCHAR(255),
    created_by VARCHAR(100),
    updated_by VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
*/

// CREATE
if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $rank = $_POST['rank'];
    $status = $_POST['status'];
    $created_by = "Admin";

    $stmt = $conn->prepare("INSERT INTO ranks (name, rank, status, created_by) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("siss", $name, $rank, $status, $created_by);
    $stmt->execute();
}

// DELETE
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $stmt = $conn->prepare("DELETE FROM ranks WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
}

// READ ALL
$result = $conn->query("SELECT * FROM ranks ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rank CRUD Operations</title>
    <style>
        table { border-collapse: collapse; width: 100%; font-family: Arial; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background: #eee; }
    </style>
</head>
<body>
    <h2>Add New Record</h2>
    <form method="POST">
        <input type="text" name="name" placeholder="Name" required>
        <input type="number" name="rank" placeholder="Rank" required>
        <select name="status">
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
        </select>
        <button type="submit" name="add">Create</button>
    </form>

    <h2>Database Records</h2>
    <table>
        <tr>
            <th>ID</th><th>Name</th><th>Rank</th><th>Status</th><th>Created By</th><th>Actions</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo htmlspecialchars($row['name']); ?></td>
            <td><?php echo $row['rank']; ?></td>
            <td><?php echo $row['status']; ?></td>
            <td><?php echo $row['created_by']; ?></td>
            <td>
                <a href="?delete=<?php echo $row['id']; ?>" onclick="return confirm('Delete this record?')">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>