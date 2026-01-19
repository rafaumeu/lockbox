<?php

declare(strict_types = 1);

namespace App\Controllers\Notas;

use App\Models\Nota;
use Core\Validacao;

class CriarController
{
    public function index()
    {
        return view('notas/criar');
    }

    public function store()
    {
        $validacao = Validacao::validar([
            'titulo' => ['required', 'min:3', 'max:255'],
            'nota'   => ['required'],
        ], request()->all());

        if ($validacao->naoPassou()) {
            return redirect('/notas/criar');
        }
        Nota::create([
            'usuario_id' => auth()->id,
            'titulo'     => request()->post('titulo'),
            'nota'       => encrypt(request()->post('nota')),
        ]);
        flash()->push('mensagem', 'Nota criada com sucesso');
        redirect('/notas');
    }
}
