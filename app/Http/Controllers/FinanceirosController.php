<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Financeiro;

class FinanceirosController extends Controller
{
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
            $financeiro->gasto_2 = FinanceirosController::verificarGastos($obterDados->financeiro->gasto_2);
            $financeiro->gasto_3 = FinanceirosController::verificarGastos($obterDados->financeiro->gasto_3);
            $financeiro->gasto_4 = FinanceirosController::verificarGastos($obterDados->financeiro->gasto_4);

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

    public function verificarGastos($requerimento){
        
        $naoPermitidos = array(null, "", "null");
        
        if(in_array($requerimento, $naoPermitidos))
        {
            return '0';
        }
        else
        {
            return $requerimento;
        }
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $dados = $request->all();
        $dados['gasto_2'] = FinanceirosController::verificarGastos($request->gasto_2);
        $dados['gasto_3'] = FinanceirosController::verificarGastos($request->gasto_3);
        $dados['gasto_4'] = FinanceirosController::verificarGastos($request->gasto_4);
        Financeiro::findOrFail($id)->update($dados);
        return response()->json(['resposta' => "O registro foi atualizado com sucesso.", 'title' => 'Atualizado!', 'tema' => 'success']);
    }

    public function destroy($id)
    {
        Financeiro::findOrFail($id)->delete();
        return response()->json(['resposta' => "O registro foi apagado com sucesso.", 'title' => 'Excluído!', 'tema' => 'success']);
    }
}