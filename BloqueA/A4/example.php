<?php
include 'classes/Account.php';
include 'classes/Customer.php';

$accounts = [new Account(20489446, 'Checking', -20),
             new Account(20148896, 'Savings', 380),];

$customer = new Customer('Ivy', 'Stone', 'ivy@eg.link', 'Jup!t3r2684', $accounts);

class Vehicle {
  public string $make;
  public string $model;
  public string $licensePlate;
  public bool $available;

  public function __construct(string $make, string $model, string $licensePlate, bool $available) {
      $this->make = $make;
      $this->model = $model;
      $this->licensePlate = $licensePlate;
      $this->available = $available;
  }

  public function getDetails(): string {
      return "Make: {$this->make}, Model: {$this->model}, License Plate: {$this->licensePlate}, Available: " . ($this->available ? "Yes" : "No");
  }

  public function isAvailable(): bool {
      return $this->available;
  }
}

// Clase Fleet
class Fleet {
  public string $name;
  private array $vehicles = [];

  public function __construct(string $name) {
      $this->name = $name;
  }

  public function addVehicle(Vehicle $vehicle): void {
      $this->vehicles[] = $vehicle;
  }

  public function listVehicles(): array {
      return $this->vehicles;
  }

  public function listAvailableVehicles(): array {
      return array_filter($this->vehicles, fn($vehicle) => $vehicle->isAvailable());
  }
}

$fleet = new Fleet("City Fleet");

$vehicle1 = new Vehicle("Toyota", "Corolla", "ABC123", true);
$vehicle2 = new Vehicle("Ford", "Focus", "XYZ789", false);
$vehicle3 = new Vehicle("Honda", "Civic", "LMN456", true);

$fleet->addVehicle($vehicle1);
$fleet->addVehicle($vehicle2);
$fleet->addVehicle($vehicle3);

$allVehicles = $fleet->listVehicles();
$availableVehicles = $fleet->listAvailableVehicles();

?>


<?php include 'includes/header.php'; ?>
<h2>Name: <b><?= $customer->getFullName() ?></b></h2>

<table>
  <tr>
    <th>Account Number</th>
    <th>Account Type</th>
    <th>Balance</th>
  </tr>

    <?php foreach ($customer->accounts as $account) { ?>
      <tr>
        <td><?= $account->number ?></td>
        <td><?= $account->type ?></td>
          <?php if ($account->getBalance() >= 0) { ?>
        <td class="credit">
            <?php } else { ?>
        <td class="overdrawn">
            <?php } ?>
          $ <?= $account->getBalance() ?></td>
      </tr>
    <?php } ?>

</table>
    <h2>All Vehicles</h2>
    <table>
        <tr>
            <th>Make</th>
            <th>Model</th>
            <th>License Plate</th>
            <th>Available</th>
        </tr>
        <?php foreach ($allVehicles as $vehicle): ?>
        <tr>
            <td><?= $vehicle->make ?></td>
            <td><?= $vehicle->model ?></td>
            <td><?= $vehicle->licensePlate ?></td>
            <td><?= $vehicle->isAvailable() ? "Yes" : "No" ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <h2>Available Vehicles</h2>
    <table>
        <tr>
            <th>Make</th>
            <th>Model</th>
            <th>License Plate</th>
        </tr>
        <?php foreach ($availableVehicles as $vehicle): ?>
        <tr>
            <td><?= $vehicle->make ?></td>
            <td><?= $vehicle->model ?></td>
            <td><?= $vehicle->licensePlate ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
<?php include 'includes/footer.php'; ?>