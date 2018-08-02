<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $cliente;

    public function __construct(Cliente $cliente){
       $this->cliente = $cliente;
    }

    public function index()
    {   

        $clientes = $this->cliente->all();
        $cadastrar = route('formulario');
        return view('index', compact('clientes','cadastrar'));

    }

    public function form(){
        $index = route('index');
        $url = route('urlform');
        return view('form', compact('url','index'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$dataForm = $request->except('_token','button');
        $dataForm = $request->all();

        $nome = $request->input('nome');
        $idade = $request->input('idade');
        $email = $request->input('email');
        //$dataForm = array(0 => 0, 1 =>$nome, 2 => $idade, 3 =>$email);
        $this->validate($request, $this->cliente->rules);
        $insert = $this->cliente->create($dataForm);
        $message_success = "Cadastro com sucesso";
        $message_error = "Cadastro não foi realizado";
        if ($insert) {
            return redirect()->route('index', ['message' => $message_success]);
        } else {
            return redirect()->route('index', ['message' => $message_error]);
        }
        
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
