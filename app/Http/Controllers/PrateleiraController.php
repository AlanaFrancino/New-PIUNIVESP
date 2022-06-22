<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Models\Prateleira;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class PrateleiraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prateleiras = Prateleira::paginate(9);
        return view('prateleiras.prateleiras', compact('prateleiras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('prateleiras.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only([
            'rua',
            'altura',
            'largura',
            'descricao'
        ]);

        $data['ativo'] = true;
        $user = User::find(auth()->user()->id);
        try {

            $user->prateleiras()->create($data);
            
            return redirect()->route('prateleiras.index')->with('success','Prateleira Criado Com Sucesso');
        } catch (Exception $e) {
            return redirect()->route('prateleiras.create')->with('error','Não foi possivel criar a Prateleira tente novamente');
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
        $prateleiras = Prateleira::find($id);
        // dd($user);
        return view('prateleiras.edit', compact('prateleiras'));
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
        $data = $request->only([
            'rua',
            'altura',
            'largura',
            'descricao'
        ]);

        $data['ativo'] = true;
        $prateleiras = Prateleira::find($id);
        try {

            $prateleiras->update($data);
            
            return redirect()->route('prateleiras.index')->with('success','Prateleira Alterada Com Sucesso');
        } catch (Exception $e) {
            return redirect()->route('prateleiras.create')->with('error','Não foi possivel alterar a Prateleira tente novamente');
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
            $prateleira = Prateleira::find($id);
            $prateleira->ativo = false;

            $prateleira->update();

            return redirect()->route('prateleiras.index')->with('success',' Prateleira Removido Com Sucesso');
        } catch (Exception $e) {
            return redirect()->back()->with('error','Prateleira Não pode ser removido no momento');
        }
    }

    public function prateleiraFilter($parameter)
    {
        try {
            
            switch ($parameter) {
                case 'activated':
                        $prateleiraSearch = Prateleira::where('ativo', true);
                    break;
                case 'desactivated':
                        $prateleiraSearch= Prateleira::where('ativo', false);
                    break;
            }

            $prateleiras = $prateleiraSearch->orderBy('id', 'DESC')->paginate(9);

            return view('prateleiras.prateleiras', compact('prateleiras', 'parameter'));
        } catch (Exception $e) {
            
            return redirect()->back()->with('error','Prateleira Não Encontrado');
        }
    }

    public function search(SearchRequest $request)
    {
        try {
            $data = $request->search;

            $prateleiras = Prateleira::where('descricao', 'like', '%' . $data .'%')->paginate();

            return view('prateleiras.prateleiras', compact('prateleiras'))->with('success','Prateleira Encontrada');
        } catch (Exception $e) {
            return redirect()->back()->with('error','Prateleira Não Encontrado');
        }
    }
}
