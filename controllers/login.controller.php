<?php
require __DIR__ . "/../Validacao.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $email = $_POST['email'];
  $senha = $_POST['senha'];
  $validacao = Validacao::validar([
    'email' => ['required', 'email'],
    'senha' => ['required']
  ], $_POST);

  if ($validacao->naoPassou()) {
    view('login');
    exit();
  }

  $usuario = $DB->query(
    query: "select * from usuarios where email = :email",
    class: Usuario::class,
    params: [
      'email' => $email,
    ]
  )->fetch();
  if ($usuario && password_verify($senha, $usuario->senha)) {
    $_SESSION['auth'] = $usuario;
    flash()->push('mensagem', 'Seja bem-vindo(a) ' . $usuario->nome . '!');
    header("location: /");
    exit();
  } else {
    flash()->push('validacoes', ["email" => ["Usuário ou senha incorretos"]]);
  }
}
view('login');
