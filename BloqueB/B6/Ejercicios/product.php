<?php
// Array de productos y sus detalles
$products = [
    'Laptop' => [
        'description' => 'High-performance laptop with 16GB RAM and 512GB SSD.',
        'price' => 999.99,
        'availability' => 'In stock',
    ],
    'Smartphone' => [
        'description' => 'Smartphone with a 6.5-inch display and 128GB storage.',
        'price' => 699.99,
        'availability' => 'Out of stock',
    ],
    'Tablet' => [
        'description' => 'Tablet with 10.2-inch display and 64GB storage.',
        'price' => 329.99,
        'availability' => 'In stock',
    ],
];

// Obtener el parámetro `product` de la cadena de consulta
$product = $_GET['product'] ?? '';
$valid   = array_key_exists($product, $products);

if (!$product) {
    $error = 'No product selected.';
} elseif (!$valid) {
    $error = 'Product not found.';
} else {
    $details = $products[$product];
}

?>
<?php include 'includes/header.php' ?>

<!-- Validación de errores -->
<?php if (isset($error)): ?>
    <h1>Error</h1>
    <p><?= htmlspecialchars($error) ?></p>
<?php else: ?>
    <!-- Mostrar los detalles del producto -->
    <h1><?= htmlspecialchars($product) ?></h1>
    <p><strong>Description:</strong> <?= htmlspecialchars($details['description']) ?></p>
    <p><strong>Price:</strong> $<?= number_format($details['price'], 2) ?></p>
    <p><strong>Availability:</strong> <?= htmlspecialchars($details['availability']) ?></p>
<?php endif; ?>

<?php include 'includes/footer.php' ?>
