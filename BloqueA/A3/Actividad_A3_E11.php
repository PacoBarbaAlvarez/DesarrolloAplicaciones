<?php
function calculate_cost($cost, $quantity, $discount = 0, $tax = 20, $shipping = 0)
{
    $cost = $cost * $quantity; 
    $tax = $cost * ($tax / 100); 
    return ($cost + $tax + $shipping) - $discount; 
}

$products = [
    ['name' => 'Dark Chocolate', 'cost' => 5, 'quantity' => 10, 'discount' => 2, 'tax' => 5, 'shipping' => 3],
    ['name' => 'Milk Chocolate', 'cost' => 4, 'quantity' => 8, 'discount' => 0, 'tax' => 10, 'shipping' => 5],
    ['name' => 'White Chocolate', 'cost' => 6, 'quantity' => 15, 'discount' => 5, 'tax' => 8, 'shipping' => 0],
    ['name' => 'Caramel Chocolate', 'cost' => 7, 'quantity' => 12, 'discount' => 10, 'tax' => 12, 'shipping' => 4],
    ['name' => 'Mint Chocolate', 'cost' => 8, 'quantity' => 20, 'discount' => 15, 'tax' => 15, 'shipping' => 6],
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
                <th>Shipping ($)</th>
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
                    <td><?= $product['shipping'] ?></td>
                    <td>
                        <?= calculate_cost(
                            cost: $product['cost'], 
                            quantity: $product['quantity'], 
                            discount: $product['discount'], 
                            tax: $product['tax'], 
                            shipping: $product['shipping']
                        ) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
