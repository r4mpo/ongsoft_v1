<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Financeiro;

class FinanceirosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $financeiro = Financeiro::all();
        return view('dashboard', ['financeiro' => $financeiro]);
    }

    public function dataTable(){
        return response()->json(['dados' => Financeiro::all()]);        
    }

    public function dataTableId($id){
        return response()->json(['dados' => Financeiro::findOrFail($id)]);        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Tratamento de Arquivo
        $xml = $request->file('xmlFile');
        $extensaoArquivo = $xml->getClientOriginalExtension();

        if ($extensaoArquivo === 'xml') {

            // Obtendo os dados da XML passada no Request
            // É necessário especificar todo o caminho até o campo desejado do arquivo xml
            // Inserindo no banco de dados

            $obterDados = simplexml_load_file($xml);

            $financeiro = new Financeiro;
            $financeiro->name = $obterDados->financeiro->name;            
            $financeiro->description = $obterDados->financeiro->description;            
            $financeiro->gasto_1 = $obterDados->financeiro->gasto_1;
            
            if($obterDados->financeiro->gasto_2){
                $financeiro->gasto_2 = $obterDados->financeiro->gasto_2;  
            }
            else{
                $financeiro->gasto_2 = 0;
            }
            
            if($obterDados->financeiro->gasto_3){
                $financeiro->gasto_3 = $obterDados->financeiro->gasto_3;    
            }    
            else{
                $financeiro->gasto_3 = 0;
            }       
            
            if($obterDados->financeiro->gasto_4){
                $financeiro->gasto_4 = $obterDados->financeiro->gasto_4;  

            }
            else{
                $financeiro->gasto_4 = 0;
            }

            if($financeiro->save()){
                return response()->json(['resposta' => "O registro foi inserido com sucesso.", 'title' => 'Cadastrado!', 'tema' => 'success']);
            }else{
                return response()->json(['resposta' => "Erro! Não foi possível inserir o registro.", 'title' => 'Erro!', 'tema' => 'error']);
            }
        }
        else {
            return response()->json(['resposta' => "Apenas arquivos XML são aceitos.", 'title' => 'Ops!', 'tema' => 'warning']);
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(!($request->gasto_2 == 'null') and !($request->gasto_3 == 'null') and !($request->gasto_4 == 'null')){
            Financeiro::findOrFail($id)->update($request->all());
        }
        else
        {
            $dados = $request->all();
            if($request->gasto_2 == "null")
            {
                $dados['gasto_2'] = 0;
            }
            if($request->gasto_3 == "null")
            {
                $dados['gasto_3'] = 0;
            }
            if($request->gasto_4 == "null")
            {
                $dados['gasto_4'] = 0;
            }

            Financeiro::findOrFail($id)->update($dados);
        }
        return response()->json(['resposta' => "O registro foi atualizado com sucesso.", 'title' => 'Atualizado!', 'tema' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Financeiro::findOrFail($id)->delete();
        return response()->json(['resposta' => "O registro foi apagado com sucesso.", 'title' => 'Excluído!', 'tema' => 'success']);

    }
}