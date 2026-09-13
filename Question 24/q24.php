<?php
// PHP Multidimensional Array storing student records
$students = [
    ["name" => "Rajesh", "roll" => 25, "web_tech" => 56, "dbms" => 89, "economics" => 57, "dsa" => 64, "account" => 98],
    ["name" => "hari",   "roll" => 5,  "web_tech" => 56, "dbms" => 89, "economics" => 57, "dsa" => 64, "account" => 98],
    ["name" => "Shyam",  "roll" => 6,  "web_tech" => 54, "dbms" => 79, "economics" => 57, "dsa" => 69, "account" => 98],
    ["name" => "Rita",   "roll" => 10, "web_tech" => 16, "dbms" => 89, "economics" => 56, "dsa" => 64, "account" => 98],
    ["name" => "Gita",   "roll" => 4,  "web_tech" => 56, "dbms" => 89, "economics" => 57, "dsa" => 69, "account" => 98],
    ["name" => "Sita",   "roll" => 24, "web_tech" => 56, "dbms" => 99, "economics" => 57, "dsa" => 24, "account" => 98],
    ["name" => "Sita",   "roll" => 24, "web_tech" => 56, "dbms" => 99, "economics" => 57, "dsa" => 24, "account" => 98],
    ["name" => "Sita",   "roll" => 24, "web_tech" => 56, "dbms" => 99, "economics" => 57, "dsa" => 24, "account" => 98]
];

// Helper function to calculate total marks
function calculateTotal($s) {
    return $s['web_tech'] + $s['dbms'] + $s['economics'] + $s['dsa'] + $s['account'];
}

// Helper function to evaluate Pass / Fail status (Pass mark: 40)
function getResultStatus($s) {
    $passMark = 40;
    if (
        $s['web_tech'] >= $passMark && 
        $s['dbms'] >= $passMark && 
        $s['economics'] >= $passMark && 
        $s['dsa'] >= $passMark && 
        $s['account'] >= $passMark
    ) {
        return "pass";
    }
    return "fail";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Mark Sheet - Multidimensional Array</title>
    <style>
        body { font-family: Times New Roman, serif; }
        table { border-collapse: collapse; width: 100%; margin-bottom: 30px; }
        th, td { border: 1px solid #777; padding: 3px 6px; text-align: left; font-size: 14px; }
        th { background-color: #f2f2f2; font-weight: bold; }

        /* Styles for Table 1: Mark Ledger */
        .pass-row { background-color: #55efc4; } /* Green */
        .fail-row { background-color: #ff3838; color: white; } /* Red */

        /* Styles for Table 2: Alternate Color */
        .alt-table tr:nth-child(odd) { background-color: #333333; color: #ffffff; }
        .alt-table tr:nth-child(even) { background-color: #a0a0a0; color: #000000; }
        .alt-pass { background-color: #55efc4; color: #000; }
        .alt-fail { background-color: #ff3838; color: #fff; }
    </style>
</head>
<body>

    <h2>Mark Ledger</h2>
    <table>
        <thead>
            <tr>
                <th>SN</th>
                <th>Name</th>
                <th>Roll</th>
                <th>Web Tech II</th>
                <th>DBMS</th>
                <th>Economics</th>
                <th>DSA</th>
                <th>Account</th>
                <th>Total</th>
                <th>Result</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $sn = 1;
            foreach ($students as $s): 
                $total = calculateTotal($s);
                $result = getResultStatus($s);
                $rowClass = ($result === "pass") ? "pass-row" : "fail-row";
            ?>
                <tr class="<?php echo $rowClass; ?>">
                    <td><?php echo $sn++; ?></td>
                    <td><?php echo htmlspecialchars($s['name']); ?></td>
                    <td><?php echo $s['roll']; ?></td>
                    <td><?php echo $s['web_tech']; ?></td>
                    <td><?php echo $s['dbms']; ?></td>
                    <td><?php echo $s['economics']; ?></td>
                    <td><?php echo $s['dsa']; ?></td>
                    <td><?php echo $s['account']; ?></td>
                    <td><?php echo $total; ?></td>
                    <td><?php echo $result; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Alternate color</h2>
    <table class="alt-table">
        <thead>
            <tr>
                <th>SN</th>
                <th>Name</th>
                <th>Roll</th>
                <th>Web Tech II</th>
                <th>DBMS</th>
                <th>Economics</th>
                <th>DSA</th>
                <th>Account</th>
                <th>Total</th>
                <th>Result</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $sn = 1;
            foreach ($students as $s): 
                $total = calculateTotal($s);
                $result = getResultStatus($s);
                $resultClass = ($result === "pass") ? "alt-pass" : "alt-fail";
            ?>
                <tr>
                    <td><?php echo $sn++; ?></td>
                    <td><?php echo htmlspecialchars($s['name']); ?></td>
                    <td><?php echo $s['roll']; ?></td>
                    <td><?php echo $s['web_tech']; ?></td>
                    <td><?php echo $s['dbms']; ?></td>
                    <td><?php echo $s['economics']; ?></td>
                    <td><?php echo $s['dsa']; ?></td>
                    <td><?php echo $s['account']; ?></td>
                    <td><?php echo $total; ?></td>
                    <td class="<?php echo $resultClass; ?>"><?php echo $result; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>