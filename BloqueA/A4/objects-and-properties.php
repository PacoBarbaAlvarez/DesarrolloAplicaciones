<?php
class Customer
{
    public string $forename;
    public string $surname;
    public string $email;
    public string $password;
    public string $nombre;
    public string $apellido;
}

class Account
{
    public int    $number;
    public string $type;
    public float  $balance;
}

$customer = new Customer();
$account  = new Account();
$customer->email  = 'ivy@eg.link';
$customer->nombre = 'Paco';
$customer->apellido = 'Barba';
$account->balance = 1000.00;
?>
<?php include 'includes/header.php'; ?>
  <p>Nombre : <?= $customer->nombre ?></p>
  <p>Apellido: <?= $customer->apellido ?></p>
  <p>Email: <?= $customer->email ?></p>
  <p>Balance: $<?= $account->balance ?></p>
<?php include 'includes/footer.php'; ?>