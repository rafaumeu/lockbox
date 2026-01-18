<?php

namespace App\Controllers\Notas;

use App\Models\Nota;

class IndexController
{
  public function __invoke()
  {
    $pesquisar = isset($_GET['pesquisar']) ? $_GET['pesquisar'] : '';
    $notas = Nota::all($pesquisar);
    $id = isset($_GET['id']) ? $_GET['id'] : (sizeof($notas) > 0 ? $notas[0]->id : null);

    $filter = array_filter($notas, fn($n) => $n->id == $id);
    $notaSelecionada = array_pop($filter);
    if (!$notaSelecionada) {
      return view('notas/nao-encontrada');
    }
    return view('notas', data: [
      'notas' => $notas,
      'notaSelecionada' => $notaSelecionada
    ]);
  }
}
