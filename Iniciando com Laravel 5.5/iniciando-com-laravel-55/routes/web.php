<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use \Illuminate\Http\Request;

// MVC - Model - View - Controller

Route::get('/', function () {
    return view('welcome'); //helper
});

Route::get('/blade', function () {
    $nome = "Breno Teodoro";
    $variavel1 = "Valor1";
    return view('test')
    ->with('nome', $nome)
    ->with('variavel1', $variavel1);
});

Route::get('/cliente/cadastrar', function () {
    $nome = "Breno Teodoro";
    $variavel1 = "Valor1";

     return view('cliente.cadastrar',compact('nome', 'variavel1'));
});


/*
 Route::get('/cliente', function () {
    //csrf--token
    $csrfToken = csrf_token();
    $html = <<<HTML
<html>
<body>
    <h1>Cliente</h1>
    <form method="post" action="/cliente/cadastrar">
    <input type="hidden" name="_token" value="$csrfToken">
        <input type="text" name="name"/>
        <button type="submit">Enviar</button> 
    </form>
</body>
</html>
HTML;
    return $html;
});

Route::post('/cliente/cadastrar', function (Request $request) {
    echo ("name ").($request->get('name'));

    echo (" name2 ").($request->name);
});

Route::get('/cliente', function () {
    echo "Hello World";
});

Route::get('/produto/{name}/{id}', function ($name,$id) {
    return "Produto $name - $id";
});

//Rota com parametro id opcional, demarcado com ? antes de fechar chaves
Route::get('/fornecedor/{name}/{id?}', function ($name,$id = NULL) {
    if ($id == NULL)
    {
        echo "fornecedor $name";
    } else {
        echo "fornecedor $name - $id";
    }
    return;
});
 */

/**
 * CoC - Convention over Configuration 
 * Deixar com que o laravel tome a decisão sobre a estrutura de 
 * pastas do projeto, facilitando a organização padrão
 * economizando tempo e agilizando a produtividade.
 */