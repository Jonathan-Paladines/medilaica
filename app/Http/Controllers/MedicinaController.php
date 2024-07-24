<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MedicinaController extends Controller
{
    public function index(){
        return "Aqui se mostrarán los datos de las medicinas.";
    }

    public function create(){
        return "Aqui se mostrará un formulario para crear medicinas.";
    }

    public function show($post){
        return "Aqui se mostrará la información de {$post}, medicina ingresada.";
    }
}
