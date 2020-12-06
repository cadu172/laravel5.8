<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class ClienteControlador extends Controller
{
    
    private $arrayClientes = [
        ['id'=>1, 'nome'=>'Carlos'],
        ['id'=>2, 'nome'=>'Eduardo'],
        ['id'=>3, 'nome'=>'dos Santos'],
        ['id'=>4, 'nome'=>'Roberto']
    ];

    public function __construct() {

        //session(["clientes" => []]);

        $clientes = session("clientes");
        
        if ( ( ! isset($clientes) ) || ( count($clientes)==0 ) )
        {
            session(["clientes" => $this->arrayClientes]);
        }
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        //$clientes = $this->arrayClientes;
        //session(["clientes"=>$clientes]);
        
        
        $clientes = session('clientes');                

        //dd($clientes);
        
        //
        return view("clientes.index", compact(["clientes"]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("clientes.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // obtem os dados da sessao
        $clientes = session("clientes");
        
        // cria um novo registro com detalhes do formulário
        $novo_cliente = [
            "id" => end($clientes)["id"]+1,
            "nome" => $request->nome
        ];

        // adiciona ao array principal o novo cliente
        $clientes[] = $novo_cliente;

        // gravar na sessão novamente
        session(["clientes" => $clientes]);

        // parametro para a lista de clientes cadastrados
        //$clientes = $this->arrayClientes;

        // imprime o array (debug)
        //dd($this->arrayClientes);
        //return view("clientes.index", compact(['clientes']));

        return redirect()->route("clientes.index");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $clientes = session("clientes");
        
        // obtem o cliente na posição do index indicado
        //$cliente = $clientes[$id-1];
        $cliente = $clientes[$this->getIndexCliente($clientes,$id)];

        // retorna a view com os dados do cliente localizado
        return(view("clientes.show",compact(["cliente"])));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $clientes = session("clientes");

        // obtem o cliente na posição do index indicado
        $cliente = $clientes[$this->getIndexCliente($clientes,$id)];

        // retorna a view com os dados do cliente localizado
        return(view("clientes.edit",compact(["cliente"])));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        // obtem a relação atual de clientes
        $clientes = session("clientes");
        
        // gravar os dados na posição encontrada
        $clientes[$this->getIndexCliente($clientes,$id)]["nome"] = $request->nome;
        
        // regravar os dados na sessão
        session(["clientes"=>$clientes]);
        
        // redirecionar para a página inicial com a listagem de clientes
        return redirect()->route("clientes.index"); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // obtem a relação atual de clientes
        $clientes = session("clientes");
        
        // obtem o indice do cliente, com base no id informado
        $index = $this->getIndexCliente($clientes,$id);
        
        // remove da matriz o id localizado
        array_splice($clientes, $index, 1);
        
        // regravar os dados na sessão
        session(["clientes"=>$clientes]);
        
        // redirecionar para a página inicial com a listagem de clientes
        return (
            redirect()->route("clientes.index")
        );
    }

    /**
     * Retorna um indice em uma matriz, com base no id do cliente
     */
    function getIndexCliente($array_source, $id) {        
        $ids = array_column($array_source, "id");
        $index = array_search($id, $ids);
        return $index;
    }
}
