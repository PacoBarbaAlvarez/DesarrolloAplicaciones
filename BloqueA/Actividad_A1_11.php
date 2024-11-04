<?php
$item = 'Chocolate';
$stock = 3;
$wanted = 5;
$deliver = true;
$can_buy = (($wanted <= $stock) && ($deliver == true));
?>

<!DOCTYPE html>
<html>
<head>
    <title>String Operator</title>
    <link rel="stylesheet" href="css/styles.css"> 
</head>
<body>
    <h1>The Candy Store</h1>
    <h2>Shopping Cart</h2>
    <p>Item: <?= $item ?></p>
    <p>Stock: <?= $stock ?></p>
    <p>Ordered: <?= $wanted ?></p>
    <p>Can buy: <?= $can_buy ?></p>
</body>
</html>
