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

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        // dd($users);
        return view('videos.videos');
    }

   
}
