<?php

    // Inicializamos las variables para la secuencia de Fibonacci
    $num1 = 0;

    // Imprimimos los dos primeros valores de la secuencia
    $num2 = readline("Ingrese un número>1: ");
    
    // Bucle para generar la secuencia de Fibonacci hasta el número ingresado por el usuario
    for ($i = 1; $i <= $num2; ++$i) {
        $num3 = $i + ($i-1);
        echo "$num3 ";
    }

?>