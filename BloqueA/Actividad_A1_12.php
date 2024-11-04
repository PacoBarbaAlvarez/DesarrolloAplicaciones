<?php
$username = 'Paco';

$greeting = 'Hi, ' . $username . '.';

$offer = [
    'item'      => 'Chocolate',
    'qty'       => 3,
    'price'     => 6,
    'discount'  => 4,
];

$usual_price = $offer['qty'] * $offer['price'];
$offer_price = $offer['qty'] * $offer['discount'];
$saving      = $usual_price - $offer_price;
?>


<!DOCTYPE html>
    <html>
        <head>
            <title>The Candy Store</title>
            <link rel="stylesheet" href="css/styles.css">
        </head>
        <body>
            <h1>The Candy Store</h1>
            <h2>Multi-buy Offer</h2>
            <p><?= $greeting ?></p>
            <p class="sticker">Save $<?= $saving ?></p>
            <p>Buy <?= $offer['qty'] ?> packs of <?= $offer['item'] ?>
            for $<?= $offer_price ?><br> (usual price $<?= $usual_price ?>)</p>
        </body>
    </html>