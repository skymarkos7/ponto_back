<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use App\Models\Core\Store;
use App\Models\Registro;
use Illuminate\Console\Scheduling\Event;
use Illuminate\Http\Request;

class RegisterContrller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Store::all();

        return response()->json(['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function registrar(Request $request)
    {
        $data = $request->all(); // pega todos os dados da requisição

        $cpf = Registro::where('cpf', $data['cpf'])->get(); // traz do banco os registros com o cpf igual ao que foi passado

        if(count($cpf) > 0){
            $data = 'Este cpf já está cadastrado';
        }else{
            Registro::create($data); // cria o registro
            $data = 'Dados inseridos com sucesso';
        }


        return response()->json(['data' => $data]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) // faz de um único item
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)  // faz a atualização
    {
        $dataRequest = $request->all(); // pega tudo
        $data = Store::findOrFail($id); // findOrFail é o mesmo que select*from
        $data->update($dataRequest); // atualiza os dados

        return response()->json(['msg' => 'Atualizado com sucesso', 'data' => $data]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) // faz a remoção
    {
        $data = Store::find($id);

        $data->delete();

        return response()->json(['msg' => 'Registro excluido', 'data' => $data]);
    }
}
