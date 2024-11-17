<?php
$us_price = 4; 

$rates = [
    'uk' => 0.81,
    'eu' => 0.93,
    'jp' => 113.21,
    'aud' => 1.30, 
    'cad' => 1.25, 
];

function calculate_prices($usd, $exchange_rates)
{
    $prices = [
        'pound' => $usd * $exchange_rates['uk'],
        'euro' => $usd * $exchange_rates['eu'],
        'yen' => $usd * $exchange_rates['jp'],
        'aud' => $usd * $exchange_rates['aud'],
        'cad' => $usd * $exchange_rates['cad'],
    ];
    return $prices;
}

function format_price($price, $currency_symbol)
{
    return $currency_symbol . number_format($price, 2);
}

$global_prices = calculate_prices($us_price, $rates);

$products = [
    'Chocolates' => 4,
    'Mints' => 2,
    'Toffee' => 3.5,
    'Fudge' => 5,
];
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Functions with Multiple Values</title>
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>
        <h1>The Candy Store</h1>
        <table border="1">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>US ($)</th>
                    <th>UK (&pound;)</th>
                    <th>EU (&euro;)</th>
                    <th>JP (&yen;)</th>
                    <th>AUD (A$)</th>
                    <th>CAD (C$)</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product => $usd_price): ?>
                    <?php $prices = calculate_prices($usd_price, $rates); ?>
                    <tr>
                        <td><?= $product ?></td>
                        <td><?= format_price($usd_price, '$') ?></td>
                        <td><?= format_price($prices['pound'], '£') ?></td>
                        <td><?= format_price($prices['euro'], '€') ?></td>
                        <td><?= format_price($prices['yen'], '¥') ?></td>
                        <td><?= format_price($prices['aud'], 'A$') ?></td>
                        <td><?= format_price($prices['cad'], 'C$') ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </body>
</html>
