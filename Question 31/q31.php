<?php
$conn = new mysqli("localhost", "root", "", "bca_lab");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

/*
SQL Table Schemas:
CREATE TABLE IF NOT EXISTS courses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL
);

CREATE TABLE IF NOT EXISTS students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    course_id INT,
    FOREIGN KEY (course_id) REFERENCES courses(id) ON DELETE CASCADE
);
*/

// CREATE COURSE
if (isset($_POST['add_course'])) {
    $stmt = $conn->prepare("INSERT INTO courses (title) VALUES (?)");
    $stmt->bind_param("s", $_POST['course_title']);
    $stmt->execute();
}

// CREATE STUDENT
if (isset($_POST['add_student'])) {
    $stmt = $conn->prepare("INSERT INTO students (name, email, course_id) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $_POST['student_name'], $_POST['student_email'], $_POST['course_id']);
    $stmt->execute();
}

// DELETE STUDENT
if (isset($_GET['delete_student'])) {
    $stmt = $conn->prepare("DELETE FROM students WHERE id = ?");
    $stmt->bind_param("i", $_GET['delete_student']);
    $stmt->execute();
}

// READ COURSES & STUDENTS
$courses = $conn->query("SELECT * FROM courses");
$students = $conn->query("SELECT students.id, students.name, students.email, courses.title AS course_name FROM students LEFT JOIN courses ON students.course_id = courses.id");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Relational CRUD - Courses & Students</title>
    <style>table, th, td { border: 1px solid black; border-collapse: collapse; padding: 6px; }</style>
</head>
<body>
    <h2>1. Add Course</h2>
    <form method="POST">
        <input type="text" name="course_title" placeholder="Course Title" required>
        <button type="submit" name="add_course">Add Course</button>
    </form>

    <h2>2. Add Student</h2>
    <form method="POST">
        <input type="text" name="student_name" placeholder="Student Name" required>
        <input type="email" name="student_email" placeholder="Student Email" required>
        <select name="course_id" required>
            <option value="">Select Course</option>
            <?php while($c = $courses->fetch_assoc()): ?>
                <option value="<?php echo $c['id']; ?>"><?php echo htmlspecialchars($c['title']); ?></option>
            <?php endwhile; ?>
        </select>
        <button type="submit" name="add_student">Add Student</button>
    </form>

    <h2>3. Student List (Relational Data)</h2>
    <table>
        <tr><th>ID</th><th>Name</th><th>Email</th><th>Enrolled Course</th><th>Action</th></tr>
        <?php while($s = $students->fetch_assoc()): ?>
        <tr>
            <td><?php echo $s['id']; ?></td>
            <td><?php echo htmlspecialchars($s['name']); ?></td>
            <td><?php echo htmlspecialchars($s['email']); ?></td>
            <td><?php echo htmlspecialchars($s['course_name']); ?></td>
            <td><a href="?delete_student=<?php echo $s['id']; ?>" onclick="return confirm('Delete?')">Delete</a></td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>