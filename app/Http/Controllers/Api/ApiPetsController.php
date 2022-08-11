<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pet;

/* A rota de API trará para este controller,
onde os dados do pet serão processados. Os retornos
funcionam com json, para futuramente serem consumidos em outras
tecnologias ou outras implementações. */

class ApiPetsController extends Controller
{
    public function index()
    {
        $pet = Pet::all();
        return response()->json($pet);
        
    }

    public function store(Request $request)
    {
        $pet = new Pet;
        $dados = $request->all();
        if($request->hasFile('image') && $request->file('image')->isValid()){
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now") . "." . $extension);
            $request->image->move(public_path('img/uploads'), $imageName);
            $dados['image'] = $imageName;
        }
        $pet->fill($dados)->save();
        return response()->json($pet);
    }

    public function show($id)
    {
        $pet = Pet::findOrFail($id);
        return response()->json($pet);
    }

    public function update(Request $request, $id)
    {
        $dados = $request->all();
        if($request->hasFile('image') && $request->file('image')->isValid()){
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now") . "." . $extension);
            $request->image->move(public_path('img/uploads'), $imageName);
            $dados['image'] = $imageName;
        }
        $pet = Pet::findOrFail($id)->update($dados);
        return $pet;
    }

    public function destroy($id)
    {
        $pet = Pet::findOrFail($id)->delete();
    }
}