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
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $validacao = Validacao::validar([
      'email' => ['required', 'email'],
      'senha' => ['required']
    ], $_POST);

    if ($validacao->naoPassou()) {
      view('login', 'guest');
      exit();
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
    $_SESSION['auth'] = $usuario;
    flash()->push('mensagem', 'Seja bem-vindo(a) ' . $usuario->nome . '!');
    return redirect('/notas');
  }
}
