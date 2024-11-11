<?php
    $day = 'Wednesday';
    $offer = match($day) {
        'Monday' => '20% off chocolates',
        'Tuesday' => '20% off candies',
        'Saturday','Sunday' => '20% off mints',
    };
?>
<!DOCTYPE html>
    <html>
    <head>
        <title>match Expression</title>
        <link rel="stylesheet" href="css2/styles.css">
    </head>
    <body>
        <h1>The Candy Store</h1>
        <h2>Offers on <?= $day ?></h2>
        <p><?= $offer ?></p>
    </body>
</html>