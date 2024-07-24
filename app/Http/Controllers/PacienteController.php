<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PacienteController extends Controller
{
    public function index(){
        return view('formuno');
    }

    public function create(){
        return "Aqui se mostrará un formulario para crear pacientes.";
    }
}
