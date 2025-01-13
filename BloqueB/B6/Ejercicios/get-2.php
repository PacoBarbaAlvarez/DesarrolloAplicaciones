<?php
$cities  = [
    'London' => '48 Store Street, WC1E 7BS',
    'Sydney' => '151 Oxford Street, 2021',
    'NYC'    => '1242 7th Street, 10492',
    'Tokio'  => '5-1-1 Ginza, Chuo-ku, 104-0061',
];

$city = $_GET['city'] ?? '';
if ($city ) {
    $address = $cities[$city];
} else {
    $address = 'Please select a city';
}
?>
<?php include 'includes/header.php' ?>

<!-- Mostrar los enlaces de las ciudades -->
<?php foreach ($cities as $key => $value) { ?>
  <a href="get-2.php?city=<?= $key ?>"><?= $key ?></a>
<?php } ?>

<!-- Mostrar el nombre de la ciudad y la dirección o mensaje de error -->
<h1><?= $city ?></h1>
<p><?= $address ?></p>

<?php include 'includes/footer.php' ?>
