<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Artigo extends Model
{
    use SoftDeletes;

    protected $fillable = ['titulo', 'descricao', 'conteudo','autor', 'data'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public static function listaArtigos($paginate = 5)
    {
        // $listaArtigos = Artigo::select('id', 'titulo', 'descricao', 'user_id', 'data')
        // ->orderBy('id', 'desc')->paginate($paginate);

        // foreach ($listaArtigos  as $key => $value) {
        //     $value->user_id = User::find($value->user_id)->name;

        //Using relation
        // $value->user_id = $value->user->name;
        // unset($value->user);
        // }

        $user = auth()->user();

        if ($user->admin == 'S') {
            # code...

            $listaArtigos = DB::table('artigos')
                ->join('users', 'users.id', '=', 'artigos.user_id')
                ->select(
                    'artigos.id',
                    'artigos.titulo',
                    'artigos.descricao',
                    'users.name',
                    'artigos.data'
                )
                    ->whereNull('deleted_at')
                    ->orderBy('artigos.id', 'DESC')
                    ->paginate($paginate);
        } else {
            $listaArtigos = DB::table('artigos')
                ->join('users', 'users.id', '=', 'artigos.user_id')
                ->select(
                    'artigos.id',
                    'artigos.titulo',
                    'artigos.descricao',
                    'users.name',
                    'artigos.data'
                )
                    ->whereNull('deleted_at')
                    ->where('artigos.user_id', '=', $user->id)
                    ->orderBy('artigos.id', 'DESC')
                    ->paginate($paginate);
        }
        return $listaArtigos;
    }

    public static function listaArtigosSite($paginate = 3, $busca = null)
    {
        if ($busca) {
            $listaArtigos = DB::table('artigos')
            ->join('users', 'users.id', '=', 'artigos.user_id')
            ->select(
                'artigos.id',
                'artigos.titulo',
                'artigos.descricao',
                'users.name as autor',
                'artigos.data'
            )
                ->whereNull('deleted_at')
                ->whereDate('data', '<=', date('Y-m-d'))
                ->where(function ($query) use ($busca) {
                    $query->orWhere('titulo', 'like', '%'.$busca.'%')
                          ->orWhere('descricao', 'like', '%'.$busca.'%');
                })
                ->latest('data')
                ->paginate($paginate);
        } else {
            $listaArtigos = DB::table('artigos')
            ->join('users', 'users.id', '=', 'artigos.user_id')
            ->select(
                'artigos.id',
                'artigos.titulo',
                'artigos.descricao',
                'users.name as autor',
                'artigos.data'
            )
                ->whereNull('deleted_at')
                ->whereDate('data', '<=', date('Y-m-d'))
                ->latest('data')
                ->paginate($paginate);
        }

        return $listaArtigos;
    }
}
