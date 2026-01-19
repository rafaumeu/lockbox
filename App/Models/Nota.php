<?php

namespace App\Models;

use Core\Database;
use PDO;

class Nota
{
  public $id;
  public $usuario_id;
  public $titulo;
  public $nota;
  public $data_criacao;
  public $data_atualizacao;
  public static function all($pesquisar)
  {
    $db = new Database(config('database'));
    return $db->query(
      query: "SELECT * FROM notas where usuario_id = :usuario_id" . (
        $pesquisar ? " and titulo like :pesquisar" : null),
      class: self::class,
      params: array_merge(
        ['usuario_id' => auth()->id],
        $pesquisar ? ['pesquisar' => "%{$pesquisar}%"] : []
      )
    )->fetchAll(PDO::FETCH_CLASS, self::class);
  }
  public static function delete($id)
  {
    $db = new Database(config('database'));
    $db->query("DELETE FROM notas WHERE id = :id", params: [
      'id' => $id
    ]);
  }
  public static function update($id, $titulo, $nota)
  {
    $db = new Database(config('database'));
    $db->query(
      query: "UPDATE notas SET titulo = :titulo, nota = :nota WHERE id = :id",
      params: [
        'titulo' => $titulo,
        'nota' => $nota,
        'id' => $id
      ]
    );
  }
}
