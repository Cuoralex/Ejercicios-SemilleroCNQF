<?php

// Con la expresión class defino la clase medicamento
class Medicamento
{
    // Atributos del objeto medicamento
    public $molecula;
    public $concentracion;
    public $forma_farmaceutica;
    public $fecha_vencimiento;
    public $cantidad;

    // Método constructor
    public function __construct($molecula, $concentracion, $forma_farmaceutica, $fecha_vencimiento, $cantidad)
    {
        $this->molecula = $molecula;
        $this->concentracion = $concentracion;
        $this->forma_farmaceutica = $forma_farmaceutica;
        $this->fecha_vencimiento = $fecha_vencimiento;
        $this->cantidad = $cantidad;

        echo "Se ha creado un nuevo medicamento\n";
    }

    // Método para consumir medicamento
    public function consumir($cantidad)
    {
        if ($this->cantidad < $cantidad) {
            echo "No hay suficiente medicamento\n";
            return;
        }
        $this->cantidad -= $cantidad;
        echo "Se ha consumido $cantidad de {$this->molecula}, quedan {$this->cantidad}\n";
    }

    // Método para agregar medicamento
    public function agregar($cantidad)
    {
        $this->cantidad += $cantidad;
        echo "Se han agregado $cantidad de {$this->molecula}, quedan {$this->cantidad}\n";
    }
}

// Definir la función redline si es necesaria para obtener entradas
function redline($prompt) {
    echo $prompt;
    return trim(fgets(STDIN));
}

$inventario = [];
$fin = false; // Mientras fin sea falso, se muestra inventario
while (!$fin) {
    echo "INVENTARIO:
    1. Crear producto.
    2. Agregar existencias a producto.
    3. Consumir existencias de producto\n";

    $opcion = redline("Ingrese opcion (1-3): ");

    switch ($opcion) {
        case 1:
            echo "Ingrese los datos del producto a crear\n";
            $molecula = redline('Medicamento: ');
            $concentracion = redline('Concentracion: ');
            $forma_farmaceutica = redline('Forma farmaceutica: ');
            $fecha_vencimiento = redline('Fecha de vencimiento (AAAA-MM-DD): ');
            $cantidad = redline('Cantidad: ');

            // Agregarlo al array inventario
            $inventario[] = new Medicamento($molecula, $concentracion, $forma_farmaceutica, $fecha_vencimiento, $cantidad);
            break;
        case 2:
            echo "Seleccione el número del medicamento:\n";

            foreach ($inventario as $key => $item) {
                echo "$key = {$item->molecula} ({$item->concentracion}), fecha de vencimiento: {$item->fecha_vencimiento}\n";
            }

            $numero = redline("Numero: ");
            if (isset($inventario[$numero])) {
                $cantidad = redline("Cantidad a agregar: ");
                $inventario[$numero]->agregar($cantidad);
            } else {
                echo "Número de medicamento no válido\n";
            }
            break;
        case 3:
            echo "Seleccione el número del medicamento:\n";

            foreach ($inventario as $key => $item) {
                echo "$key = {$item->molecula} ({$item->concentracion}), fecha de vencimiento: {$item->fecha_vencimiento}\n";
            }

            $numero = redline("Numero: ");
            if (isset($inventario[$numero])) {
                $cantidad = redline("Cantidad a consumir: ");
                $inventario[$numero]->consumir($cantidad);
            } else {
                echo "Número de medicamento no válido\n";
            }
            break;
        default:
            $fin = true;
            echo "Hasta luego\n";
    }
}
?>
