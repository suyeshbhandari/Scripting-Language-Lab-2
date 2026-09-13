<?php
$info = [
    'name'    => 'Ram Bahadur',
    'address' => 'Lalitpur',
    'email'   => 'info@ram.com',
    'phone'   => 98454545,
    'website' => 'www.ram.com'
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Associative Array Table</title>
    <style>
        table { border-collapse: collapse; width: 300px; font-family: Arial, sans-serif; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <table>
        <tr>
            <th>Key</th>
            <th>Value</th>
        </tr>
        <?php foreach ($info as $key => $value): ?>
            <tr>
                <td><strong><?php echo ucfirst($key); ?></strong></td>
                <td><?php echo htmlspecialchars($value); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>