<?php
declare(strict_types = 1);

class Account {
    public    AccountNumber $number;
    public    string        $type;
    protected float         $balance;

    public function __construct(AccountNumber $number, string $type, float $balance = 0.00)
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

class AccountNumber
{
    public int $accountNumber;
    public int $routingNumber;

    public function __construct(int $accountNumber,
                                int $routingNumber)
    {
        $this->accountNumber = $accountNumber;
        $this->routingNumber = $routingNumber;
    }
}

class Book {
    public string $title;
    public string $author;
    public int $pages;

    public function __construct(string $title, string $author, int $pages) {
        $this->title = $title;
        $this->author = $author;
        $this->pages = $pages;
    }
}

class Library {
    private array $books = [];

    public function addBook(Book $book): void {
        $this->books[] = $book;
    }

    public function removeBook(string $title): bool {
        foreach ($this->books as $index => $book) {
            if ($book->title === $title) {
                unset($this->books[$index]);
                $this->books = array_values($this->books);
                return true;
            }
        }
        return false;
    }
    public function getBooks(): array{
        return $this -> books;
    }

    public function listBooks(): void {
        if (empty($this->books)) {
            echo "No hay libros.\n";
            return;
        }
        
        foreach ($this->books as $book) {
            echo "<br>Titulo: {$book->title} <br> Autor: {$book->author} <br> Paginas: {$book->pages}\n";
        }
    }
}

// Create an object to store in the property
$numbers = new AccountNumber(12345678, 987654321);
// Create instance of Account class + set properties
$account = new Account($numbers, 'Savings', 10.00);
?>
<?php include 'includes/header.php'; ?>
<h2><?= $account->type ?> Account</h2>
Account <?= $account->number->accountNumber ?><br>
Routing <?= $account->number->routingNumber ?><br>

<?php
$library = new Library();

$book1 = new Book("El Quijote", "Miguel de Cervantes", 100);
$book2 = new Book("El niño del pijama de Rayas", "John Boyne", 281);
?>

Books: <br><?php foreach($library->getBooks() as $books):
    echo $books . '<br>';
endforeach; 

$library->addBook($book1);
$library->addBook($book2);

$library->listBooks();
?>

<hr>

<?php
$library->removeBook("El Quijote");
$library->listBooks();
?>

<?php include 'includes/footer.php'; ?>