<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Models\Genero;
use App\Models\Livro;
use App\Models\Prateleira;
use Exception;
use Illuminate\Http\Request;

class LivroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $livros = Livro::paginate(9);
        return view('livros.livros', compact('livros'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function busca()
    {
        return view('livros.busca');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $generos = Genero::get();
        $prateleiras = Prateleira::get();
        return view('livros.create', compact('generos','prateleiras'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $data = $request->only([
            'titulo',
            'autor',
            'quantidade',
            'prateleira',
        ]);

        $data['doacao'] = $request->get('doacao') != NULL ? $request->get('doacao') : '';
        $data['patrimonio'] = $request->get('patrimonio') != NULL ? $request->get('patrimonio') : '';

        $Livro = Genero::find($request->get('genero'));
        $data['ativo'] = true;
        
        $data['prat_local'] = 'P-'.$request->get('prateleira').'-PV-'.$request->get('altura').'-PH-'.$request->get('largura');
        try {

            $Livro->livro()->create($data);
            
            return redirect()->route('livros.index')->with('success','Livro Criado Com Sucesso');
        } catch (Exception $e) {
            return redirect()->route('livros.create')->with('error','Não foi possivel criar o Livro tente novamente');
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
        $generos = Genero::get();
        $prateleiras = Prateleira::get();
        $livro = Livro::find($id);
        return view('livros.edit', compact('generos','prateleiras','livro'));
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
            'titulo',
            'autor',
            'genero_id',
            'quantidade',
            'patrimonio',
            'doacao',
            'prateleira',
        ]);
        $Livro = Livro::find($id);
        $data['prat_local'] = 'P-'.$request->get('prateleira').'-PV-'.$request->get('altura').'-PH-'.$request->get('largura');
        try {

            $Livro->update($data);
            
            return redirect()->route('livros.index')->with('success','Livro Alterado Com Sucesso');
        } catch (Exception $e) {
            return redirect()->route('livros.create')->with('error','Não foi possivel alterat o Livro tente novamente');
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
            $Livro = Livro::find($id);
            $Livro->ativo = false;

            $Livro->update();

            return redirect()->route('livros.index')->with('success',' Livro Removido Com Sucesso');
        } catch (Exception $e) {
            return redirect()->back()->with('error','Livro Não pode ser removido no momento');
        }
    }

    public function livroFilter($parameter)
    {
        try {
            
            switch ($parameter) {
                case 'activated':
                        $livroSearch = Livro::where('ativo', true);
                    break;
                case 'desactivated':
                        $livroSearch= Livro::where('ativo', false);
                    break;
            }

            $livros = $livroSearch->orderBy('id', 'DESC')->paginate(9);

            return view('livros.livros', compact('livros', 'parameter'));
        } catch (Exception $e) {
            
            return redirect()->back()->with('error','Prateleira Não Encontrado');
        }
    }

    public function search(SearchRequest $request)
    {
        try {
            $data = $request->search;

            $livros = Livro::where('titulo', 'like', '%' . $data .'%')->paginate();

            return view('livros.livros', compact('livros'))->with('success','Livro Encontrada');
        } catch (Exception $e) {
            return redirect()->back()->with('error','Livro Não Encontrado');
        }
    }
}
