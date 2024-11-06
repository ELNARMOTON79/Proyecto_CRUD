<?php
    function codigo_aleatorio($longitud = 100)
    {
        $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $cantidadCaracteres = strlen($caracteres);
        $codigoAleatorio = '';

        for ($i = 0; $i < $longitud; $i++) {
            $indiceAleatorio = random_int(0, $cantidadCaracteres - 1);
            $codigoAleatorio .= $caracteres[$indiceAleatorio];
        }
        return $codigoAleatorio;
    }
?>