<?php

namespace App\Controllers;

use Core\Database;
use Core\Validacao;

class RegisterController
{
  public function index()
  {
    return view('registrar', 'guest');
  }
  public function register()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $DB = new Database(config('database'));

      $validacao = Validacao::validar([
        'nome' => ['required'],
        'email' => ['required', 'email', 'confirmed', 'unique:usuarios'],
        'senha' => ['required', 'min:8', 'max:30', 'strong'],
      ], $_POST);

      if ($validacao->naoPassou()) {
        view('registrar');
        exit();
      }

      $DB->query(
        query: 'insert into usuarios (email,senha, nome) values (:email,:senha, :nome)',
        params: [
          'nome' => $_POST['nome'],
          'email' => $_POST['email'],
          // 'email_confirmacao' => $_POST['email_confirmacao'],
          'senha' => password_hash($_POST['senha'], PASSWORD_DEFAULT)
        ]
      );
      flash()->push('mensagem', 'Registrado com sucesso');
      return redirect('/login');
    }
  }
}
