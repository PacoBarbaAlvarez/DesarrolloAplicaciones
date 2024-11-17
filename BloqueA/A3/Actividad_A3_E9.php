<?php
$products = [
    'Chocolates' => 25,
    'Mints' => 10,
    'Toffee' => 5,
    'Fudge' => 0,
];

function get_stock_message($stock)
{
    if ($stock > 10) {
        return 'Good availability';
    }
    if ($stock === 10) {
        return 'Exactly 10 items in stock';
    }
    if ($stock > 0 && $stock < 10) {
        return 'Low stock';
    }
    return 'Out of stock';
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Multiple Return Statements</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>The Candy Store</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Product</th>
                <th>Stock</th>
                <th>Stock Message</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product => $stock): ?>
                <tr>
                    <td><?= $product ?></td>
                    <td><?= $stock ?></td>
                    <td><?= get_stock_message($stock) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
