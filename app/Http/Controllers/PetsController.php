<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pet;
use Illuminate\Support\Facades\Auth;

class PetsController extends Controller
{

    public function index()
    {
        $search = request('search');
        if($search)
        {
            $pets = Pet::where('name', 'like', '%'.$search.'%')->paginate(3);
        }else
        {
            $pets = Pet::paginate(3);
        }

        return view('welcome', ['pets' => $pets]);
    }

    public function create()
    {
        return view('pets.petsForm');
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
        $dados['fk_user'] = auth::id();
        $pet->fill($dados)->save();
        return redirect('/')->with('msg', 'Parabéns! O novo pet foi cadastrado no sistema!');
    }

    public function show($id)
    {
        $pet = Pet::findOrFail($id);
        return view('pets.petsShow', ['pet' => $pet]);
    }

    public function edit($id)
    {
        $pet = Pet::findOrFail($id);
        return view('pets.petsEdit', ['pet' => $pet]);
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
        $dados['fk_user'] = auth::id();
        $pet = Pet::findOrFail($id)->update($dados);
        return redirect('/')->with('msg', 'Parabéns! Os dados do pet foram atualizados!');
    }

    public function destroy($id)
    {
        $pet = Pet::findOrFail($id)->delete();
        return redirect('/')->with('msg', 'Parabéns! Os dados do pet foram excluídos com sucesso!');
    }
}