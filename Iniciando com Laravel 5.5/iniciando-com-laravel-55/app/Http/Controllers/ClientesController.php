<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientesController extends Controller
{
    public function cadastrar(){
        // através dos Controllers nós vamos organizando a nossa aplicação!
        $nome = "Breno Teodoro";
        $variavel1 = "Valor1";
    
        return view('cliente.cadastrar')
        ->with('nome', $nome)
        ->with('variavel', $variavel1);

    }
    public function excluir(){
        // através dos Controllers nós vamos organizando a nossa aplicação!

    }
    public function editar(){
        // através dos Controllers nós vamos organizando a nossa aplicação!
        
    }
}
