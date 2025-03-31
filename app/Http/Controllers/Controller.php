<?php

namespace App\Http\Controllers;

abstract class Controller
{
    // Cuando el controlador tiene un unico metodo se puede
    // declarar la funcion con el nombre __invoke.

    public function __invoke () {
        return 'Bienvenido al Home';
    }
}
