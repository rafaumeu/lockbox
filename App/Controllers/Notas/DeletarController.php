<?php

declare(strict_types = 1);

namespace App\Controllers\Notas;

use App\Models\Nota;
use Core\Validacao;

class DeletarController
{
    public function delete()
    {
        $validacao = Validacao::validar([
            'id' => ['required'],
        ], request()->all());

        if ($validacao->naoPassou()) {
            return redirect('/notas?id=' . request()->post('id'));
        }
        Nota::delete(request()->post('id'));
        flash()->push('mensagem', 'Registro deletado com sucesso');
        redirect('/notas');
    }
}
