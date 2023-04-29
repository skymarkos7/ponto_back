<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use App\Models\Core\Store;
use App\Models\Registro;
use Illuminate\Console\Scheduling\Event;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Retorna todos os registros.
     */
    public function index()
    {

        $users = Registro::orderBy('nome', 'ASC')->get();

        return response()->json(['data' => $users]);
    }

    /**
     * Salva os dados no banco. if cpf exist, return aviso
     */
    public function registrar(Request $request)
    {
        $data = $request->all();
        if(isset($data['nome']) && isset($data['email']) && isset($data['cpf']) && isset($data['conhecimentos'])) {
            $cpf = Registro::where('cpf', $data['cpf'])->get(); // traz do banco os registros com o cpf igual ao que foi passado
            if(count($cpf) > 0) {
                $data = 'Este cpf já está cadastrado';
            } else {
                $data['validacao'] = true;
                // $data['datavalidacao'] = date('Y-m-d H:i:s');
                Registro::create($data); // cria o registro no bacno
                // $data = 'Dados inseridos com sucesso';
            }

        } else {
            $data = "Preencha todos os campos";
        }



        return response()->json(['data' => $data]);

    }

    /**
     * Display the specified resource.
     */
    public function validar(string $id) // faz de um único item
    {

        return "ssss";

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