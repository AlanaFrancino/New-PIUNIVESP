<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Models\Aluno;
use App\Models\Emprestimo;
use App\Models\Funcionario;
use App\Models\Livro;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class EmprestimoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emprestimos = Emprestimo::orderBy('id', 'DESC')->paginate(9);
        // dd($users);
        return view('emprestimos.emprestimos', compact('emprestimos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('emprestimos.cadastro');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!$request->has('iduser') && !$request->get('iduser')) {
            return redirect()->route('emprestimos.create')->with('alert', 'favor escolher um usuario para registro');
        }

        $user = User::find($request->get('iduser'));

        if (!$request->has('idlivro') && !$request->get('idlivro')) {
            return redirect()->route('emprestimos.create')->with('alert', 'favor escolher um livro para registro');
        }

        $data = [
            'livro_id' => $request->get('idlivro'),
            'qnt' => $request->get('Qtd'),
            'status' => "Emprestado",
            'user_cadastro' => auth()->user()->id
        ];

        if ($request->has('data_dev') && $request->get('data_dev')) {
            $data['dt_prevdev'] = date('Y-m-d H:i:s', strtotime($request->get('data_dev')));
        }

        if ($user['tipo'] == 'FUNC') {
            $funcionario = Funcionario::where('user_id', '=', $request->get('iduser'))->first();
            $data['funcionario_id'] = $funcionario->id;
        }
        else{
            $aluno = Aluno::where('user_id', '=', $request->get('iduser'))->first();
            $data['aluno_id'] = $aluno->id;
        }


        try {
            Emprestimo::create($data);
            
            return redirect()->route('emprestimos.index')->with('success', 'Emprestimo Relizado com sucesso');
        } catch (Exception $e) {
            return redirect()->route('emprestimos.create')->with('error', 'Não foi possivel registrar o novo emprestimo tente novamente');
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
        $emprestimo = Emprestimo::find($id);
        $data = [
            'dt_dev' => date('Y-m-d H:i:s'),
            'status' => 'Delvolvido'
        ];
        try {

            $emprestimo->update($data);
            
            return redirect()->route('emprestimos.index')->with('success', 'Emprestimo devolvido com sucesso');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Não foi possivel devolver o emprestimo tente novamente');
        }
    }

    public function userFilter($parameter)
    {
        try {
            $usersSearch = User::where('id', "!=", auth()->user()->id);

            switch ($parameter) {
                case 'activated':
                    $usersSearch->where('ativo', true);
                    break;
                case 'desactivated':
                    $usersSearch->where('ativo', false);
                    break;
                case 'ALUNO':
                    $usersSearch->where('tipo', 'ALUNO');
                    break;
                case 'FUNC':
                    $usersSearch->where('tipo', 'FUNC');
                    break;
            }

            $users = $usersSearch->orderBy('id', 'DESC')->paginate(9);

            return view('users.users', compact('users', 'parameter'));
        } catch (Exception $e) {

            return redirect()->back()->with('error', 'Usuario Não Encontrado');
        }
    }

    public function search(SearchRequest $request)
    {
        try {
            $data = $request->search;

            $users = User::where('nome_completo', 'like', '%' . $data . '%')->paginate();

            return view('users.users', compact('users'))->with('success', 'Usuario Encontrado');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Usuario Não Encontrado');
        }
    }

    public function autocomplete(Request $request)
    {
        $data = User::select("nome as value", "id")
                    ->where('nome', 'LIKE', '%'. $request->get('search'). '%')
                    ->where('ativo', '=', 'true')
                    ->get();
    
        return response()->json($data);
    }

    public function autocompletelivros(Request $request)
    {
        $data = Livro::select("titulo as value", "id")
                    ->where('titulo', 'LIKE', '%'. $request->get('search2'). '%')
                    ->where('ativo', '=', 'true')
                    ->get();
    
        return response()->json($data);
    }
}
