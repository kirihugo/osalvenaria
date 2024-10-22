<?php
require "../repositorio/conexao.php";
require "../controladora/Autenticacao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    
    $login = new Autenticacao($conn);
    $usuario = $login->verificarUsuario($email, $senha);

    if ($usuario) {
        session_start();
        $_SESSION["usuario"] = $usuario['nome'];
        $_SESSION["nomeusuario"] = $usuario["nome"];
        echo 'success'; // Retorna 'success' se o login for bem-sucedido
    } else {
        echo 'error'; // Retorna 'error' se o login falhar
    }
}
?>
