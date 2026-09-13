<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Nepal Income Tax Calculator</title>
</head>
<body>
    <h2>Nepal Government Income Tax Processor (FY 2083/84)</h2>
    <form method="POST">
        <label>Annual Taxable Income (NPR): </label><br>
        <input type="number" step="any" name="income" required><br><br>
        
        <label>Taxpayer Gender: </label><br>
        <select name="gender">
            <option value="male">Male</option>
            <option value="female">Female (10% Rebate)</option>
        </select><br><br>
        
        <input type="submit" name="calculate_tax" value="Calculate Income Tax">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['calculate_tax'])) {
        $income = floatval($_POST['income']);
        $gender = $_POST['gender'];
        $tax = 0.0;

        if ($income <= 0) {
            echo "<p style='color:red;'>Please enter a valid income amount.</p>";
        } else {
            $rem = $income;

            // Slab 1: Up to 1,000,000 @ 1%
            if ($rem > 0) {
                $taxableInSlab = min($rem, 1000000);
                $tax += $taxableInSlab * 0.01;
                $rem -= $taxableInSlab;
            }

            // Slab 2: Next 500,000 (1,000,001 to 1,500,000) @ 10%
            if ($rem > 0) {
                $taxableInSlab = min($rem, 500000);
                $tax += $taxableInSlab * 0.10;
                $rem -= $taxableInSlab;
            }

            // Slab 3: Next 1,000,000 (1,500,001 to 2,500,000) @ 20%
            if ($rem > 0) {
                $taxableInSlab = min($rem, 1000000);
                $tax += $taxableInSlab * 0.20;
                $rem -= $taxableInSlab;
            }

            // Slab 4: Next 1,500,000 (2,500,001 to 4,000,000) @ 27%
            if ($rem > 0) {
                $taxableInSlab = min($rem, 1500000);
                $tax += $taxableInSlab * 0.27;
                $rem -= $taxableInSlab;
            }

            // Slab 5: Above 4,000,000 @ 29%
            if ($rem > 0) {
                $tax += $rem * 0.29;
            }

            // Apply 10% female tax discount
            if ($gender === "female") {
                $tax *= 0.90;
            }

            echo "<h3>Tax Breakdown:</h3>";
            echo "Gross Annual Income: NPR " . number_format($income, 2) . "<br>";
            echo "Gender Category: " . ucfirst($gender) . "<br>";
            echo "<strong>Net Tax Obligation: NPR " . number_format($tax, 2) . "</strong>";
        }
    }
    ?>
</body>
</html>