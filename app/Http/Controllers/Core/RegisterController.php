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
     * Registra no banco. se cpf não existir
     */
    public function registrar(Request $request)
    {
        $data = $request->all();
        if(isset($data['nome']) && isset($data['email']) && isset($data['cpf']) && isset($data['conhecimentos'])) {
            $cpf = Registro::where('cpf', $data['cpf'])->get();
            if(count($cpf) > 0) {
                $data = 'Este cpf já está cadastrado';
            } else {
                $data['validacao'] = false;
                // $data['datavalidacao'] = date('Y-m-d H:i:s');
                Registro::create($data);

            }

        } else {
            $data = "Preencha todos os campos";
        }

        return response()->json(['data' => $data]);
    }


    /**
     * Detalhes de um colaborador.
     */
    public function detalhes($id)
    {
        $data = Registro::find($id);
        return $data;
    }


    /**
     * Validar cadastro.
     */
    public function validar($id) {

        $banco = Registro::findOrFail($id);
            if($banco['validacao'] == 1){
                $data['validacao'] = 0;
            }
            if($banco['validacao'] == 0){
                $data['validacao'] = 1;
                $data['datavalidacao'] = date('Y-m-d H:i:s');
            }

            $banco->update($data);

        return response()->json(['msg' => 'Atualizado com sucesso', 'data' => $data]);


    }

    // public function update(Request $request, $id) // faz de um único item
    // {
    //     $dataRequest = $request->all(); // pega tudo
    //     $data = Registro::findOrFail($id); // findOrFail é o mesmo que select*from
    //     $data->update($dataRequest); // atualiza os dados

    //     return response()->json(['msg' => 'Atualizado com sucesso', 'data' => $data]);

    // }

    /**
     * Update the specified resource in storage.
     */


    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(string $id) // faz a remoção
    // {
    //     $data = Store::find($id);

    //     $data->delete();

    //     return response()->json(['msg' => 'Registro excluido', 'data' => $data]);
    // }
}
