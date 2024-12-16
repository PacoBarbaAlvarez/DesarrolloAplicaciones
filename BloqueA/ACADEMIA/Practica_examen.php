<?php
declare(strict_types = 1);

class Book {
    public string $title;
    public string $author;
    public int $pages;

    public function __construct(string $title, string $author, int $pages){
        $this->title = $title;
        $this->author = $author;
        $this->pages = $pages;
    }

    function getDetails(){
        return "Titulo: {$this->title} Autor: {$this->author} Pages: {$this->pages}";
    }
}

class Library {
    public string $name;
    public array $books;

    public function __construct(string $name, array $books = []){
        $this->name = $name;
        $this->books = $books;
    }

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

    public function listBooks(){
        if (empty($this->books)) {
            echo "No hay libros.\n";
            return;
        }
        
        foreach ($this->books as $book) {
            echo "<br>Titulo: {$book->title} <br> Autor: {$book->author} <br> Paginas: {$book->pages}\<br>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    // Ejemplo de uso
    $library = new Library("Biblioteca Central");
    $book1 = new Book("1984", "George Orwell", 328);
    $book2 = new Book("El Principito", "Antoine de Saint-Exupéry", 96);

    $library->addBook($book1);
    $library->addBook($book2);

    echo "<h1>Libros en la biblioteca:</h1>";
    $library->listBooks();
    ?>
</body>
</html>
