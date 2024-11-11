<?php
$products = [
    'Toffee' => 2.99,
    'Mints' => 1.99,
    'Fudge' => 3.49,
    'Candies' => 1.49,
    'Brownies' => 2.89,
];
?>
<!DOCTYPE html>
    <html>
    <head>
        <link rel="stylesheet" href="css2/styles.css">
    </head>
    <body>
    <h1>The Candy Store</h1>
    <h2>Price List</h2>
    <table>
        <tr>
            <th>Item</th>
            <th>Price</th>
        </tr>
        <?php foreach ($products as $item => $price) { ?>
        <tr>
            <td><?= $item ?></td>
            <td>$<?= $price ?></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
