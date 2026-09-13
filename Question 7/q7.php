<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Football Team Points Calculator</title>
</head>
<body>
    <h2>Football Team Standings Calculator</h2>
    <form method="POST" action="">
        <label>Wins:</label><br>
        <input type="number" name="wins" min="0" required><br><br>
        
        <label>Draws:</label><br>
        <input type="number" name="draws" min="0" required><br><br>
        
        <label>Losses:</label><br>
        <input type="number" name="losses" min="0" required><br><br>
        
        <input type="submit" name="calculate" value="Calculate Points">
    </form>

    <?php
    function calculatePoints($wins, $draws, $losses) {
        return ($wins * 3) + ($draws * 1) + ($losses * 0);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['calculate'])) {
        $wins = filter_input(INPUT_POST, 'wins', FILTER_VALIDATE_INT);
        $draws = filter_input(INPUT_POST, 'draws', FILTER_VALIDATE_INT);
        $losses = filter_input(INPUT_POST, 'losses', FILTER_VALIDATE_INT);

        // Input validation to prevent negative values
        if ($wins === false || $wins < 0 || $draws === false || $draws < 0 || $losses === false || $losses < 0) {
            echo "<p style='color:red;'>Please enter valid non-negative integers for all fields.</p>";
        } else {
            $totalGames = $wins + $draws + $losses;
            $totalPoints = calculatePoints($wins, $draws, $losses);

            echo "<h3>Results:</h3>";
            echo "Total Games Played: <strong>$totalGames</strong><br>";
            echo "Total Points Obtained: <strong>$totalPoints points</strong>";
        }
    }
    ?>
</body>
</html>