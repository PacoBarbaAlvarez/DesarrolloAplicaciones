<?php
declare(strict_types = 1);

class Account {
    public    array  $number;
    public    string $type;
    protected float  $balance;

    public function __construct(array $number, string $type, float $balance = 0.00)
    {
        $this->number  = $number;
        $this->type    = $type;
        $this->balance = $balance;
    }

    public function deposit(float $amount): float
    {
        $this->balance += $amount;
        return $this->balance;
    }

    public function withdraw(float $amount): float
    {
        $this->balance -= $amount;
        return $this->balance;
    }

    public function getBalance(): float
    {
        return $this->balance;
    }
}

class Library
{
    public array $books;
    public string $libraryName;

    public function __construct(array $books, string $libraryName)
    {
        $this->books = $books;
        $this->libraryName = $libraryName;
    }

    public function getBooks(): array{
        return $this -> books;
    }

    public function addBook(string $book): void
    {
        $this->books[] = $book;
    }

    public function removeBook(string $book): void
    {
        $key = array_search($book, $this->books);
        unset($this->books[$key]);
    }
}

//Create an array to store in the property
$numbers = ['account_number' => 12345678,
            'routing_number' => 987654321,];

//Create an instance of the class and set properties
$account = new Account($numbers, 'Savings', 10.00);
$library = new Library(['El Quijote', 'El niño del pijama de rayas'], 'Library A');
?>
<?php include 'includes/header.php'; ?>
<h2><?= $account->type ?> account</h2>
Account <?= $account->number['account_number'] ?><br>
Routing <?= $account->number['routing_number'] ?><br>
Library: <?= $library->libraryName ?><br>
Books: <br><?php foreach($library->getBooks() as $books):
        echo $books . '<br>';
endforeach; ?>
<hr>
<?php
$library->addBook('El Diario de Greg');

$library->removeBook('El niño del pijama de rayas');
?>
Books: <br><?php foreach($library->getBooks() as $books):
    echo $books . '<br>';
endforeach; ?>

<?php include 'includes/footer.php'; ?>