<?php
class Carrito {
    private array $productos = [];
    private float $impuesto;

    public function __construct(array $productos = [], float $impuesto = 0.21) {
        $this->productos = $productos;
        $this->impuesto = $impuesto;
    }


    public function agregarProducto(Producto $producto): bool {
        foreach ($this->productos as $prod) {
            if ($prod->getId() === $producto->getId()) {
                return false; 
            }
        }
        $this->productos[] = $producto;
        return true;
    }

    // Calcular el subtotal
    public function calcularSubtotal(): float {
        $subtotal = 0;
        foreach ($this->productos as $producto) {
            $subtotal += $producto->getPrecioTotal();
        }
        return $subtotal;
    }

    // Calcular impuestos
    public function calcularImpuestos(): float {
        return $this->calcularSubtotal() * $this->impuesto;
    }

    // Calcular el total
    public function calcularTotal(): float {
        return $this->calcularSubtotal() + $this->calcularImpuestos();
    }

    public function muestraCarrito(): string {
        $tabla = '';
        foreach ($this->productos as $producto) {
            $tabla .= 
            "<tr>
                <td>{$producto->getId()}</td>
                <td>{$producto->getNombre()}</td>
                <td>{$producto->getPrecio()} €</td>
                <td>{$producto->getCantidad()}</td>
                <td>{$producto->getPrecioTotal()} €</td>
            </tr>";
        }
        return $tabla;
    }
}
?>
