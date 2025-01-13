<?php
// Lista de productos con nombres y enlaces
$products = [
    'Laptop' => ['description' => 'Una laptop de alta gama con pantalla de 15 pulgadas y procesador Intel i7.', 'price' => 1200, 'availability' => 'En stock'],
    'Smartphone' => ['description' => 'Un smartphone con cámara de alta resolución y 128GB de almacenamiento.', 'price' => 800, 'availability' => 'En stock'],
    'Tablet' => ['description' => 'Una tablet ligera con pantalla de 10 pulgadas y 64GB de almacenamiento.', 'price' => 500, 'availability' => 'Agotado'],
];
?>

<?php include 'includes/header.php' ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de productos</title>
</head>
<body>
    <h1>Lista de Productos</h1>
    <ul>
        <?php foreach ($products as $product => $details): ?>
            <li>
            <a href="product.php?product=<?= urlencode($product) ?>"><?= htmlspecialchars($product) ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>

<?php include 'includes/footer.php' ?>