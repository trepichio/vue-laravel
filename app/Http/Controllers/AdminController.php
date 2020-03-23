<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Artigo;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $listaMigalhas = json_encode([
            ["titulo"=>"Admin","url"=>""]
        ]);

        $qtdUsuarios = User::count();
        $qtdAutores = User::where('autor', 'S')->count();
        $qtdArtigos = Artigo::count();
        $qtdAdmin = User::where('admin', 'S')->count();


        // $qtdAutores = json_encode(DB::table('users')->where('autor', '=', 'S')->count());
        // $qtdArtigos = json_encode(DB::table('artigos')->count());



        return view('admin', compact('listaMigalhas', 'qtdUsuarios', 'qtdArtigos', 'qtdAutores', 'qtdAdmin'));
    }
}
