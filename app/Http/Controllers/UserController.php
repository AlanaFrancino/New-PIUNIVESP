<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Models\Aluno;
use App\Models\Funcionario;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('id', '!=', auth()->user()->id)->paginate(9);
       // dd($users);
        return view('users.users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'nome' => $request->get('nome'),
            'nome_completo' => $request->get('nome').' '. $request->get('sobrenome'),
            'email' => $request->get('email'),
            'tipo' => $request->get('rule'),
        ];

        if ($request->has('password') && $request->get('password')) {
            $data['password'] = bcrypt($request->get('password'));
        }

        $tag = $request->get('tag');
        
        if(!empty($tag)){
            $buscatag = User::where('tag', $tag )->count();
       
            if($buscatag > 0){
                return redirect()->route('users.create')->with('warning','Tag ja cadastrada em outro ususario');
            }   
        }
        

        $data['ativo'] = true;
        $data['tag'] = $tag;
        
        
        try {
            
            if($data['tipo'] == 'FUNC'){

                $datafunc =[
                    'nome'      => $request->get('nome').' '. $request->get('sobrenome'),
                    'cargo'     => $request->get('cargo'),
                    'email'     => $request->get('email'),
                ];
                $user = User::create($data)->funcionarios()->create($datafunc);
            }
            else{
                $datauser =[
                    'nome'      => $request->get('nome').' '. $request->get('sobrenome'),
                    'ra'        => $request->get('ra'),
                    'email'     => $request->get('email'),
                ];
                $user = User::create($data)->alunos()->create($datauser);
            }
            return redirect()->route('users.index')->with('success','Usuario Criado Com Sucesso');
        } catch (Exception $e) {
            return redirect()->route('users.create')->with('error','Não foi possivel criar o usuario tente novamente');
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
        $user = User::find($id);
        // dd($user);
        return view('users.edit', compact('user'));
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
        $data = [
            'nome' => $request->get('nome'),
            'nome_completo' => $request->get('nome').' '. $request->get('sobrenome'),
            'email' => $request->get('email'),
        ];

        

        if ($request->has('password') && $request->get('password')) {
            $data['password'] = bcrypt($request->get('password'));
        }
        $tag = $request->get('tag');
        
        if(!empty($tag)){
            $buscatag = User::where('tag', $tag )->where('id','!=', $id)->count();
        
            if($buscatag > 0){
                return redirect()->back()->with('warning','Tag ja cadastrada em outro ususario');
            }   
        }
        

        $data['ativo'] = true;
        $data['tag'] = $tag;
        
        $user = User::find($id);
        try {
            
            if($user->tipo == 'FUNC'){

                $datafunc =[
                    'nome'      => $request->get('nome').' '. $request->get('sobrenome'),
                    'cargo'     => $request->get('cargo'),
                    'email'     => $request->get('email'),
                ];
                $user->update($data);
                $user->funcionarios()->update($datafunc);
            }
            else{
                $datauser =[
                    'nome'      => $request->get('nome').' '. $request->get('sobrenome'),
                    'ra'        => $request->get('ra'),
                    'email'     => $request->get('email'),
                ];
                $user->update($data);
                $user->alunos()->update($datauser);
            }
            return redirect()->route('users.index')->with('success','Usuario Alterado Com Sucesso');
        } catch (Exception $e) {
            return redirect()->back()->with('error','Não foi possivel alterar o usuario tente novamente');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $user = User::find($id);
            $user->ativo = false;

            $user->update();

            return redirect()->route('users.index')->with('success','Usuario Removido Com Sucesso');
        } catch (Exception $e) {
            return redirect()->back()->with('error','Usuario Não pode ser removido no momento');
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
            
            return redirect()->back()->with('error','Usuario Não Encontrado');
        }
    }

    public function search(SearchRequest $request)
    {
        try {
            $data = $request->search;

            $users = User::where('nome_completo', 'like', '%' . $data .'%')->paginate();

            return view('users.users', compact('users'))->with('success','Usuario Encontrado');
        } catch (Exception $e) {
            return redirect()->back()->with('error','Usuario Não Encontrado');
        }
    }
}
