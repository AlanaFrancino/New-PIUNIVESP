<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Models\Genero;
use Exception;
use Illuminate\Http\Request;

class GeneroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $generos = Genero::paginate(9);
        return view('generos.generos', compact('generos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('generos.create');
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
            'descricao',
        ]);
        $data['ativo'] = true;
        
        try {

            Genero::create($data);
            
            return redirect()->route('generos.index')->with('success','Genero Criado Com Sucesso');
        } catch (Exception $e) {
            return redirect()->route('generos.create')->with('error','Não foi possivel criar o Genero tente novamente');
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
        $generos = Genero::find($id);
        return view('generos.edit', compact('generos'));
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
            'descricao',
        ]);
     
        try {

            Genero::find($id)->update($data);
            
            return redirect()->route('generos.index')->with('success','Genero Editado Com Sucesso');
        } catch (Exception $e) {
            return redirect()->back()->with('error','Não foi possivel alterar o Genero tente novamente');
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
            $genero = Genero::find($id);
            $genero->ativo = false;

            $genero->update();

            return redirect()->route('generos.index')->with('success','Genero Removido Com Sucesso');
        } catch (Exception $e) {
            return redirect()->back()->with('error','Genero Não pode ser removido no momento');
        }
    }

    
    public function generoFilter($parameter)
    {
        try {
            
            switch ($parameter) {
                case 'activated':
                        $usersSearch = Genero::where('ativo', true);
                    break;
                case 'desactivated':
                        $usersSearch= Genero::where('ativo', false);
                    break;
            }

            $generos = $usersSearch->orderBy('id', 'DESC')->paginate(9);

            return view('generos.generos', compact('generos', 'parameter'));
        } catch (Exception $e) {
            
            return redirect()->back()->with('error','Genero Não Encontrado');
        }
    }

    public function search(SearchRequest $request)
    {
        try {
            $data = $request->search;

            $generos = Genero::where('descricao', 'like', '%' . $data .'%')->paginate();

            return view('generos.generos', compact('generos'))->with('success','Genero Encontrado');
        } catch (Exception $e) {
            return redirect()->back()->with('error','Genero Não Encontrado');
        }
    }
}
