<?php
$archivo = "contador.txt";

// Verifica si el archivo existe
if (!file_exists($archivo)) {
    // Si no existe, lo crea con valor inicial de 0
    file_put_contents($archivo, "0");
}

// Abre el archivo en modo de lectura y escritura
$archivo_abierto = fopen($archivo, "c+");

// Verifica si el archivo se abrió correctamente
if ($archivo_abierto) {
    // Bloquea el archivo para escritura
    if (flock($archivo_abierto, LOCK_EX)) {
        // Obtiene el valor actual del contador
        $contador = (int)fread($archivo_abierto, filesize($archivo));

        // Incrementa el contador
        $contador++;

        // Regresa al inicio del archivo y guarda el nuevo valor
        fseek($archivo_abierto, 0);
        fwrite($archivo_abierto, $contador);

        // Libera el bloqueo del archivo
        flock($archivo_abierto, LOCK_UN);

        // Muestra el contador
        echo $contador;
    } else {
        echo "No se pudo bloquear el archivo para escritura.";
    }

    // Cierra el archivo
    fclose($archivo_abierto);
} else {
    echo "No se pudo abrir el archivo.";
}
?>
