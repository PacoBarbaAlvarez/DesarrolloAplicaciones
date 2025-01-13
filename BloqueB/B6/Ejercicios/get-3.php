<?php
$cities = [
    'London' => '48 Store Street, WC1E 7BS',
    'Sydney' => '151 Oxford Street, 2021',
    'NYC'    => '1242 7th Street, 10492',
    'Tokyo'  => '1 Hachigahara, Tokyo 101-0033',
];
$city  = $_GET['city'] ?? '';
$valid = array_key_exists($city, $cities);

if ($valid) {
    $address = $cities[$city];
} else {
    // Redirigir al usuario a la página de error si la ciudad no es válida
    header('Location: page-not-found.php');
    exit;
}
?>
<?php include 'includes/header.php'; ?>

<?php foreach ($cities as $key => $value) { ?>
  <a href="get-3.php?city=<?= $key ?>"><?= $key ?></a>
<?php } ?>

<h1><?= htmlspecialchars($city) ?></h1>
<p><?= htmlspecialchars($address) ?></p>

<?php include 'includes/footer.php'; ?>
