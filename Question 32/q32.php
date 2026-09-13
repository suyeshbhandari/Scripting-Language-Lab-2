<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Interactive Mark Sheet</title>
    <style>
        table { border-collapse: collapse; width: 60%; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 8px; text-align: center; }
        th { background: #dedede; }
        .pass { color: green; font-weight: bold; }
        .fail { color: red; font-weight: bold; }
    </style>
</head>
<body>
    <h2>Enter Subject Marks</h2>
    <form method="POST">
        <label>Student Name: </label><input type="text" name="name" required><br><br>
        <label>Roll Number: </label><input type="number" name="roll" required><br><br>
        
        <label>Web Tech II: </label><input type="number" name="web" min="0" max="100" required><br><br>
        <label>DBMS: </label><input type="number" name="dbms" min="0" max="100" required><br><br>
        <label>DSA: </label><input type="number" name="dsa" min="0" max="100" required><br><br>
        <label>Economics: </label><input type="number" name="eco" min="0" max="100" required><br><br>
        <label>Account: </label><input type="number" name="acc" min="0" max="100" required><br><br>
        
        <input type="submit" name="generate" value="Generate Mark Sheet">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['generate'])) {
        $name = htmlspecialchars($_POST['name']);
        $roll = $_POST['roll'];
        $marks = [
            "Web Tech II" => $_POST['web'],
            "DBMS"        => $_POST['dbms'],
            "DSA"         => $_POST['dsa'],
            "Economics"   => $_POST['eco'],
            "Account"     => $_POST['acc']
        ];

        $total = array_sum($marks);
        $percentage = $total / count($marks);
        $isPass = true;

        foreach ($marks as $subject => $mark) {
            if ($mark < 40) {
                $isPass = false;
                break;
            }
        }
        $status = $isPass ? "PASS" : "FAIL";
        $statusClass = $isPass ? "pass" : "fail";

        echo "<h3>Academic Mark Sheet</h3>";
        echo "<strong>Student:</strong> $name | <strong>Roll No:</strong> $roll";
        echo "<table>";
        echo "<tr><th>Subject</th><th>Full Marks</th><th>Pass Marks</th><th>Obtained Marks</th></tr>";
        foreach ($marks as $sub => $score) {
            echo "<tr><td>$sub</td><td>100</td><td>40</td><td>$score</td></tr>";
        }
        echo "<tr><th colspan='3'>Total Marks</th><td><strong>$total / 500</strong></td></tr>";
        echo "<tr><th colspan='3'>Percentage</th><td><strong>" . number_format($percentage, 2) . "%</strong></td></tr>";
        echo "<tr><th colspan='3'>Final Result</th><td class='$statusClass'>$status</td></tr>";
        echo "</table>";
    }
    ?>
</body>
</html>