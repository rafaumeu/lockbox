<?php

namespace App\Controllers;

use Core\Database;
use Core\Validacao;
use App\Models\Usuario;

class LoginController
{
  public function index()
  {
    return view('login', 'guest');
  }
  public function login()
  {
    $email = request()->post('email');
    $senha = request()->post('senha');
    $validacao = Validacao::validar([
      'email' => ['required', 'email'],
      'senha' => ['required']
    ], request()->all());

    if ($validacao->naoPassou()) {
      return view('login', 'guest');
    }
    $DB = new Database(config('database'));
    $usuario = $DB->query(
      query: "select * from usuarios where email = :email",
      class: Usuario::class,
      params: [
        'email' => $email,
      ]
    )->fetch();
    if (!($usuario && password_verify($senha, $usuario->senha))) {
      flash()->push('validacoes', ["email" => ["Usuário ou senha incorretos"]]);
      return view('login', 'guest');
    }
    session()->set('auth', $usuario);
    flash()->push('mensagem', 'Seja bem-vindo(a) ' . $usuario->nome . '!');
    return redirect('/notas');
  }
}
