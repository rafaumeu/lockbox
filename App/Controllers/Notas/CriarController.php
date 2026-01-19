<?php

namespace App\Controllers\Notas;

use Core\Database;
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
      'nota' => ['required']
    ], request()->all());

    if ($validacao->naoPassou()) {
      return redirect('/notas/criar');
    }
    $db = new Database(config('database'));
    $db->query("INSERT INTO notas (titulo, nota, usuario_id) VALUES (:titulo, :nota, :usuario_id)", params: [
      'titulo' => request()->post('titulo'),
      'nota' => request()->post('nota'),
      'usuario_id' => auth()->id,
      'data_criacao' => date('Y-m-d H:i:s'),
      'data_atualizacao' => date('Y-m-d H:i:s')
    ]);
    flash()->push('mensagem', 'Nota criada com sucesso');
    redirect('/notas');
  }
}
