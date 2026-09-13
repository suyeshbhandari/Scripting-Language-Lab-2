<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Simple Interest Calculator</title>
</head>
<body>
    <h2>Simple Interest Calculator</h2>
    <form method="POST" action="">
        <label>Principal Amount (P):</label><br>
        <input type="number" step="any" name="principal" required><br><br>
        
        <label>Time Period in Years (T):</label><br>
        <input type="number" step="any" name="time" required><br><br>
        
        <label>Annual Rate of Interest in % (R):</label><br>
        <input type="number" step="any" name="rate" required><br><br>
        
        <input type="submit" name="calculate" value="Calculate Interest">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['calculate'])) {
        $p = floatval($_POST['principal']);
        $t = floatval($_POST['time']);
        $r = floatval($_POST['rate']);

        if ($p > 0 && $t > 0 && $r > 0) {
            $interest = ($p * $t * $r) / 100;
            $totalAmount = $p + $interest;

            echo "<h3>Calculation Results:</h3>";
            echo "Principal: NPR " . number_format($p, 2) . "<br>";
            echo "Time: $t years<br>";
            echo "Rate: $r %<br>";
            echo "<strong>Simple Interest (I): NPR " . number_format($interest, 2) . "</strong><br>";
            echo "<strong>Total Payable Amount: NPR " . number_format($totalAmount, 2) . "</strong>";
        } else {
            echo "<p style='color:red;'>Please enter valid positive numbers for all parameters.</p>";
        }
    }
    ?>
</body>
</html>