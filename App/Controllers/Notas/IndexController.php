<?php

namespace App\Controllers\Notas;

use App\Models\Nota;

class IndexController
{
  public function __invoke()
  {
    $notas = Nota::all(pesquisar: request()->get('pesquisar', null));
    if (!$notaSelecionada =  $this->getNotaSelecionada($notas)) {
      return view('notas/nao-encontrada');
    }
    return view('notas', data: [
      'notas' => $notas,
      'notaSelecionada' => $notaSelecionada
    ]);
  }
  private function getNotaSelecionada($notas)
  {
    $id = request()->get('id', (sizeof($notas) > 0 ? $notas[0]->id : null));

    $filter = array_filter($notas, fn($n) => $n->id == $id);
    return array_pop($filter);
  }
}
