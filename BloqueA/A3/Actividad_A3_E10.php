<?php
function calculate_cost($cost, $quantity, $discount = 0, $tax = 0)
{
    $subtotal = $cost * $quantity; 
    $total_after_discount = $subtotal - $discount; 
    $tax_amount = $total_after_discount * ($tax / 100); 
    return $total_after_discount + $tax_amount;
}

$products = [
    ['name' => 'Dark Chocolate', 'cost' => 5, 'quantity' => 10, 'discount' => 5, 'tax' => 10],
    ['name' => 'Milk Chocolate', 'cost' => 3, 'quantity' => 4, 'discount' => 0, 'tax' => 5],
    ['name' => 'White Chocolate', 'cost' => 4, 'quantity' => 15, 'discount' => 20, 'tax' => 15],
    ['name' => 'Caramel Chocolate', 'cost' => 6, 'quantity' => 8, 'discount' => 10, 'tax' => 8],
    ['name' => 'Mint Chocolate', 'cost' => 7, 'quantity' => 12, 'discount' => 15, 'tax' => 12],
];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Default Values for Parameters</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>The Candy Store</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Product</th>
                <th>Cost per Unit ($)</th>
                <th>Quantity</th>
                <th>Discount ($)</th>
                <th>Tax (%)</th>
                <th>Total Cost ($)</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td><?= $product['name'] ?></td>
                    <td><?= $product['cost'] ?></td>
                    <td><?= $product['quantity'] ?></td>
                    <td><?= $product['discount'] ?></td>
                    <td><?= $product['tax'] ?></td>
                    <td><?= calculate_cost($product['cost'], $product['quantity'], $product['discount'], $product['tax']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
