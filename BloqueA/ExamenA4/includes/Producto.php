<?php
class Producto {
    private string $nombre;
    private float $precio;
    private int $cantidad;
    private int $id;

    public function __construct(string $nombre, float $precio = 0.0, int $cantidad = 0, int $id = 0){

        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->cantidad = $cantidad;
        $this->id = $id;

    }

    // Getters
    public function getNombre(): string {
        return $this->nombre;
    }

    public function getPrecio(): float {
        return $this->precio;
    }

    public function getCantidad(): int {
        return $this->cantidad;
    }

    public function getId(): int {
        return $this->id;
    }

    // Setters
    public function setNombre(string $nombre): bool {
        if (!empty($nombre)) {
            $this->nombre = $nombre;
            return true;
        }
        return false;
    }

    public function setPrecio(float $precio): bool {
        if ($precio > 0) {
            $this->precio = $precio;
            return true;
        }
        return false;
    }

    public function setCantidad(int $cantidad): bool {
        if ($cantidad > 0) {
            $this->cantidad = $cantidad;
            return true;
        }
        return false;
    }

    public function setID(int $id): bool {
        if ($id > 0) {
            $this->id = $id;
            return true;
        }
        return false;
    }

    // Método para calcular el precio total del producto
    public function getPrecioTotal(): float {
        return $this->precio * $this->cantidad;
    }
}
?>
