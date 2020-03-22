<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Artigo extends Model
{
    use SoftDeletes;

    protected $fillable = ['titulo', 'descricao', 'conteudo','autor', 'data'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
