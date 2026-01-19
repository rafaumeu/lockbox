<?php

declare(strict_types=1);

namespace App\Models;

use Carbon\Carbon;
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
    public function dataCriacao()
    {
        return Carbon::parse($this->data_criacao);
    }

    public function dataAtualizacao()
    {
        return Carbon::parse($this->data_atualizacao);
    }
    public static function all($pesquisar)
    {
        $db = new Database(config('database'));

        return $db->query(
            query: "SELECT * FROM notas where usuario_id = :usuario_id" . (
                $pesquisar ? " and titulo like :pesquisar" : null
            ),
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
            'id' => $id,
        ]);
    }

    public static function update($id, $titulo, $nota)
    {
        $set = "titulo = :titulo";

        if ($nota) {
            $set .= ", nota = :nota";
        }
        $db = new Database(config('database'));
        $db->query(
            query: "UPDATE notas SET $set WHERE id = :id",
            params: array_merge([
                'titulo' => $titulo,
                'id'     => $id,
            ], $nota ? ['nota' => encrypt($nota)] : [])
        );
    }

    public static function create($data)
    {
        $db = new Database(config('database'));
        $db->query(
            query: "INSERT INTO notas (titulo, nota, usuario_id, data_criacao, data_atualizacao) VALUES (:titulo, :nota, :usuario_id, :data_criacao, :data_atualizacao)",
            params: array_merge($data, [
                'data_criacao'     => date('Y-m-d H:i:s'),
                'data_atualizacao' => date('Y-m-d H:i:s'),
            ])
        );
    }

    public function nota()
    {
        if (session()->get('mostrar')) {
            return decrypt($this->nota);
        }

        return str_repeat('*', rand(10, 100));
    }
}
